@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id )}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">

                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                           style="width: 60%"
                           value="{{$post->title}}">
                </div>

                <div class="mb-3">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" placeholder="Content"
                              style="width: 60%">{{$post->content}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                           style="width: 60%" value="{{$post->image}}">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $category)
                            <option {{$category->id === $category->id ? 'selected' :''}}
                                    value="{{$category->id}}">{{$category->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple class="form-control" id='tags' name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
