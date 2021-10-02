<?php

namespace App\Http\Controllers;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Property::orderBy('id', 'desc')->get());
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
          /**
         * Valiate post data
         */
        $this->validate($request, [
            'title' => [ 'required',  'string', 'min:5', 'max:50' ],
            'description' => [ 'required',  'string', 'min:5', 'max:50' ],
            'price' => [ 'required'],
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]); 

        

            $original_filename = $request->file('file')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './public/';
            $image = 'U-' . time() . '.' . $file_ext;
            $request->file('file')->move($destination_path, $image);

        $popertyItem = new Property();
        $popertyItem->title = $request->title;
        $popertyItem->description = $request->description;
        $popertyItem->price = $request->price;
        $popertyItem->image = $image;
        $popertyItem->save();

        return $popertyItem;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
