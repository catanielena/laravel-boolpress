@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)                              
                            <tr>
                              <th scope="row">{{$post->id}}</th>
                              <td>{{$post->title}}</td>
                              <td>{{$post->slug}}</td>
                              <td>{{$post->content}}</td>
                              <td>{{$post->author_lastName}} {{$post->author_firstName}}</td>
                              <td class="d-flex">
                                  <a href="{{route('adminposts.show', $post->id)}}">
                                      <button type="button" class="btn btn-light">View</button>
                                  </a>
                                    <form action="{{route('adminposts.destroy', $post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Danger</button>
                                    </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
