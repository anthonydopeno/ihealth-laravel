<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;

class testing extends Controller
{
    //

    public function displaydata(){

        $test = test::get();
        //console.log($test);
        return $test;
    }

    public function insert(Request $request){

 /*       header('Access-Control-Allow-Origin: *');
header('Context-Type: application/json');
header("Accept", 'application/json');
header('Content-Type', 'application/json'); */
        //$mode ='insert';

        $insert = new test;
        $insert->id = $request->id;
        $insert->fname = $request->fname;
        $insert->lname = $request->lname;
        //return $request;
        $insert->save();
        return response(json_encode(['success'=>true]),200);

    /*   test::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
        ]);
*/

        

    //return view('comments',compact('mode'));
    
    }
    
}
