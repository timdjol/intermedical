@extends('admin.layouts.master')

@section('title', 'Книга ' . $admin_post->title)

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($admin_post->image) }}" alt="">
                        </div>
                        <div class="col-md-8">
                            <h1>{{ $admin_post->title }}</h1>
                            {!! $admin_post->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

