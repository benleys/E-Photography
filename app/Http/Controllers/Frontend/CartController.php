<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_id = $request->input('image_id');

        if(Auth::check()){
            $checkImage = Image::where('id', $image_id)->first();

            if($checkImage){
                if(Cart::where('image_id', $image_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $checkImage->title." already added to cart!"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->image_id = $image_id;
                    $cartItem->save();
                    return response()->json(['status' => $checkImage->title." added to cart!"]);
                }
            }
        } else {
            return response()->json(['status' => "You need to login first!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check()){
            $image_id = $request->input('image_id');
            if(Cart::where('image_id', $image_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Cart::where('image_id', $image_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Removed image successfully"]);
            }
        } else {
            return response()->json(['status' => "You need to login first!"]);
        }
    }

    public function cartcount(){
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }
}
