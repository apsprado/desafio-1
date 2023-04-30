@extends('layouts.app', ['pageSlug' => 'creat-user'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Create Users</h4>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input type="text" name="name"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ _('Name') }}" value="{{ old('name') }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">E-mail</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input type="email" name="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ _('Email') }}" value="{{ old('email') }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input type="password" name="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ _('Password') }}">
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="{{ _('Confirm Password') }}">
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
