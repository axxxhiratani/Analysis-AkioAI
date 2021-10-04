<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;


class ResultController extends Controller
{
    //

    public function store(Request $request){


        $file_name = $request->tournament_name;
        $file_path = 'csv/'. $file_name . '.csv';

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

                $result = new Result();
                $result->result = $cols[1];
                $result->a = $cols[2];
                $result->b = $cols[3];
                $result->c = $cols[4];
                $result->d = $cols[5];
                $result->e = $cols[6];
                $result->f = $cols[7];
                $result->g = $cols[8];
                $result->h = $cols[9];
                $result->k = $cols[10];
                $result->save();

            }catch(QueryException $e){
                continue;
            }

        }
        return view('add_menu');

    }
}
