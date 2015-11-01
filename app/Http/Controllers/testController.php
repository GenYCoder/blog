<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function test()
    {
       return Articles::Test()->get();
    }

    public function index()
    {

    }
}
