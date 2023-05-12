<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function show(){
        $image = Image::all();

        return view('home', compact('image'));
    }

    public function create(){
        return view('input');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'Image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public/article/images', $filename);

        Image::create([
            'Image' => $filename
        ]);

        return redirect('/');
    }

    public function detail($id){
        $image = Image::findOrFail($id);
        return view('detail', compact('image'));
    }

    public function delete($id){
        Image::destroy($id);
        return redirect('/');
    }
}
