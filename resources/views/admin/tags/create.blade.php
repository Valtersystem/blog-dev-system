@extends('adminlte::page')

@section('title', 'Dev System | Criar tags')

@section('content_header')
    <h1>Criar tags</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store']) !!}

        @include('admin.tags.partials.form')

        {!! Form::submit('Criar etiqueta', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
  </div>

  @section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.js')}}"></script>

  <script>
  $(document).ready( function() {
      $("#name").stringToSlug({
      setEvents: 'keyup keydown blur',
      getPut: '#slug',
      space: '-'
      });
  });
</script>
@stop

@stop