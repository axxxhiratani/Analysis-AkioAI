<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tend;

class TendController extends Controller
{
    //

    public function store(Request $request){

        $file_name =  $request->local . $request->ground . $request->meter;

        $file_path = 'csv/' . $file_name . '.csv';

        $fh = fopen($file_path, 'rb');


        // ポインタがnullになるまでループ
        $row = 0;
        while(!feof($fh) ){

            try{

                $row++;
                $cols = fgetcsv($fh, 1024);

                // 空データと先頭は無視する
                if(!$cols || $row==1){
                    continue;
                }

                $tend = new Tend();
                $tend->result = $cols[1];
                $tend->a = $cols[2];
                $tend->b = $cols[3];
                $tend->c = $cols[4];
                $tend->d = $cols[5];
                $tend->e = $cols[6];
                $tend->f = $cols[7];
                $tend->g = $cols[8];
                $tend->h = $cols[9];
                $tend->k = $cols[10];
                $tend->save();

            }catch(QueryException $e){
                continue;
            }

        }
        return view('add_menu');

    }

    public function show(){


        $tends = Tend::where('result','=','1')->get();
        $a = Tend::where('result','=','1')->get()->avg('a');
        $b = Tend::where('result','=','1')->get()->avg('b');
        $c = Tend::where('result','=','1')->get()->avg('c');
        $d = Tend::where('result','=','1')->get()->avg('d');
        $e = Tend::where('result','=','1')->get()->avg('e');
        $f = Tend::where('result','=','1')->get()->avg('f');
        $g = Tend::where('result','=','1')->get()->avg('g');
        $h = Tend::where('result','=','1')->get()->avg('h');
        $k = Tend::where('result','=','1')->get()->avg('k');

        return view('show_tend')
            ->with(['tends' => $tends,
                    'a' => $a,
                    'b' => $b,
                    'c' => $c,
                    'd' => $d,
                    'e' => $e,
                    'f' => $f,
                    'g' => $g,
                    'h' => $h,
                    'k' => $k,
                        ]);

    }

}
