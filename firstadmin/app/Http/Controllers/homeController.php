<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\likepost;
use App\Models\post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    // home
    public function home()
    {
        $user = User::where('role', 'user')->where('block', '0')->where('is_Delete', '0')->count();

        $block = User::where('role', 'user')->where('block', '1')->count();

        $likepost = Likepost::all()->count();

        $post = Post::where('is_deleted', '0')->count();

        $comment = Comment::where('is_deleted', '0')->count();

        return view('home', compact('user', 'block', 'post', 'comment', 'likepost'));

    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect('./');
    }

    public function adminprofile(Request $request)
    {

        $admindata = User::where('role', '=', 'admin')->first();
        // $admindata = Auth::login($user)->where('role', '=', 'admin');

        return view('profile')->With('admindata', $admindata);

    }
    public function updateProfile(Request $request)
    {
        $admindata = User::where('role', '=', 'admin')->first()->id;

        if ($request->isMethod("post")) {
            $data = [
                'name' => !$request->name ? $admindata->name : $request->name,

            ];

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $destinationPath = 'img/';
                $filename = 'img/admin_img_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename); // this will upload the image in the destination folder
                $data['image'] = $filename; // Image name to be saved in the database
            }

            $updatedata = User::where('id', $admindata)->update($data);
            return redirect()->back()->with('success', 'Data Updated');

        }
    }
    public function users()
    {
        $user = User::where('role', 'user')->where('block', '0')->where('is_Delete', '0')->get();

        return view('layouts.user')->with('user', $user);
    }
    public function block($id)
    {

        $data = [
            'block' => '1',
        ];

        $user = User::where('id', $id)->update($data);

        session::flash('success_message', 'User blocked successfully');
        return redirect()->back();

    }
    //unblock
    public function blockuser()
    {
        $user = User::where('role', 'user')->where('block', '1')->where('is_Delete', '0')->get();

        return view('layouts.Block')->with('user', $user);
    }

    public function unblock($id)
    {

        $data = [
            'block' => '0',
        ];
        $user = User::where('id', $id)->update($data);
        session::flash('success_message', 'User unblocked successfully');
        return redirect()->back();

    }
    //Delete

    public function delete($id)
    {

        $data = [
            'is_Delete' => '1',
        ];
        $user = User::where('id', $id)->update($data);
        session::flash('success_message', 'User unblocked successfully');
        return redirect()->back()->with('success', 'User Delete');

    }

    public function editPassword()
    {
        $user = User::find(auth()->id());
        return view('auth.change-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);

        $user = User::find(auth()->id());
        $old_password = auth()->user()->password;

        if (Hash::check($request->oldpassword, $old_password)) {

            if (!Hash::check($request->newpassword, $old_password)) {
                $user->password = bcrypt($request->newpassword);
                $user->save();
                session()->flash('message', 'password updated successfully');
                return back();
            } else {
                session()->flash('message', 'new password can not be the old password!');
                return back();
            }

        } else {
            session()->flash('message', 'old password doesnt matched ');
            return back();
        }
    }

    public function userprofile($id)
    {

        $userdata = User::where('id', $id)->first();
        // $userdata = Auth::login($user)->where('role', '=', 'admin');

        return view('layouts.userdetail')->With('userdata', $userdata);

    }
    //sample
    public function daam()
    {
        $user = User::where('role', 'user')->where('is_Delete', '0')->count();
        return view('home')->with('user', $user);

    }
    //user profile
    public function updateUser(Request $request)
    {

        $email = $request->input('email');

        // dd($email);

        // $userdata = User::where('email', $email)->first();
        $userdata = $email;
        // dd($userdata);

        if ($request) {
            $data = [
                'name' => !$request->name ? $userdata->name : $request->name,
                'Education' => !$request->Education ? $userdata->Education : $request->Education,
                'Country' => !$request->Country ? $userdata->Country : $request->Country,
                'State_Region' => !$request->State_Region ? $userdata->State_Region : $request->State_Region,
                'Experience_in_Designing' => !$request->Experience_in_Designing ? $userdata->Experience_in_Designing : $request->Experience_in_Designing,
                'Additional_Details' => !$request->Additional_Details ? $userdata->Additional_Details : $request->Additional_Details,
                'Address' => !$request->Address ? $userdata->Address : $request->Address,

            ];
            // dd($data);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $destinationPath = 'img/';
                $filename = 'img/admin_img_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename); // this will upload the image in the destination folder
                $data['image'] = $filename; // Image name to be saved in the database
            }

            $updatedata = User::where('email', $userdata)->update($data);
            // dd($updatedata);
            return redirect()->back()->with('success', 'Data Updated');

        }
    }
    //password change
    public function changePassword(Request $request)
    {
        // dd('Helo-');
        if ($request->isMethod("post")) {
            $admindata = user::where('role', 'admin')->first();

            $passmatch = Hash::check($request->old_password, $admindata->password);

            if ($request->old_password == "") {
                session::flash('error', 'Please enter the old password');
                return redirect('/profile')->withInput();
            }
            if (!$passmatch) {
                session::flash('error', 'Old password donot match  with our record');
                return redirect()->back()->withInput();

                // return redirect('/profile')->withInput();
            } elseif ($request->new_password == "") {
                session::flash('error', 'Please enter the new password');
                return redirect()->back()->withInput();
                // } elseif ($request->new_password != $request->confirm_password) {
                //     session::flash('error', 'New password and confirm passsword should be same');
                //     return redirect()->back()->withInput();
            } else {
                $data = [
                    'password' => (Hash::make($request->new_password)),
                ];

                $updatepassword = User::where('id', $admindata->id)->update($data);

                if ($updatepassword) {
                    session::flash('success_update', 'Password update successfully');
                    return redirect('/profile');

                }
            }
            return redirect('/profile');
        }

    }
    //admin control post delete
    public function AdeletePost(Request $request, $id)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required|exists:users,id',
                ],
                [
                    'id.exists' => 'User not found.',
                ]
            );

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $post = [
                'id' => $request->id,

            ];

            $update = [
                'is_deleted' => '1',
            ];
            Post::where('id', $request->id)->update($update);

            return response()->json([
                'status' => true,
                'msg' => 'Post Deleted successfully',
            ]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
