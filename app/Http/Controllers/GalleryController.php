<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gallery=Gallery::select()->get();
        return view('gallery.GalleryDashboard',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.GalleryAdd');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        //
        // return $request;
        $photo=$request->file('cover');
        // return $photo;
        $file_extention=$photo->getClientOriginalName();
        $file_name=time().$file_extention;
        $path='image/gallery';
        $photo->move($path,$file_name);

            // File::delete($image_path);

        Gallery::create([
            'title'=>$request->title,
            'cover'=>$file_name,
            'tag'=>$request->tag
        ]);
        return redirect('dashboardGallery')->with('success', 'Added Successfully');
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
        // // return $id;
        $images=Image::select()->where('gallery_id',$id)->get();
        return view('image.imageDashboard',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery=Gallery::find($id);
        return view('gallery.GalleryEdit',compact('gallery'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)

    {
        // return $request->cover;

        if($request->cover==null){
        $file_name=$request->old_cover;
    }else{
        $photo=$request->file('cover');
        // return $photo;
        $file_extention=$photo->getClientOriginalName();
        $file_name=time().$file_extention;
        $path='image/gallery';
        $photo->move($path,$file_name);
    }


        $gallery=Gallery::find($id)->update([
            'title'=>$request->title,
            'cover'=>$file_name,
            'tag'=>$request->tag
        ]);
        return redirect('dashboardGallery')->with('success', 'Updated Successfully');

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
        $gallery=Gallery::find($id)->delete();
        Image::select()->where('gallery_id',$id)->delete();
        return redirect('dashboardGallery')->with('success', 'Deleted Successfully');
    }
}
