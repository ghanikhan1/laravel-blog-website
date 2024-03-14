<!DOCTYPE html>
<html>
<head>
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
        {{--        // body--}}
        <div class="flex flex-col items-center space-y-20 mt-4">
            <h1 class="post-title">Add Post</h1>
            <form action="{{route('add_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center space-y-12">
                    <div>
                        <label>Post Title</label>
                        <input type="text" name="title">
                    </div>
                    <div>
                        <label>Post Description</label>
                        <textarea type="textarea" name="description"></textarea>
                    </div>
                    <div>
                        <label>Add Image</label>
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
