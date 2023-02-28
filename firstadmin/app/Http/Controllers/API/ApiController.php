<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //sign
    public function getImage($image)
    {
        if (!empty($image)) {
            $img = url('/') . "/" . $image;
        } else {
            $img = '';
        }
        return $img;
    }
    public function getvideo($video)
    {
        if (!empty($video)) {
            $video = url('/') . "/" . $video;
        } else {
            $video = '';
        }
        return $video;
    }
    public $destinationPath = 'images/';
    public $videoPath = 'video/';

    //Signup api
    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'Block' => $request->Block,
                'password' => Hash::make($request->password),
                'country_code' => $request->country_code,
                'mobile_no' => $request->mobile_no,
                'lat' => $request->lat,
                'long' => $request->long,

            ];
            $image_url = '';
            $video_url = '';
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $filename = 'Transection_img_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move($this->destinationPath, $filename); // this will upload the image in the destination folder
                $data['images'] = $filename; // Image name to be saved in the database
                $image_url = $this->getImage($this->destinationPath . '' . $filename);
            }
            if ($request->hasfile('video')) {
                $video = $request->file('video');
                $videoname = 'video_' . time() . '.' . $video->getClientOriginalExtension();
                $video->move($this->videoPath, $videoname); // this will upload the image in the destination folder
                $data['video'] = $videoname; // Image name to be saved in the database
                $video_url = $this->getvideo($this->videoPath . '' . $videoname);
            }

            $insertdata = User::create($data);
            $token = $insertdata->createToken('token')->plainTextToken;
            $insertdata->token = $token;
            $insertdata->image_url = $image_url;
            $insertdata->video_url = $video_url;

            // return response()->json([
            //     'status' => true,
            //     'msg' => 'User register successfully',
            //     'data' => $insertdata,

            // ]);
            return redirect()->back()->with('message', 'Psst! You’re on the list?');

        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Failed! Please Enter Proper Detail');

            // return response()->json([
            //     'status' => false,
            //     'msg' => $e->getMessage(),
            // ]);
        }
    }
    //Login api
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $user = User::where('email', $request->email)->where('role', '=', 'admin')->first();
            if (!$user) {
                session()->flash('message', 'Invalid Credentials,Email is not matched');
                return back();

                // return redirect()->back()->with('message', 'Invalid Credentials,Email is not matched');

                // return response()->json([
                //     'status' => false,
                //     'msg' => 'Email is not matched with our record',
                // ]);
            } else {

                $login = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
                // $token = $usertoken->createToken('token')->plainTextToken;

                if ($login) {

                    return redirect('/home');
                    // return '/home';

                    // return response()->json([
                    //     'status' => true,
                    //     'msg' => 'Login successfully',
                    //     'data' => $user,
                    //     // 'token' => $token,
                    // ]);
                } else {
                    // return response()->json([
                    //     'status' => false,
                    //     'msg' => 'Invalid Credentials',
                    // ]);
                    session()->flash('message', 'Invalid Credentials');
                    return back();

                    // return redirect()->back()->with('message', 'Invalid Credentials');

                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage(),
            ]);
        }
    }
    public function index()
    {

        return view('change-password');
    }

}
