<?php

namespace App\Http\Controllers;

use App\ImageNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

use Intervention\Image\ImageManagerStatic as Image;

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
        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');
        try {
            if ($request->file('image')) {
                $image = $request->file('image');
                $name_img = $name . '.' . $image->getClientOriginalExtension();
                $path = public_path('assets/img');
                $imgImage = Image::make($image->getRealPath());
                $imgImage->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $name_img);

                $dataArray = array(
                    'title' => $request->title,
                    'image' => asset('assets/img') . '/' . $name_img,
                    'date' => $request->date,
                );
            } else {
                $dataArray = array(
                    'title' => $request->title,
                    'image' => asset('assets/img/notfount.png'),
                    'date' => $request->date,
                );
            }

            ImageNews::create($dataArray);
            DB::commit();
            return redirect()->route('imagenews.index')->with('message', 'Data created !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Error pada data update!');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->withErrors('inline' . $th->getLine() . ' ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function show(ImageNews $imageNews)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageNews $imageNews, $id)
    {
        $data = ImageNews::findOrFail($id);
        return view('back-end.admin.imagenews.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageNews $imageNews, $id)
    {
        $name = rand(1, 99999) . now()->format('Y-m-d-H-i-s');
        try {
            if ($request->file('image')) {
                $image = $request->file('image');
                $name_img = $name . '.' . $image->getClientOriginalExtension();
                $path = public_path('assets/img');
                $imgImage = Image::make($image->getRealPath());
                $imgImage->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $name_img);

                $dataArray = array(
                    'title' => $request->title,
                    'image' => asset('assets/img') . '/' . $name_img,
                    'date' => $request->date,
                );
            } else {
                $dataArray = array(
                    'title' => $request->title,
                    'date' => $request->date,
                );
            }

            ImageNews::whereId($id)->update($dataArray);
            DB::commit();
            return redirect()->route('imagenews.index')->with('message', 'Data Updates !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Error pada data update!');
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->withErrors('inline' . $th->getLine() . ' ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageNews  $imageNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageNews $imageNews, $id)
    {
        ImageNews::whereId($id)->delete();
        return redirect()->back()->with('message', 'Data delete !');
    }
}
