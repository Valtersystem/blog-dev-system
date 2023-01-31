@props(['post'])



{{-- <article class="mb-8 bg-white shadow-xl rounded-lg overflow-hidden">

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
</article> --}}


<div class="bg-gray-800 overflow-hidden relative rounded-2xl my-8">
    <div class="text-start w-1/2 py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            <span class="block">
                <a href="{{route('posts.show', $post)}}">
                {{$post->name}}
                </a>
            </span>
            {{-- <span class="block text-indigo-500">
                It&#x27;s today or never.
            </span> --}}
        </h2>
        <p class="text-xl mt-4 text-gray-400">
            {!!$post->extract!!}
        </p>
        <div class="lg:mt-0 lg:flex-shrink-0">
            <div class="mt-12 inline-flex rounded-md shadow gap-3">
                @foreach ($post->tags as $tag)
                <a href="{{route('posts.tag', $tag)}}" class="py-2 px-4 {{$tag->color}}  text-white w-full  text-center text-base font-semibold shadow-md rounded-lg ">
                    {{$tag->name}}
                </a>
                </button>
                @endforeach
            </div>
        </div>
    </div>
    @if ($post->image)
    <img src="{{$post->image->url}}" class="absolute top-0 right-0 hidden h-full max-w-1/2 lg:block"/>
    @else
    <img src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg" class="absolute top-0 right-0 hidden h-full max-w-1/2 lg:block"/>
    @endif
</div>

