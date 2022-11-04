@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div>
            <div>{{$post->id}}. {{$post->title}}</div>
            <div>{{$post->content}}</div>
        </div>
        <div>
            <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
        </div>
        <p>
        <div>
            <form action="{{route('post.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
            </form>
        </div>
        <p>
        <div>
            <a href="{{route('post.index')}}" class="btn btn-outline-info btn-sm">Back</a>
        </div>
    </div>

    <p>
    <section class="comment-section">
        <form action="{{route('post.comment', $post->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <label for="comment" class="sr-only">Комментарий</label>
                    <textarea type="text" name="message" id="message" class="form-control"
                              placeholder="Написать комментарий"
                              style="width: 60%">
                </textarea>
                </div>
            </div>

            <p>
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <input type="submit" class="btn btn-outline-danger btn-sm">
                </div>
            </div>
        </form>
    </section>

    <div class="container-fluid">
        @foreach($comments as $comment  )
            <div><p>{{$comment->message}}</p></div>

            <div>
                <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
            </div>
            <p>
            <div>
                <form action="{{route('post.destroy', $comment->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                </form>
            </div>
        @endforeach
    </div>
@endsection
