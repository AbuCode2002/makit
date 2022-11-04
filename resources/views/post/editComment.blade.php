@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('comment.update', $post->id )}}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <label for="comment" class="sr-only">Комментарий</label>
                    <textarea type="text" name="message" id="message" class="form-control"
                              placeholder="Написать комментарий"
                              style="width: 60%">
                        {{$comment->message}}
                    </textarea>
                </div>
            </div>
            <p>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
