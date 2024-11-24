<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;


class ApiController extends Controller
{
    public function Api(){
        $PostData = post::all();
        return response()->json($PostData);
    }
}
