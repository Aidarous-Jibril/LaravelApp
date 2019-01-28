<!--import from layouts/app -->
@extends('layouts/app')

@section('content')
 <hr> 
<a href="/laravApp/public/posts" class="btn btn-primary">Go Back</a> 
<hr>
    <h3> {{$post->title}} </h3>

      <div>
          {{$post->body}}
      </div>

      <hr>
      <small> written on {{$post->created_at}} by {{$post->user->name}}</small>
  
      
      <hr>
      <!--only show if User is logged and Not GUEST -->
      @if(!auth::guest()) 

            <!--not delete/edit others posts-->
            @if(auth::user()->id == $post->user_id)
                <a href="/laravApp/public/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>  

                <!-- hidden form submit request DELETE type -->
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'text-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}

            @endif    
      @endif    



      <br><br>
      <!--SHOW COMMENTS BELOW-->
      <h3 class="text-center">Comments</h3>       
            <ul class="list-group">
                @foreach($post->comments as $comment)
                  <li class="list-group-item">
                    {{ $comment->body }}
                  </li>   
                @endforeach
            </ul>    
            
      
     <br><br>

           <!--CREATE COMMENTS FORM HERE BELOW-->
        {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
           <div class="form-group">
               
               {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'leave a comment'])}}
               <!-- pass here hidden post_id value along with comment's body -->
               {{ Form::hidden('post_id', $post->id) }} 
           </div>
            
           {{Form::submit('Submit', ['class'=>'btn btn-primary btn-lg'])}}
        {!! Form::close() !!}

@endsection()