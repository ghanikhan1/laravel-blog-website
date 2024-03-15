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
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif

        <div class="mt-10 flex flex-col space-y-6 justify-center items-center">
            <h1 class="text-2xl text-white font-semibold">All Posts</h1>
            <table class="p-4 flex justify-center border border-gray-200 flex w-fit">
                <tr class="flex space-x-32 bg-blue-200 my-4">
                    <td>Post title</td>
                    <td>Description</td>
                    <td>Post by</td>
                    <td>User type</td>
                    <td>Image</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
                @foreach($posts as $post)

                    <tr class="flex space-x-28">
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->usertype}}</td>
                        <td>
                            <img class="px-4 flex" height="100px" width="150px" src="postimage/{{$post->image}}">
                        </td>
                        <td>
{{--                            <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a>--}}
                            <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger delete-confirm" data-id="{{$post->id}}">Delete</a>
                        </td>
                        <td>
                            <a href="{{url('edit_post', $post->id)}}" class="btn btn-success">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        <x-admin.footer/>
    </div>
</div>
<!-- JavaScript files-->
<x-admin.js-file/>
</body>
</html>


<script>
    document.querySelectorAll('.delete-confirm').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const postId = this.dataset.id; // Retrieve the post ID from the data-id attribute

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, redirect to the delete route
                    window.location.href = `{{url('delete_post')}}/${postId}`;
                }
            });
        });
    });
</script>

