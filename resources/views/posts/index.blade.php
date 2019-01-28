<!--import from layouts/app -->
@extends('layouts/app')

@section('content')
    <h1 class="text-center">Posts</h1>
    @if(count ($posts) > 0)
        @foreach ($posts as $post)
            <div  class="well">
               <h3><a href="/laravApp/public/posts/{{$post->id}}"> {{$post->title}} </a></h3>
               <small>written on  {{$post->created_at}} by {{$post->user->name}}</small>
               <hr>
            </div>
        @endforeach
        
    @else
            <p>No Post found</p>
    @endif
            <!--bring here pagination betrween pages 5posts/page -->
            {{$posts->links()}}
@endsection()