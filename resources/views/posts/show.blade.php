<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-white">{{$post->name}}</h1>

        <div class="text-lg text-white mb-4">
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Container principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                    <img class="w-full h-80 object-cover object-center rounded-2xl" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                    <img class="w-full h-80 object-cover object-center rounded-2xl" src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-white mt-4">
                    {!!$post->body!!}
                </div>
            </div>

            {{-- Container realacional  --}}
            <aside>
                <h1 class="text-2xl font-bold text-white mb-4">Sobre: {{$post->category->name}}</h1>
            
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex items-center" href="{{route('posts.show', $similar)}}">
                                @if ($similar->image)
                                <img class=" max-w-[8rem] h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="{{$similar->name}}">                               
                                @else
                                <img class="max-w-[8rem] w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg" alt="">
                                    
                                @endif
                                <span class="ml-2 text-white">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </aside>
        </div>
    </div>
</x-app-layout>