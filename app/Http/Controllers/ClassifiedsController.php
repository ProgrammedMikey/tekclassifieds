<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Classified;

class ClassifiedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifieds = Classified::all();
        return view('index', compact('classifieds'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassifiedRequest $request)
    {
        $title=$request->input('title');
        $category_id=$request->input('category_id');
        $description=$request->input('description');
        $price=$request->input('price');
        $condition=$request->input('condition');
        $main_image=$request->file('main_image');
        $location=$request->input('location');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $owner_id=1;

        //check if image is uploaded
        if(main_image)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classified = Classified::find($id);
        return view('show', compact('classifieds'));
    }


    public function edit($id)
    {
        return view('edit');
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
