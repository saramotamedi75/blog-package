@extends('layouts.panel')
@section('content')
    <a class="btn btn-success m-4" href="{{url('/posts/add')}}">افزودن مقاله</a>
    <div class="card">
        <table class="table ">
            <thead class="thead-light">
            <tr>
                <th>نام مقاله</th>
                <th>تاریخ ایجاد</th>
                <th>url مقاله</th>
                <th class="text-center">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{jDate($post->created_at)->format('%A, %d %B %y')}}</td>
                    <td>{{$post->url}}</td>
                    <td class="text-center">
                        <a class="m-lg-3" href="{{url('/posts/edit/'.$post->id)}}">
                            <i class="material-icons text-success">ویرایش</i>
                        </a>
                        <a class="m-lg-3" href="{{url('/blog/'.$post->url)}}">
                            <i class="material-icons text-warning">مشاهده</i>
                        </a>
                        <a class="m-lg-3" href="{{url('posts/delete/'.$post->id)}}">
                            <i class="material-icons text-danger">حذف</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
