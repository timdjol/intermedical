@extends('admin.layouts.master')

@section('title', 'Книга ' . $agent_post->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.layouts.sidebar')
                    <img src="{{ Storage::url($agent_post->image) }}" alt="">
                    <h4>{{ $agent_post->category->title }}</h4>
                </div>
                <div class="col-md-9">
                    <h1>{{ $agent_post->title }}</h1>
                    {!! $agent_post->description !!}
                </div>
            </div>
        </div>
    </div>

@endsection

