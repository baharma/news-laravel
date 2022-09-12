<?php

namespace App\Http\Controllers;

use App\Descripsion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescripsionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = DB::table('descripsions')
            ->orderBy('created_at', 'desc')->paginate('10');

        return view(
            'back-end.admin.description.index',
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
        return view('back-end.admin.description.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();

        try {
            Descripsion::create($form);
            return redirect()->route('descriptsion.index')->with('message', 'Data created !');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Descripsion  $descripsion
     * @return \Illuminate\Http\Response
     */
    public function show(Descripsion $descripsion)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descripsion  $descripsion
     * @return \Illuminate\Http\Response
     */
    public function edit(Descripsion $descripsion, $id)
    {
        $data['descripsion'] = Descripsion::whereId($id)->first();
        return view('back-end.admin.description.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descripsion  $descripsion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = array(
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        );
        try {
            Descripsion::whereId($id)->update($form);
            return redirect()->route('descriptsion.index')->with('message', 'Data Update !');;;
        } catch (\Exception $e) {
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
     * @param  \App\Descripsion  $descripsion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descripsion $descripsion, $id)
    {
        $item = Descripsion::find($id);
        $item->delete();
        return redirect()->back()
            ->with('error', 'Error during the creation!')->with('message', 'Data delete !');
    }
}
