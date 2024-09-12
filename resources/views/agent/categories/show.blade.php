@extends('admin.layouts.master')

@section('title', 'Категория ' . $category->title)

@section('content')

    <div class="page admin documents">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>{{ $category->title }}</h1>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Назад</a>
                        </div>
                    </div>
                    <ul>
                        @foreach($cats as $cat)
                            @php
                                $document = \App\Models\Document::where('id', $cat->document_id)->first();
                            @endphp
                           <li><a href=" {{ Storage::url($document->path) }}" target="_blank"><img src="{{ route('index')
                           }}/img/file.svg" alt=""> {{ $document->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

