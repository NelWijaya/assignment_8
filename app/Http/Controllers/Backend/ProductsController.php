<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = products::get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $store = Products::create($request->all());
        if(!$store){
            return json_encode(['status' => 'Product gagal ditambah']);
        } 
        return json_encode(['status' => 'Product berhasil ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['show'] = Products::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update = Products::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return json_encode(['status' => 'Product tidak ditemukan']);
        }
        return json_encode(['status' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Products::find($id);
        if(!$destroy){
            return json_encode(['status' => 'Product tidak ditemukan']);
        }

        $destroy->delete();
        if(!$destroy) {
            return json_encode(['status' => 'Product tidak bisa dihapus']);
        }

        return json_encode(['status' => 'Product berhasil dihapus']);
    }
}
