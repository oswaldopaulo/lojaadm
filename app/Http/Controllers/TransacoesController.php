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
            ->where(['idempresa'=>Auth::user()->idempresa])
            ->orderBy('id','desc')
            ->get();
        
    
        return view('transacoes/index')->with(['t' =>$t]);
    }
    
    function itens($id){
        
         if(DB::table('transacoes')->where(['idempresa'=>Auth::user()->idempresa,'id'=>$id])->exists()) {
             
             $t =  DB::table('transacoes_itens')->where(['id_trans'=>$id])->get();
             
             $transacao =  DB::table('transacoes')
                            ->where(['transacoes.id'=>$id])
                            ->first();
             
             return view('transacoes/itens')->with(['t' =>$t,'transacao'=>$transacao]);
         } else {
             return view('404');
         }
        
    }
    
    
 
}
