<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Image;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();
        return view('Frontend.wishlist', compact('wishlistItems'));
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
                if(Wishlist::where('image_id', $image_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $checkImage->title." already added to wishlist!"]);
                } else {
                    $wishItem = new Wishlist();
                    $wishItem->user_id = Auth::id();
                    $wishItem->image_id = $image_id;
                    $wishItem->save();
                    return response()->json(['status' => $checkImage->title." added to wishlist!"]);
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
            if(Wishlist::where('image_id', $image_id)->where('user_id', Auth::id())->exists()){
                $wishlistItem = Cart::where('image_id', $image_id)->where('user_id', Auth::id())->first();
                $wishlistItem->delete();
                return response()->json(['status' => "Removed image successfully"]);
            }
        } else {
            return response()->json(['status' => "You need to login first!"]);
        }
    }

    public function wishlistcount(){
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistcount]);
    }
}
