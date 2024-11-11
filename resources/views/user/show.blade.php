@extends('adminlte::page')

@section('title', $user->name)

@section('content_header')
    <h1>
        {{ __('Show') }}
        {{ $user->name }}
    </h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10 col-md-10 col-sm-10">
                                <span class="card-title">
                                    {{ __('Show') }}
                                    {{ $user->name  }}
                                </span>
                            </div>
                            <div class="col-2 col-md-2 col-sm-2">
                                <a class="btn btn-primary btn-sm btn-block" href="{{ route('users.index') }}">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Name') }}:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('Email') }}:</strong>
                            {{ $user->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
