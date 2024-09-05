@extends('adminlte::page')

@section('title', 'Show Permission')

@section('content_header')
    <h1>{{ __('Show') }} {{ __('Permission') }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Permission</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('permissions.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $permission->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Guard Name:</strong>
                            {{ $permission->guard_name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
