@extends('layouts.main')
@section('content')
        <div class="container-fluid">
            <div>
                <a href="{{route('post.create')}}" class="btn btn-primary">Add create</a>
            </div>
            @foreach($posts as $post  )
                <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}.{{$post->title}}</a></div>
            @endforeach
        </div>
@endsection
