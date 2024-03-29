<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fill the 'Category'-dropdown
        $categories = Category::all();
        return view('admin.image.upload', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/image', $filename);
            $image->image = $filename;
        }

        $image->cat_id = explode('|', $request->input('cat_id'))[0];
        $image->price = $request->input('price');
        $image->title = ucfirst($request->input('title'));
        // $image->category = explode('|', $request->input('cat_id'))[1];
        $image->description = ucfirst($request->input('description'));
        $image->spotlight = $request->input('spotlight') == TRUE ? '1':'0';
        $image->save();
        return redirect('/images')->with('status', 'Image added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = Image::find($id);
        $categories = Category::all();
        return view('admin.image.edit', compact('images', 'categories'));
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
        $images = Image::find($id);
        if($request->hasFile('image')){
            $filepath = 'assets/uploads/image/'.$images->image;
            if(File::exists($filepath)){
                File::delete($filepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $images->image;
            $file->move('assets/uploads/image', $filename);
            $images->image = $filename;
        }

        $images->cat_id = explode('|', $request->input('cat_id'))[0];
        $images->price = $request->input('price');
        $images->title = ucfirst($request->input('title'));
        // $images->category = explode('|', $request->input('cat_id'))[1];
        $images->description = ucfirst($request->input('description'));
        $images->spotlight = $request->input('spotlight') == TRUE ? '1':'0';
        $images->update();
        return redirect('/images')->with('status', 'Image updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Image::find($id);
        if($images->image){
            $filepath = 'assets/uploads/image/'.$images->image;
            if(File::exists($filepath)){
                File::delete($filepath);
            }
        }
        $images->delete();
        return redirect('/images')->with('status', 'Image deleted successfully!');
    }
}
