<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoControllers extends Controller
{
    public function index()
    {
       return view('demo');
    }
    public function fileupload(Request $request)
    {
        
        $filename = 'ky'.time().'.'.$request->file('file')->getClientOriginalExtension();
        echo $request->file('file')->storeAs('public/uploads', $filename);
    }
}
