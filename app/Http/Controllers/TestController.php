<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestController extends Controller
{

    public function index()
    {
        //
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


    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        if($user){

            $user->name = $request->name;
            $user->email = $request->email;

            $profile_picture = $request->file('profile_picture');

            if($profile_picture){

                if($user->profile_picture){
                    unlink($user->profile_picture);
                }
    
                $profile_picture_name = Str::slug($request->name)."-".rand(100,999);
                $ext = strtolower($profile_picture->getClientOriginalExtension());
                $profile_picture_full_name=$profile_picture_name.".".$ext;
                $upload_path='uploads/profile/';
                $profile_picture_url=$upload_path.$profile_picture_full_name;
                $success=$profile_picture->move($upload_path,$profile_picture_full_name);
                if ($success) {
                    $user->profile_picture = $profile_picture_url;
                }
            }


            $cover_photo = $request->file('cover_photo');

            if($cover_photo){

                if($user->cover_photo){
                    unlink($user->cover_photo);
                }
    
                $cover_photo_name = Str::slug($request->name)."-".rand(100,999);
                $ext = strtolower($cover_photo->getClientOriginalExtension());
                $cover_photo_full_name=$cover_photo_name.".".$ext;
                $upload_path='uploads/cover/';
                $cover_photo_url=$upload_path.$cover_photo_full_name;
                $success=$cover_photo->move($upload_path,$cover_photo_full_name);
                if ($success) {
                    $user->cover_photo = $cover_photo_url;
                }
            }


            if($user->save()){


                $data['status'] = false;
                $data['message'] = "Profile successfully updated.";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server error.";
                return response()->json($data, 500);

            }


        }else{
            $data['status'] = false;
            $data['message'] = "You are not allowed to change data for a default user.";
            return response()->json($data, 404);
        }
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
