
        <div class="form-group">

            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome da etiqueta..']) !!}

            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug da etiqueta..', 'readonly']) !!}

            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>

        <div class="form-group">
           
            {!! Form::label('color', 'Color') !!}
            {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

            @error('slug')
            <small class="text-danger">{{$message}}</small>
            @enderror

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