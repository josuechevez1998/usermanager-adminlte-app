@extends('adminlte::page')

@section('title', $user->name)

@section('content_header')
    <h1>{{ $user->name }}</h1>
@stop

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('users-profile.update-password', ['user' => $user]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header bg-dark p-3">
                <strong class="text-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ __('Warning') }}
                </strong>
                <br>
                <strong>{{ __('Updating your password will close all open sessions') }}</strong>
            </div>
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <x-adminlte-input type="password" name="current_password" label="{{ __('Current Password') }}"
                                placeholder="********" label-class="text-dark">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <x-adminlte-input type="password" name="password" label="{{ __('New Password') }}"
                                placeholder="********" label-class="text-dark">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <x-adminlte-input type="password" name="reset_password"
                                label="{{ __('Confirm New Password') }}" placeholder="********" label-class="text-dark">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock text-dark"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
