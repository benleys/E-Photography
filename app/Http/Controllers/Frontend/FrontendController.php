<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Image;
use App\Models\Contact;
use App\Models\Category;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function viewimage($image){
        if(Image::where('image', $image)->exists()){
            $images = Image::where('image', $image)->first();
            return view('frontend.images.view', compact('images'));
        } else {
            return redirect('/')->with('status', 'No such image found!');
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

    public function insertContactMessage(Request $request)
    {
        if(Auth::id()){
            $message = new Contact();
            $message->user_id = $request->input('user_id');
            $message->name = ucfirst($request->input('name'));
            $message->email = $request->input('email');
            $message->subject = ucfirst($request->input('subject'));
            $message->message = ucfirst($request->input('message'));
            $message->save();
            return redirect('/contact')->with('status', 'Message successfully send!');
        } else {
            return redirect('/login')->with('badstatus', 'You need to login first!');
        }
    }

    public function faqs()
    {
        $faqs = Faq::all();
        $faqcategories = FaqCategory::all();
        return view('frontend.faq', compact('faqs', 'faqcategories'));
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
