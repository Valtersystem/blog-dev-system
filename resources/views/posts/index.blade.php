<x-app-layout>
    <div class="container py-8">

      <div class="grid grid-cols-1 md:grid-cols-2 lg:md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        {{-- Aqui estou usando o metodo Storage para exibir a url completa --}}
        {{-- vou usar um if para encontrar a primeira interação do laço
        e alterar o tamanho da div --}}

        <article class="w-full h-80 bg-cover bg-center rounded-xl @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{$post->image->url}}@else https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg @endif)">
            <div class="w-full h-full px-8 flex flex-col justify-center">
                {{-- Estou fazendo um foreach dentro da tabela tags que esta relacionada com os posts  --}}
                <div>
                    @foreach ($post->tags as $tag)
                        <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full ">{{$tag->name}}</a>
                    @endforeach                   
                </div>

                <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                    <a href="{{route('posts.show', $post)}}">
                        {{$post->name}}
                    </a>
                </h1>
            </div>
            
        </article>
        @endforeach
      </div>

      <div class="m-4">
        {{$posts->links()}}
      </div>
       
</x-app-layout>
