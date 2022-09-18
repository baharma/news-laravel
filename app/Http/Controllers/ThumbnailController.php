<?php

namespace App\Http\Controllers;

use App\Newslatter;
use App\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Thumbnail::with(
            'newsLattera',
        )->orderBy('created_at', 'desc')->paginate('10');



        return view('back-end.admin.thumbnail.index', ['item' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Newslatter::all();
        return view('back-end.admin.thumbnail.add', ['item' => $item]);
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
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_img = $name . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/img');
            $imgImage = Image::make($image->getRealPath());
            $imgImage->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $name_img);

            $dataArray = array(
                'newslatter_id' => $request->newslatter_id,
                'image' => asset('assets/img') . '/' . $name_img,
                'date' => $request->date,
            );
        } else {
            $dataArray = array(
                'newslatter_id' => $request->newslatter_id,
                'image' => asset('assets/img/notfount.png'),
                'date' => $request->date,
            );
        }

        Thumbnail::create($dataArray);
        return redirect()->route('thumnail.index')->with('message', 'Data created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function show(Thumbnail $thumbnail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function edit(Thumbnail $thumbnail, $id)
    {
        $data = Thumbnail::find($id);
        $newslatter = Newslatter::all();
        $newslatterid = Newslatter::find($data->newslatter_id);
        return view('back-end.admin.thumbnail.edit', [
            'data' => $data,
            'newslatter' => $newslatter,
            'newslatterid' => $newslatterid,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thumbnail $thumbnail)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Thumbnail::find($id);
        $item->delete();
        return redirect()->back()->with('message', 'Data Delete !');
    }
}
