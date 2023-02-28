<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\likepost;
use App\Models\post;
use App\Models\replycomment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //login api for user
    public function Ulogin(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',

            ]);
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Email is not matched with our record',
                ]);
            } else {
                $login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if ($login) {
                    $usertoken = Auth::user();
                    $token = $usertoken->createToken('token')->plainTextToken;

                    // $userid = Auth::id();
                    // dd($userid);

                    return response()->json([
                        'status' => true,
                        'msg' => 'Login successfully',
                        'data' => $user,
                        'token' => $token,
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Invalid Credentials',
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage(),
            ]);
        }
    }
    //NEW POST API

    public function newPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'category' => 'required',

            ], [
                'user_id.exists' => 'User not found.',

            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $userid = Auth::id();
            // DD($userid);

            $post = [
                'user_id' => $userid,
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,

            ];

            $insertpost = Post::create($post);

            return response()->json([
                'status' => true,
                'msg' => ' Post Added successfully',
            ]);
            // return $this->successResponse(' New post created successfully.', $post);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //delete

    public function deletePost(Request $request, $id)
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
            $userid = Auth::id();
            $post = [
                'id' => $request->id,
                'user_id' => $userid,
            ];

            $update = [
                'is_deleted' => '1',
            ];
            Post::where('id', $request->id)->where('user_id', $userid)->update($update);

            return response()->json([
                'status' => true,
                'msg' => 'Post Deleted successfully',
            ]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //update
    public function updatePost(Request $request)
    {

        $post = Post::where('id', $request->id)->first();

        $updateData = [
            'user_id' => $post['user_id'],
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ];

        Post::where('id', $request->id)->update($updateData);

        return response()->json([
            'status' => true,

        ]);

    }
    public function posts()
    {
        $post = Post::where('is_deleted', '0')->get();

        return response()->json([
            'status' => true,
            'msg' => $post,
        ]);

        // return view('')->with('user', $user);
    }
    public function Aposts()
    {
        $userid = Auth::id();
        $post = Post::where('user_id', $userid)->where('is_deleted', '0')->get();
        return response()->json([
            'status' => true,
            'msg' => $post,
        ]);

        // return view('')->with('user', $user);
    }
    //posts
    public function Post($user_id)
    {

        $post = Post::where('is_deleted', '0')->where('user_id', $user_id)->get();

        return view('layouts.posts')->with('post', $post);
    }
    //like/dislike
    public function status(Request $request)
    {

        $post = [
            'user_id' => $request->userid,
            'post_id' => $request->postid,
            'post_status' => $request->post_status,

        ];
        $status = likepost::create($post);

        return response()->json([
            'status' => true,
            'msg' => ' Post Added successfully',
        ]);

    }
    //comments
    public function comment(Request $request)
    {
        $post = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'name' => $request->name,
            'comment' => $request->comment,
        ];
        $status = comment::create($post);

        return response()->json([
            'status' => true,
            'msg' => ' Comment Added successfully',
        ]);

    }
    //replycomments
    public function replycomment(Request $request)
    {
        $post = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'replycomment' => $request->replycomment,
        ];
        $status = replycomment::create($post);

        return response()->json([
            'status' => true,
            'msg' => ' Comment reply Added successfully',
        ]);

    }

}
