<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('back-end.userlatter.dashboard');
    }
}
