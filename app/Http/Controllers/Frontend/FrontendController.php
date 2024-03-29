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
        $images = Image::orderBy('created_at', 'desc')->get();
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
        $messages = Contact::all();
        $publicMessages = Contact::where('published', '1')->get();
        return view('frontend.contact', compact('messages', 'publicMessages'));
    }

    public function insertContactMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if(Auth::check()){
            $message = new Contact();
            $message->user_id = $request->input('user_id');
            // $message->name = ucfirst($validated['name']);
            // $message->email = $validated['email'];
            $message->subject = ucfirst($validated['subject']);
            $message->message = ucfirst($validated['message']);
            $message->published = $request->input('published') == TRUE ? '1':'0';
            $message->save();
            return redirect('/contact')->with('status', 'Message successfully send!');
        } else {
            return redirect('/login')->with('badstatus', 'You need to login first!');
        }
    }

    public function contactmessage($id){
        $messages = Contact::find($id);
        return view('frontend.contact.contactmessage', compact('messages'));
    }

    public function updateContactMessage(Request $request, $id) //UPDATE
    {
        $messages = Contact::find($id);
        $messages->subject = ucfirst($request->input('subject'));
        $messages->message = ucfirst($request->input('message'));
        $messages->published = $request->input('published') == TRUE ? '1':'0';
        $messages->update();
        return redirect('/contact')->with('status', 'Message successfully updated!');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteContactMessage($id)
    {
        $messages = Contact::find($id);
        $messages->delete();
        return redirect('/contact')->with('status', 'Message deleted successfully!');
    }

    public function faqs()
    {
        $faqs = Faq::all();
        $faqcategories = FaqCategory::all();
        return view('frontend.faq', compact('faqs', 'faqcategories'));
    }
}
