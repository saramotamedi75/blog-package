@extends('layouts.panel.'.env('APP_NAME'))
@section('content')
    <link href="{{ asset('/css/trumbowyg.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/trumbowyg.colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/base/css/select2.min.css') }}" rel="stylesheet">
    <div class="container">
        <div class="card card-body">
            <form id="contact-form" method="post" enctype="multipart/form-data" action="{{url('/posts/store')}}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label">عنوان مقاله</label>
                            </div>
                            <div class="mt-2 ">
                                <input type="text" name="title" class="w-100 mt-2 form-control">
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label" >url مقاله</label>
                            </div>
                            <div class="mt-2 ">
                                <input type="text" name="url" class="w-100 mt-2 form-control">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label mt-4" >توضیحات کوتاه</label>
                            </div>
                            <div >
                                <input type="text" name="short_description" class="w-100 form-control" rows="6" spellcheck="false">
                                <span class="material-input "></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--<div class="col-md-6 mb-5 ">--}}
                            {{--<div class="form-group label-floating is-empty bmd-form-group">--}}
                            {{--<label class="bmd-label-floating">عکس </label>--}}
                            <input type="file" name="image" id="file" class="mt-5">
                            {{--<span class="material-input"></span>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-6 form-group">--}}
                    {{--                            <label for="tags" class="control-lable">برچسب ها</label>--}}
                    {{--                            <select id="tags" class="form-control selecttags" name="tags[]" multiple="multiple">--}}
                    {{--                                @foreach($tags as $tag)--}}
                    {{--                                    <option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="form-group label-floating is-empty bmd-form-group">
                        <label for="description" class="bmd-label-floating mt-4">توضیحات مقاله</label>
                        <textarea name="description" class="form-control my-editor" id="description"></textarea>
                        <span class="material-input"></span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mr-2">ثبت مقاله</button>
                    </div>
                </div>
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
