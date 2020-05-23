<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Validator, Redirect, Response, File;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['images']=Image::paginate(8);
        return view("gallery",$data);
//        return view("gallery");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,gif,png|max:8000'
        ]);

        $images=array();
        if($files=$request->file('images')){
            //if file present
            foreach($files as $file){
//                $name=$file->getClientOriginalName();
                $name = time().'.'.$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
                Image::insert( ['image'=> $name]);
            }
        }
        return back()->with('success', 'Successfully Save Your Image file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
