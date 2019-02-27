@extends('layouts.app')

@section('title', 'Уроци')

@section('sidebar')
    @parent
				
@endsection

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" id="error_alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <!-- Button trigger modal -->
            <button type="button" 
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal">
                Добави нов видео урок
            </button>
        </div>
        
        @include('video_course._search_form')
    </nav>

    <div id="video-list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Видео урок</th>
                    <th scope="col">Предмет</th>								
                    <th scope="col">Име на файл</th>
                    <th scope="col">Описание</th>
                    <th scope="col">@sortablelink('created_at','Създаден на')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videoCourses as $video)
                    <tr>
                        <td>{{$video->title}}</td>
                        <td>{{$video->subject->title}}</td>
                        <td>{{$video->file_name}}</td>
                        <td>{{$video->description}}</td>
                        <td>{{$video->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
                    @if($videoCourses->isEmpty())
                        <tr>
                            <td></td>
                            <td>Няма намерени резултати...</td>												
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    @endif
            </tbody>
        </table>
    </div>

    {{ $videoCourses->links("pagination::bootstrap-4") }}

    <!-- Modal -->
    @include('video_course._create_video_form')
    
    
@endsection