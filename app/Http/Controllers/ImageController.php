<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Gallery;
use App\Models\Image;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $images=Image::select()->get();
        // $gallery=Gallery::find($images->)
        return view('image.imageDashboard',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gallery=Gallery::select('id','title')->get();
        if($gallery->count()==0){
            return redirect('/')->with('success', 'Please You Should Add Gallery First');
        }
        return view('image.imageAdd',compact('gallery'));
    }






    public function search(Request $request ){
$search= request('search');
// $search= $request->search;

       $images=Image::select()->where('title','LIKE','%'.$search.'%')->orWhere('tag','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->get();
       return view('image.imageDashboard',compact('images'));



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




     public function store(ImageRequest $request)
    {
                //
// return  $request;
        // return $request;
        $photo=$request->file('image');
        // return $photo;
        $file_extention=$photo->getClientOriginalName();
        $file_name=time().$file_extention;
        $path='image/img';
        $photo->move($path,$file_name);

        Image::create([
            'title'=>$request->title,
            'image'=>$file_name,
            'gallery_id'=>$request->gallery_id,
            'date'=>$request->date,
            'description'=>$request->description,
            'tag'=>$request->tag
        ]);
        return redirect('dashboardImage')->with('success', 'Added Successfully');

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

        $image=Image::find($id);
        $g=Gallery::find($image->gallery_id);
        $gallery=Gallery::select('id','title')->get()->except($g->id);
        // return $gallery;
        return view('image.ImageEdit',compact('image','gallery','g'));
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

// return $validator;
        if($request->image2==null){
            $file_name=$request->old_image;

        }else{
            $photo=$request->file('image2');
            // return $photo;
            $file_extention=$photo->getClientOriginalName();
            $file_name=time().$file_extention;
            $path='image/img';
            $photo->move($path,$file_name);
        }
// return $file_name;
        Image::find($id)->update([
            'title'=>$request->title,
            'image'=>$file_name,
            'gallery_id'=>$request->gallery_id,
            'date'=>$request->date,
            'description'=>$request->description,
            'tag'=>$request->tag
        ]);
        return redirect('dashboardImage')->with('success', 'Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::find($id)->delete();
        return redirect('dashboardImage')->with('success', 'Deleted Successfully');

    }
}
