@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $post->title }}</h3></div>
                <div class="card-body">
                    <div>
                        <strong>Stato:</strong>
                        @if ($post->published)
                        <span class="badge badge-success m-3">Pubblicato</span>
                        @else
                        <span class="badge badge-secondary m-3">Bozza</span>
                        @endif
                    </div>
                    <div>

                    @if($post->category)
                        <strong>Category: {{ $post->category->name}}</strong>
                    @endif
                    
                  </div>
                   {{ $post->content }}

                   <div class="d-flex my-2">
                       <a class="btn btn-info " href="{{ route("posts.edit",$post->id) }}" role="button">Edit</a>

                       <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                           @csrf
                           @method("DELETE")
                           <button type="submit" class="btn btn-danger mx-2">Delete</button>
                       </form>

                         <a class="btn btn-secondary " href="{{ route("posts.index") }}" role="button">Back</a>

                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
