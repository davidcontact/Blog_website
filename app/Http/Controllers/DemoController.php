<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function tag(){
        // return 'This is tag Controller';
        $tags = ['sports', 'basket ball', 'baseball', 'soccer'];
        return view('tag', ['tags' => $tags]);
    }

    public function view(){
        return 'This is view Controller';
    }

    public function post(){
        return 'This is post Controller';
    }
}
