@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __($post->title) }}</div>
                
                <div class="card-body">
                    @if ($post['category'])
                        <i class="text-capitalize">{{$post['category']['name']}}</i>
                    @endif
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                    @if (count($post['tags']) > 0)
                        <ul class="d-flex flex-wrap list-unstyled">
                            @foreach ($post['tags'] as $tag)
                            <li>
                                <button type="button" class="btn btn-sm btn-outline-primary m-1">{{$tag->name}}</button>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
