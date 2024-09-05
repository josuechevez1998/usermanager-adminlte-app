@extends('adminlte::page')

@section('title', 'Show Permission')

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('Show') }} {{ __('Permission') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">{{ __('Permission Details') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><strong>{{ __('Name') }}:</strong></label>
                        <p class="text-muted">{{ $permission->name }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>{{ __('Guard Name') }}:</strong></label>
                        <p class="text-muted">{{ $permission->guard_name }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-list"></i> {{ __('View All Permissions') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
