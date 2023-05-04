@extends('layouts.app', ['pageSlug' => 'creat-show'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">News</h4>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <h1>{{ $news->title }}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Lead</label>
                            <div class="col-sm-10">
                                <h2>{{ $news->lead }}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Text</label>
                            <div class="col-sm-10">
                                <p>{{ $news->body }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer py-4">

                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
