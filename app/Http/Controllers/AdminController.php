<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $posts = Post::all();
        return view('components.admin.show_post', compact('posts'));
    }

    public function delete_post($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->back()
            ->with('message', 'Post Deleted successfully!');
    }

    public function edit_post($id)
    {
        $post = Post::findorfail($id);

        return view('components.admin.edit_post', compact('post'));
    }

    public function update_post(Request $request,$id)
    {
        $data = Post::findorfail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;

        if ($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            // storing the image name in DB
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message'.'Post Updated successfully');
    }
}
