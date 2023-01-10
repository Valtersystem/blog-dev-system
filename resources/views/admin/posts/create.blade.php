@extends('adminlte::page')

@section('title', 'Dev Valtinho')

@section('content_header')
    <h1>Criar novo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplite' => 'off', 'files' => true]) !!}

           @include('admin.posts.partials.form')

            {!! Form::submit('Criar post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
        <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.js')}}"></script>
        <script src="//cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

        <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
                });
            });

            ClassicEditor
            .create(document.querySelector('#extract'))
            .catch( error => {
                console.log(error);
            });

            ClassicEditor
            .create(document.querySelector('#body'))
            .catch( error => {
                console.log(error);
            });

            //Preview img
            document.getElementById("file").addEventListener('change', previewImagem);
           function previewImagem(evento){
             var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (evento) => {
                 document.getElementById("imagem").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
           }


        </script>
@stop