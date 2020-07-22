@extends('layouts.panel.'.env('APP_NAME'))
@section('content')
    <link href="{{ asset('/css/trumbowyg.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/trumbowyg.colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/base/css/select2.min.css') }}" rel="stylesheet">
    <div class="container">
        <div class="card card-body">
            <form id="contact-form" method="post" enctype="multipart/form-data" action="{{url('/posts/update/'.$post->id)}}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label">عنوان مقاله</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="title" value="{{$post->title}}" class="w-100 mt-2 form-control">
                                <span class="material-input "></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label ">url مقاله</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="url" value="{{$post->url}}" class="w-100 mt-2 form-control ">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label mt-4 " >توضیحات کوتاه</label>
                            </div>
                            <div >
                                <textarea name="short_description" class="w-100  form-control">
                                {{$post->short_description}}
                                </textarea>
                                {{--<span class="material-input"></span>--}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--                            <div class="form-group label-floating is-empty bmd-form-group">--}}
                            {{--                                <label>عکس </label>--}}
                            <input type="file" name="image" id="file" value="{{$post->image}}" class="mt-5 ">
                            {{--                                <span class="material-input"></span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty bmd-form-group">
                        <label for="description" class="bmd-label-floating mt-2">توضیحات مقاله</label>
                        <textarea name="description"  id="description" class="form-control my-editor">{!! old('content', $post->description) !!}</textarea>
                        <span class="material-input"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">ثبت مقاله</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('/js/panel/trumbowyg.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/trumbowyg.colors.min.js') }}"></script>
    <script>
        $('#description').trumbowyg({
            lang: 'fa',
            removeformatPasted: true,
            hideButtonTexts: true,
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        });
    </script>

@endsection
