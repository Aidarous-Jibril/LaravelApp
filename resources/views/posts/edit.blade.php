<!--import from layouts/app -->
@extends('layouts/app')

@section('content')
    <h1>Edit Post</h1>
     <!--here i use controller actions instead of URL --> 
    {!! Form::open(['action' =>  ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

         <!--for title --> 
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

         <!--for body --> 
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
         
        <!-- hidden form submit request PUT type -->
        {{Form::hidden('_method','PUT')}} 
        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-lg'])}}
    {!! Form::close() !!}
@endsection