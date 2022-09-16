<?php

namespace App\Http\Controllers;


use App\Category;

use App\ImageNews;
use App\Newslatter;
use App\Descripsion;
use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class NewslatterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Newslatter::with([
            'descripsion_event',
            'category_event',
            'image_event',
        ])->orderBy('created_at', 'desc')->paginate('10');
        return view('back-end.admin.newslatter.index', ['item' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('back-end.admin.newslatter.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');

        if ($request->file('image_id')) {
            $image = $request->file('image_id');
            $name_img = $name . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/img');
            $imgImage = Image::make($image->getRealPath());
            $imgImage->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name_img);

            $dataImageNews = new ImageNews();
            $dataImageNews->title = $request->title;
            $dataImageNews->image = asset('assets/img') . '/' . $name_img;
            $dataImageNews->date = $request->date;
            $dataImageNews->save();
        } else {
            $dataImageNews = new ImageNews;
            $dataImageNews->title = $request->title;
            $dataImageNews->image = asset('assets/img/notfount.png');
            $dataImageNews->date = $request->date;
            $dataImageNews->save();
        }

        $dataDescripsions = new Descripsion;
        $dataDescripsions->title = $request->title;
        $dataDescripsions->description = $request->description_id;
        $dataDescripsions->date = $request->date;
        $dataDescripsions->save();




        $form = array(
            'title' => $request->title,
            'slug' => $request->title,
            'image_id' => $dataImageNews->id,
            'description_id' => $dataDescripsions->id,
            'category_id' => $request->category_id,
            'users' => $request->users,
            'date' => $request->date,
        );

        Newslatter::create($form);

        return redirect()->route('newslatter.index')->with('message', 'Data created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function show(Newslatter $newslatter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newslatter $newslatter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newslatter $newslatter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newslatter  $newslatter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newslatter $newslatter)
    {
        //
    }
}
