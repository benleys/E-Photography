<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/profile-image', $filename);
            $user->image = $filename;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('admin') == TRUE ? '1':'0';
        $user->save();
        return redirect('/users')->with('status', 'User added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.user.edit', compact('users'));
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
        $users = User::find($id);
        if($request->hasFile('image')){
            $filepath = 'assets/uploads/profile-image/'.$users->image;
            if(File::exists($filepath)){
                File::delete($filepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/uploads/profile-image', $filename);
            $users->image = $filename;
        }
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->user_type = $request->input('admin') == TRUE ? '1':'0';
        $users->update();
        return redirect('/users')->with('status', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if($users->image){
            $filepath = 'assets/uploads/profile-image/'.$users->image;
            if(File::exists($filepath)){
                File::delete($filepath);
            }
        }
        $users->delete();
        return redirect('/users')->with('status', 'User deleted successfully!');
    }
}
