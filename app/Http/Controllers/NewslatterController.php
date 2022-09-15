<?php

namespace App\Http\Controllers;

use App\Newslatter;
use Illuminate\Http\Request;
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
        $item = DB::table('newslatters')->with([
            'descripsion_event',
            'category_event',
            'image_event'
        ])->orderBy('created_at', 'desc')->paginate('10');
        return view('back-end.admin.newslatter.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
