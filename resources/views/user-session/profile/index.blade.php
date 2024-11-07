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

    <div class="card">
        <div class="card-header bg-dark">
            <strong>{{ __('User Profile') }}</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 d-flex justify-content-center p-5">
                    <form enctype="multipart/form-data"
                        action="{{ route('users-profile.upload-photo', ['user' => $user]) }}" method="POST"
                        class="w-100 text-center">
                        @method('POST')
                        @csrf

                        @if (isset($user->userPhoto))
                            <div class="mb-4">
                                <img src='{{ asset('storage/' . $user->userPhoto->path . '/' . $user->userPhoto->name) }}''
                                    alt="user-photo" class="w-25 img-fluid rounded-circle">
                            </div>
                        @endif

                        <div class="input-group mb-3 w-100">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon03">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                            <div class="custom-file text-start">
                                <input type="file" name="avatar"
                                    class="custom-file-input @error('avatar') is-invalid @enderror">
                                <label class="custom-file-label">{{ __('Choose File') }}</label>
                            </div>
                        </div>

                        {!! $errors->first('avatar', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

                        <br>
                    </form>
                </div>
                <div class="col-sm-8 p-5">
                    <form action="{{ route('users.profile-update', ['user' => $user]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <x-adminlte-input name="name" label="{{ __('Name') }}"
                                        placeholder="{{ __('Name') }}" value="{{ $user->name }}"
                                        label-class="text-dark">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>

                                <div class="form-group mb-3">
                                    <x-adminlte-input type="email" name="email" label="{{ __('Email') }}"
                                        placeholder="{{ __('Email') }}" value="{{ $user->email }}"
                                        label-class="text-dark">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
