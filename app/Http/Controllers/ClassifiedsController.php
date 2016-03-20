<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreClassifiedRequest;
use App\Commands\StoreClassifiedCommand;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
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
        if(main_image) {
            $main_image_filename = $main_image->getClientOrginalName();
            $main_image -> move(public_path('images'), $main_image_filename);
        } else {
            $main_image_filename = 'noimage.jpg';
        }
        //create command
        $command = new StoreClassifiedCommand($title, $category_id, $description, $main_image_filename, $price, $condition, $location, $email, $phone, $owner_id);
        $this->dispatch($command);

        return \Redirect::route('classifieds.index')
            ->with('message', 'Listing Created');
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
