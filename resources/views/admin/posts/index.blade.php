@extends('adminlte::page')

@section('title', 'Dev System')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Crirar post</a>
    
    <h1>Listando posts</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

   @livewire('admin.posts-index')
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop