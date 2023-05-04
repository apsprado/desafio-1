@extends('layouts.app', ['pageSlug' => 'creat-news'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Create News</h4>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post"
                            action="{{ $news ? route('news.update', $news->id) : route('news.store') }}">
                            @csrf

                            @if ($news)
                                @method('PATCH')
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <input value="{{ $news ? $news->title : '' }}" type="text" name="title"
                                            placeholder="{{ _('Title') }}"
                                            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" />
                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Lead</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('lead') ? ' has-danger' : '' }}">
                                        <input {{ $news ? $news->lead : '' }} type="text" name="lead"
                                            class="form-control{{ $errors->has('lead') ? ' is-invalid' : '' }}"
                                            placeholder="{{ _('Lead') }}" value="{{ $news ? $news->lead : '' }}"">
                                        @include('alerts.feedback', ['field' => 'lead'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Text</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                                        <textarea name="body" id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                                            rows="20">
                                            {{ $news ? $news->body : '' }}</textarea>
                                        @include('alerts.feedback', ['field' => 'body'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
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
