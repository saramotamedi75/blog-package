@extends('layouts.panel')
@section('content')
    {{--    <div class="blogs-3">--}}
    {{--        <div class="container">--}}
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-10 ml-auto mr-auto">
                <br>
                <div class="card card-plain card-blog">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-header card-header-image">
                                <img  class="img img-raised" src={{asset('/img/postImages/'.$post->image)}}>
                                <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-blog4.jpg&quot;); opacity: 1;"></div></div>
                        </div>
                        <div class="col-md-8 p-4">
                            <h3 class="card-title">
                                <p>{{$post->title}}</p>
                            </h3>
                            <div>
                                <p class="card-description">
                                    {{$post->short_description}}
                                </p>
                            </div>
                            <div>
                                <a href="{{url('/blog/'.$post->url)}}"> ادامه مطلب </a>
                            </div>
                            <p class="small">
                                {{jDate($post->created_at)->format('%A, %d %B %y')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
    </section>
    {{$posts->links()}}
@endsection
