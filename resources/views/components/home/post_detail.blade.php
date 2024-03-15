<x-layout.app>
    <div  class="col-md-12 flex flex-col items-center py-20">
        <div><img style="height: 300px; width: 450px; margin: auto"  src="{{'/postimage/'.$post->image}}" class="services_img"></div>
        <h4>{{$post->title}}</h4>
        <p>Post by <b>{{$post->name}}</b></p>
        <h4>{{$post->description}}</h4>
    </div>
</x-layout.app>
