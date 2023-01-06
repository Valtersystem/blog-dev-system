<div class="card">
    <div class="card-header">
        <input wire:model='search' class="form-control" placeholder="Pesquisar post"  type="text">
    </div>

    @if ($posts->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td with="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar
                            </a>
                        </td with="10px">
                        <td>
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>     
    @else
    <div class="card-body">
        <strong>Post não encontrado....</strong>
    </div>
    @endif
</div>
