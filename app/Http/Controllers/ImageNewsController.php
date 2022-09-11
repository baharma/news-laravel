<?php

namespace App\Http\Controllers;

use App\ImageNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = DB::table('image_news')
            ->orderBy('created_at', 'desc')->paginate('10');

        return view(
            'back-end.admin.imagenews.index',
            compact('item')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.admin.imagenews.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function show(ImageNews $imageNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageNews $imageNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageNews $imageNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageNews $imageNews)
    {
        //
    }
}
