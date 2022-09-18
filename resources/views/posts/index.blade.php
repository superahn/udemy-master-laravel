@extends('layouts.app')

@section('title', 'Blog Posts')
    
@section('content')
  @foreach ($posts as $key => $post)
  <h1>{{ $key }}. {{ $post['title'] }}</h1>
  <p>{{ $post['content'] }}</p><br/>
  @endforeach
@endsection
  
