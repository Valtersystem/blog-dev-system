<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome de post']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome do slug', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    
    @foreach ($tags as $tag)

        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null,) !!}
            {{$tag->name}}
        </label>     

    @endforeach    

    @error('tags')
    <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Status</p>

    <label>
        {!! Form::radio('status', 1, true,) !!}
        Rascunho
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
    <br>
     <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
            <img id="imagem" src="{{$post->image->url}}">
            @else
            <img id="imagem" src="https://cdn.pixabay.com/photo/2014/12/27/15/40/office-581131_960_720.jpg">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagem do post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        
            @error('file')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione odit blanditiis, corporis commodi corrupti molestiae illo esse maxime amet inventore nobis quisquam quod quia doloremque et odio earum aut?</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Descrição:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control ckeditor','id' => 'ckeditor']) !!}

    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor', 'id' => 'ckeditor']) !!}

    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>