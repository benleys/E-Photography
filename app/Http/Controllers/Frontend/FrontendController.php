<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Image;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $spotlight_images = Image::where('spotlight', '1')->take(9)->get();
        return view('frontend.index', compact('images', 'spotlight_images'));
    }

    public function portfoliocategory()
    {
        $images = Image::all();
        $categories = Category::all();
        return view('frontend.portfolio', compact('images', 'categories'));
    }

    public function viewportfoliocategory($name)
    {
        if(Category::where('name', $name)->exists()){
            $category = Category::where('name', $name)->first();
            $images = Image::where('cat_id', $category->id)->get();
            return view('frontend.images.index', compact('category', 'images'));
        } else {
            return redirect('/')->with('badstatus', 'Category does not exist!');
        }
    }

    public function aboutme()
    {
        return view('frontend.aboutme');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function faqs()
    {
        return view('frontend.faq');
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
        $message = new Contact();
        $message->user_id = $request->input('user_id');
        $message->name = ucfirst($request->input('name'));
        $message->email = $request->input('email');
        $message->subject = ucfirst($request->input('subject'));
        $message->message = ucfirst($request->input('message'));
        $message->save();
        return redirect('/contact')->with('status', 'Message successfully send!');
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
