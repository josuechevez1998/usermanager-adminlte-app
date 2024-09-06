@extends('layouts.app')

@section('template_title')
    {{ $roleHasPermission->name ?? __('Show') . " " . __('Role Has Permission') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Role Has Permission</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('role-has-permissions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Permission Id:</strong>
                                    {{ $roleHasPermission->permission_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Role Id:</strong>
                                    {{ $roleHasPermission->role_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
