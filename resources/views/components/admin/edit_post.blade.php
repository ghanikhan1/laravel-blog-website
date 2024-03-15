<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <x-admin.css/>
</head>
<body>

<x-admin.header/>

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <x-admin.siderbar/>
    <!-- Sidebar Navigation end-->
    <div class="page-content">

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif

        <div class="flex flex-col items-center space-y-20 mt-4">
            <h1 class="post-title">Update Post</h1>
            <form action="{{route('update_post',['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center space-y-12">
                    <div>
                        <label>Post Title</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}">
                    </div>
                    <div>
                        <label>Post Description</label>
                        <textarea type="textarea" name="description">{{ $post->description }}</textarea>
                    </div>
                    <div>
                        <label>Old Image</label>
                        <img width="100px" src="postimage/{{$post->image}}">
                    </div>
                    <div>
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <button class="w-fit rounded-lg bg-gray-300 p-2" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <x-admin.footer/>
    </div>
</div>
<!-- JavaScript files-->
<x-admin.js-file/>
</body>
</html>
