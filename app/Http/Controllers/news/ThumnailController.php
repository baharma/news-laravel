<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Newslatter;
use App\Thumnaild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ThumnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Thumnaild::with('newsLatter_id')
            ->where('users', Auth::user()->id)->orderBy('created_at', 'desc')->paginate('10');
        return view('back-end.userlatter.thumnaild.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Newslatter::all();
        return view(
            'back-end.userlatter.thumnaild.add',
            ['item' => $item]
        );
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
                    'title_news' => $request->title_news,
                    'image' => asset('assets/img') . '/' . $name_img,
                    'descripsion' => $request->descripsion,
                    'date' => $request->date,
                    'users' => $request->users
                );
            } else {
                $dataArray = array(
                    'title_news' => $request->title_news,
                    'image' => asset('assets/img/notfount.png'),
                    'descripsion' => $request->descripsion,
                    'date' => $request->date,
                    'users' => $request->users
                );
            }

            Thumnaild::create($dataArray);
            DB::commit();
            return redirect()->route('thumNails.index')->with('message', 'Data created !');
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
        $item = Thumnaild::find($id);
        $newsid = Newslatter::find($item->title_news);
        $allNews = Newslatter::all();
        return view('back-end.userlatter.thumnaild.edit', [
            'item' => $item,
            'newsid' => $newsid,
            'allNews' => $allNews
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
                    'title_news' => $request->title_news,
                    'image' => asset('assets/img') . '/' . $name_img,
                    'descripsion' => $request->descripsion,
                    'date' => $request->date
                );
            } else {
                $dataArray = array(
                    'title_news' => $request->title_news,
                    'descripsion' => $request->descripsion,
                    'date' => $request->date
                );
            }

            Thumnaild::whereId($id)->update($dataArray);
            DB::commit();
            return redirect()->route('thumNails.index')->with('message', 'Data Updates !');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thumnaild::whereId($id)->delete();
        return redirect()->back()->with('message', 'Data delete !');
    }
}
