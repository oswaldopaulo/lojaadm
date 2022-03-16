<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TransacoesRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
class TransacoesController extends Controller
{
    function index(){
      
           
        $t =  DB::table('transacoes')
            ->leftjoin('status_transacoes', 'transacoes.status', '=', 'status_transacoes.id')
            ->select('transacoes.*', 'status_transacoes.descricao as status')
            ->where(['idempresa'=>Auth::user()->idempresa])
            ->orderBy('id','desc')
            ->get();
        
    
        return view('transacoes/index')->with(['t' =>$t]);
    }
    
    function itens($id){
        
         if(DB::table('transacoes')->where(['idempresa'=>Auth::user()->idempresa,'id'=>$id])->exists()) {
             
             $t =  DB::table('transacoes_itens')->where(['id_trans'=>$id])->get();
             
             $transacao =  DB::table('transacoes')
                            ->leftjoin('status_transacoes', 'transacoes.status', '=', 'status_transacoes.id')
                            ->select('transacoes.*', 'status_transacoes.descricao as status_desc')
                            ->where(['transacoes.id'=>$id])
                            ->first();
             
             return view('transacoes/itens')->with(['t' =>$t,'transacao'=>$transacao]);
         } else {
             return view('404');
         }
        
    }
    
    
    function setstatus(){
        
      
        $transacao =  DB::table('transacoes')
        ->select('status')
        ->where(['transacoes.id'=>  Request::input('id')])
        ->first();
        
        if($transacao->status=='A') {
            DB::table('transacoes')
            ->where('id',Request::input('id'))
            ->update([
                'status'=> 'P',
                
            ]);
            
        } elseif($transacao->status=='P') {
            
            DB::table('transacoes')
            ->where('id',Request::input('id'))
            ->update([
                'status'=> 'S',
                
            ]);
            
        } elseif($transacao->status=='S') {
            
            DB::table('transacoes')
            ->where('id',Request::input('id'))
            ->update([
                'status'=> 'F',
                'notafiscal'=>Request::input('notafiscal')
                
            ]);
            
               
        } elseif($transacao->status=='F') {
            
            DB::table('transacoes')
            ->where('id',Request::input('id'))
            ->update([
                'status'=> 'T',
                'codigorastreio'=>Request::input('codigorastreio')
                
            ]);
            
        } elseif($transacao->status=='T') {
            
            DB::table('transacoes')
            ->where('id',Request::input('id'))
            ->update([
                'status'=> 'E',
               
                
            ]);
        }
      
        
        return redirect()->back();
    }
    
    
 
}
