@props(['post'])
<article class="mb-8 bg-white shadow-xl rounded-lg overflow-hidden">

   <div class="w-full h-80 bg-cover bg-center rounded-t-xl" style="background-image: url(@if($post->image) {{$post->image->url}}@else https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg @endif)">

    <div class="w-full h-full px-8 flex flex-col justify-center hidden md:flex lg:flex">
        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
            <a href="{{route('posts.show', $post)}}">
                {{$post->name}}
            </a>
        </h1>
    </div>

    </div>

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2 text-black md:hidden lg:hidden">
            <a href="{{route('posts.show', $post)}}">
                {{$post->name}}
            </a>
        </h1>
        <div class="text-gray-700 text-base">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
           <a href="{{route('posts.tag', $tag)}}" class="inline-block {{$tag->color}} rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a> 
        @endforeach
    </div>
    <div class="flex flex-row-reverse p-4">
        <p class="text-black">Post Date: {{$post->created_at->toFormattedDateString()}}</p>
    </div>
</article>