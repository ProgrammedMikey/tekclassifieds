<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassifiedRequest;
use App\Commands\StoreClassifiedCommand;

use App\Http\Requests\UpdateClassifiedRequest;
use App\Commands\UpdateClassifiedCommand;

use App\Commands\DestroyClassifiedCommand;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Commands;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classified;
use Auth;
class ClassifiedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    public function index()
    {
        $classifieds = Classified::all();
        return view('index', compact('classifieds'));
    }


    public function create()
    {
        return view('create');
    }


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
        $owner_id= Auth::user()->id;

        //check if image is uploaded
        if($main_image) {
            $main_image_filename = $main_image->getClientOriginalName();
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


    public function show($id)
    {
        $classified = Classified::find($id);
        return view('show', compact('classified'));
    }


    public function edit($id)
    {
        $classified = Classified::find($id);
        return view('edit', compact('classified'));
    }


    public function update(UpdateClassifiedRequest $request, $id)
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


        $current_image_filename = Classified::find($id)->main_image;


        //check if image is uploaded
        if($main_image) {
            $main_image_filename = $main_image->getClientOriginalName();
            $main_image -> move(public_path('images'), $main_image_filename);
        } else {
            $main_image_filename = $current_image_filename;
        }
        //update command
        $command = new UpdateClassifiedCommand($id, $title, $category_id, $description, $main_image_filename, $price, $condition, $location, $email, $phone);
        $this->dispatch($command);

        return \Redirect::route('classifieds.index')
            ->with('message', 'Listing Updated');
    }


    public function destroy($id)
    {
        $command = new DestroyClassifiedCommand($id);
        $this->dispatch($command);

        return \Redirect::route('classifieds.index')
            ->with('message', 'Listing Removed');
    }
}
