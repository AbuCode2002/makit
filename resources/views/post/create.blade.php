@extends('layouts.main')
@section('content')
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" style="width: 60%">
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content" style="width: 60%"></textarea>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image" style="width: 60%">
            </div>
            <div>
                <label for="category">Category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
                <button type="submit" class="btn btn-success">Create</button>
        </form>
@endsection
