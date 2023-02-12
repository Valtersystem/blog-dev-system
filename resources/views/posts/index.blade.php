<x-app-layout>
    <div class="container py-8">

      <div class="grid grid-cols-1 md:grid-cols-2 lg:md:grid-cols-3 gap-6 pt-16">
        @foreach ($posts as $post)
        {{-- Aqui estou usando o metodo Storage para exibir a url completa --}}
        {{-- vou usar um if para encontrar a primeira interação do laço
        e alterar o tamanho da div --}}

        {{-- <article class="w-full h-80 bg-cover bg-center rounded-xl border-solid hover:border-violet-900 border border-transparent  @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{$post->image->url}}@else https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg @endif)">
            <div class="w-full h-full px-8 flex flex-col justify-center"> --}}
                {{-- Estou fazendo um foreach dentro da tabela tags que esta relacionada com os posts  --}}
                {{-- <div>
                    @foreach ($post->tags as $tag)
                        <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 {{$tag->color}}  text-white rounded-full ">{{$tag->name}}</a>
                    @endforeach                   
                </div>

                <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                    <a href="{{route('posts.show', $post)}}">
                        {{$post->name}}
                    </a>
                </h1>
                <p class="text-white absolute mt-72">Post Date: {{$post->created_at->toFormattedDateString()}}</p>
            </div>
            
        </article> --}}


        <div class="m-auto overflow-hidden rounded-lg shadow-lg cursor-pointer h-full w-11/12 md:w-96 flex flex-col">
           
                @if ($post->image)
                <img alt="blog photo" src="{{$post->image->url}}" class="object-cover w-full max-h-44"/>
                @else
                <img alt="blog photo" src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg" class="object-cover w-full max-h-44"/>
                @endif

                <div class="w-full p-4 bg-gray-800 h-full flex flex-col justify-around">
                    <p class="font-medium text-indigo-500 text-xs font-bold">
                        POST DATE: {{$post->created_at->isoFormat('YYYY-MM-YY')}}
                    </p>
                    <p class="mb-2 text-xl font-medium text-white">
                        <a href="{{route('posts.show', $post)}}">
                            {{$post->name}}
                        </a>
                    </p>
                    {{-- <p class="font-light text-gray-400 dark:text-gray-300 text-md">
                        {!!$post->extract!!}
                    </p> --}}
                    <div class="flex flex-wrap items-center mt-4 justify-starts gap-3">
                        @foreach ($post->tags as $tag)
                        <div class="whitespace-nowrap rounded-full {{$tag->color}} px-2.5 py-0.5 text-xs text-white">
                            <a href="{{route('posts.tag', $tag)}}">
                                {{$tag->name}}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
           
        </div>






        @endforeach
      </div>

      <div class="m-4">
        {{$posts->links()}}
      </div>
       
</x-app-layout>
