<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Image;
use App\Models\Type;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Type::select()->get();
        return view('type.typeDashboard',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::all();
        return view('type.typeAdd',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        //
        Type::create([
            'type'=>$request->type
        ]);
        return redirect('dashboardType')->with('success', 'Added Successfully');

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
        $type = Type::find($id);
        // $types = Type::all();
        return view('type.typeEdit',compact('type'));
        // return
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        //
        $type =Type::find($id);
        // $type -> type = $request->input('type');
        // $type -> save();
        $type=Type::find($id);
        if($type->type==$request->type){
            // $type->update([
            //     'type'=>$request->type
            // ]);
        }else{
            $type->update([
                'type'=>$request->type
            ]);
        }
        return redirect('type/typeDashboard');
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
        $count=Image::select('type')->where('type',$id)->count();
        // return $count;
        if($count==0){
            $type = Type::find($id);
            $type -> delete();
            return redirect('dashboardType')->with('success', 'Deleted Successfully');
        }else{
            return redirect('dashboardType')->with('success', "You can't delet this type becouse you have an image in this type");
        }
    }
}
