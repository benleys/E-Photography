<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fill the 'Category'-dropdown
        $faqcategories = FaqCategory::all();
        return view('admin.faq.add', compact('faqcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->faqcat_id = explode('|', $request->input('faqcat_id'))[0];
        $faq->question = ucfirst($request->input('question'));
        $faq->faqcategory = explode('|', $request->input('faqcat_id'))[1];
        $faq->answer = ucfirst($request->input('answer'));
        $faq->save();
        return redirect('/faq')->with('status', 'FAQ added successfully!');
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
        $faqs = Faq::find($id);
        $faqcategories = Category::all();
        return view('admin.faq.edit', compact('faqs', 'faqcategories'));
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
        $faqs = Faq::find($id);
        $faqs->faqcat_id = explode('|', $request->input('faqcat_id'))[0];
        $faqs->question = ucfirst($request->input('question'));
        $faqs->faqcategory = explode('|', $request->input('faqcat_id'))[1];
        $faqs->answer = ucfirst($request->input('answer'));
        $faqs->update();
        return redirect('/faq')->with('status', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faq::find($id);
        $faqs->delete();
        return redirect('/faq')->with('status', 'FAQ deleted successfully!');
    }
}
