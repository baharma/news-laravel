<?php

namespace App\Http\Controllers\news;

use App\Category;
use File;
use Illuminate\Support\Facades\Auth;
use App\ImageNews;
use App\Newslatter;
use App\Descripsion;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsLatterController extends Controller
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
        ])->where('users', Auth::user()->id)->orderBy('created_at', 'desc')->paginate('10');
        return view('back-end.userlatter.newslatter.index', ['item' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('back-end.userlatter.newslatter.add', compact('data'));
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

        return redirect()->route('newsaatter.index')->with('message', 'Data created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Newslatter::find($id);
        $category =  Category::find($data->category_id);
        $Descripsions = Descripsion::find($data->description_id);
        $image = ImageNews::find($data->image_id);

        $categorydata = Category::all();
        return view('back-end.userlatter.newslatter.edit', [
            'category' => $category,
            'Descripsions' => $Descripsions,
            'image' => $image,
            'data' => $data,
            'categorydata' => $categorydata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');

        $dataNews = Newslatter::find($id);

        if ($request->file('image_id')) {
            $image = $request->file('image_id');
            $name_img = $name . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/img');
            $imgImage = Image::make($image->getRealPath());
            $imgImage->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name_img);

            $dataImageNews = ImageNews::find($dataNews->image_id);
            $dataImageNews->title = $request->title;
            $dataImageNews->image = asset('assets/img') . '/' . $name_img;
            $dataImageNews->date = $request->date;
            $dataImageNews->update();
        } else {
            $dataImageNews = ImageNews::find($dataNews->image_id);
            $dataImageNews->title = $request->title;

            $dataImageNews->date = $request->date;
            $dataImageNews->update();
        }

        $dataDescripsions =  Descripsion::find($dataNews->description_id);
        $dataDescripsions->title = $request->title;
        $dataDescripsions->description = $request->description_id;
        $dataDescripsions->date = $request->date;
        $dataDescripsions->update();




        $form = array(
            'title' => $request->title,
            'slug' => $request->title,
            'image_id' => $dataImageNews->id,
            'description_id' => $dataDescripsions->id,
            'category_id' => $request->category_id,
            'users' => $request->users,
            'date' => $request->date,
        );

        Newslatter::whereId($id)->update($form);
        return redirect()->route('newsaatter.index')->with('message', 'Data created !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Newslatter::find($id);
        $item->delete();
        return redirect()->back()->with('message', 'Data delete !');
    }
}
