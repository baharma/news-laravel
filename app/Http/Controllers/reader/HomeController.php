<?php

namespace App\Http\Controllers\reader;

use App\Category;
use App\Http\Controllers\Controller;
use App\Newslatter;
use App\Thumnaild;
use App\ImageNews;
use App\Descripsion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Thumnaild::with('newsLatter_id')->paginate('10');
        return view('front-end.home', [
            'data' => $data
        ]);
    }
    public function show($id)
    {
        $data = Newslatter::find($id);
        $category =  Category::find($data->category_id);
        $Descripsions = Descripsion::find($data->description_id);
        $image = ImageNews::find($data->image_id);
        return view('front-end.detail', [
            'data' => $data,
            'category' => $category,
            'Descripsions' => $Descripsions,
            'image' => $image
        ]);
    }
}
