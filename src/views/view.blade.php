@extends('layouts.app')
{{--@section('background') {{asset('/img/postImages/'.$post->image)}} @endsection--}}
@section('content')
    <div >
        <div class="container">
            <article class="card card-plain card-blog">
                <img class="mt-5" width="900px" height="400px" src="{{asset('/img/post/' . $post->image)}}">
                <div class="card-body text-justify">
                    {!!$post->description!!}
                </div>
            </article>
        </div>
    </div>
@endsection
