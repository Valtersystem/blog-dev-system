@props(['post'])



{{-- <article class="mb-8 bg-white shadow-xl rounded-lg overflow-hidden">

   <div class="w-full h-80 bg-cover bg-center rounded-t-xl" style="background-image: url(@if ($post->image) {{$post->image->url}}@else https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg @endif)">

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


<article class="flex transition hover:shadow-xl bg-gray-800 shadow-gray-800/25 my-8 rounded-xl">
    <div class="rotate-180 p-3 [writing-mode:_vertical-lr]">
        <time datetime="2022-10-10"
            class="flex items-center justify-between gap-4 text-xs font-bold uppercase text-white">
            <span>{{$post->created_at->isoFormat('YYYY')}}</span>
            <span class="w-px flex-1 bg-white/10"></span>
            <span>{{$post->created_at->isoFormat('MMMM  -  YY')}}</span>
        </time>
    </div>

    <div class="hidden sm:block sm:basis-56">
        @if ($post->image)
          <img alt="Guitar" src="{{ $post->image->url }}" class="aspect-square h-full w-full object-cover" />
        @else
          <img alt="Guitar" src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg" class="aspect-square h-full w-full object-cover" />
        @endif
    </div>

    <div class="flex flex-1 flex-col justify-between">
        <div class="border-l  p-4 border-white/10 sm:!border-l-transparent sm:p-6">
            <a href="{{ route('posts.show', $post) }}">
                <h3 class="font-bold uppercase text-white">
                    {{ $post->name }}
                </h3>
            </a>

            <p class="mt-2 text-sm leading-relaxed line-clamp-3 text-gray-200">
                {!! $post->extract !!}
            </p>
        </div>

        <div class="sm:flex sm:items-end sm:justify-end">
            <a href="{{ route('posts.show', $post) }}"
                class="block bg-violet-700 px-5 py-3 text-center text-xs font-bold uppercase text-white transition hover:bg-violet-900">
                Read Blog
            </a>
        </div>
    </div>
</article>
