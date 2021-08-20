<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DegreesController extends Controller
{
    public function index()
    {
        return view('admin.degrees.index');
    }
}
