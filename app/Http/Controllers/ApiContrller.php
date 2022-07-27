<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Type;
use Illuminate\Http\Request;

class ApiContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        // $photo=$request->file('image');
        // // return $photo;
        // $file_extention=$photo->getClientOriginalName();
        // $file_name=time().$file_extention;
        // $path='image/img';
        // $photo->move($path,$file_name);

        // Image::create([
        //     'title'=>$request->title,
        //     'image'=>$file_name,
        //     'gallery_id'=>$request->gallery_id,
        //     'date'=>$request->date,
        //     'description'=>$request->description,
        //     'tag'=>$request->tag
        // ]);

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
        $images=Image::select()->where('id',$id)->get();
        return $images;
    }
    public function sort()
    {
     return $type=Type::with('image')->select()->orderBy('type', 'ASC')->get();
    //   return $type->image;

        // $sort=$request->sort;
        // $type=Type::select()->get();
        // $image=Image::select()->where('type',$type->id)->orderBy('type', 'DESC');
        // return $image;
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
