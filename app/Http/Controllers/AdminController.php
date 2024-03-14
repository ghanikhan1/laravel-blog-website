<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Illuminate\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('components.admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user = Auth()->user();
        // coming from DB user
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;
        $post->post_status = 'active';

        // storing the image in public folder
        $image = $request->image;
        if ($image) {
            // Check if the post already has an image
            if ($post->image){
                        // Build the old image path
                $oldImagePath = public_path('postimage/'. $post->image);
                dd($oldImagePath);
                        // Check if the image file exists and delete it
                if (File::exists($oldImagePath)){
                    File::delete($oldImagePath);
                }
            }
            // Proceed to store the new image
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            // storing the image name in DB
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function show_post(Request $request)
    {
        return view('components.admin.show_post');
    }
}
