<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.profile')->with('user', Auth::user());
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
    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url'
        ]);
        
        if($request->has('old_password')) {
            $this->validate($request, [
                'new_password' => 'required'
            ]);

            if (Hash::check(Hash::make($request->new_password), $user->password)) {
                Session::flash('error', 'Old Password and New Password can\'t be same.');

                return redirect()->back();
            }else {
                if (Hash::check($request->old_password, $user->password)) { 
                    $user->fill([
                     'password' => Hash::make($request->new_password)
                     ])->save();
                 } else {
                     Session::flash('error', 'Old Password does not match with the current Password');
                     return redirect()->back();
                 }
            }
        }

        if($request->hasFile('avatar')) {
            $newAvatar = $request->avatar;

            $newAvatarFileName = md5(time().$newAvatar->getClientOriginalName()).$newAvatar->getClientOriginalName();
        
            $newAvatar->move(public_path('/uploads/avatars/'), $newAvatarFileName);

            $user->profile->avatar = '/uploads/avatars/'.$newAvatarFileName;

            $user->profile->save();
        }

        if($request->has('about')) {
            $user->profile->about = $request->about;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        Session::flash('success', 'Profile Inforamtion updated successfully');

        return redirect()->back();
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
