<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class ParametrosController extends Controller
{

    function novo(){

        return view('parametros');

    }

    function insert(){

        foreach ($_POST['par'] as $key => $par){


            $k =  str_replace("'", "", $key);
            if (DB::table('parametros')->where('chave',$k)->exists()) {

                DB::table('parametros')
                ->where('chave',$k)
                ->update([
                    'descricao'=>$k,
                    'valor'=>$par

                ]);

            } else {

                DB::table('parametros')->insert([
                    'chave'=>$k,
                    'descricao'=>$k,
                    'valor'=>$par
                ]);

            }

        }





        return redirect()->back()->with(['status' => 'Parametros salvos']);
    }


    public static function getParametro($id){

        $r = Db::table('parametros')
        ->select('valor')
        ->where(['chave'=>$id])
        ->get();

        if(!empty($r[0])){
            return $r[0]->valor;
        } else {
            return "";
        }

    }



}
