<?php

namespace App\Http\Controllers\Admin;

use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqcategories = FaqCategory::all();
        return view('admin.faq.category.index', compact('faqcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faqcategory = new FaqCategory();
        $faqcategory->name = ucfirst($request->input('name'));
        $faqcategory->description = ucfirst($request->input('description'));
        $faqcategory->save();
        return redirect('/faqcategories')->with('status', 'FAQ Category added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqcategories = FaqCategory::find($id);
        return view('admin.faq.category.edit', compact('faqcategories'));
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
        $faqcategories = FaqCategory::find($id);
        $faqcategories->name = ucfirst($request->input('name'));
        $faqcategories->description = ucfirst($request->input('description'));
        $faqcategories->update();
        return redirect('/faqcategories')->with('status', 'FAQ Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqcategories = FaqCategory::find($id);
        $faqcategories->delete();
        return redirect('/faqcategories')->with('status', 'FAQ Category deleted successfully!');
    }
}
