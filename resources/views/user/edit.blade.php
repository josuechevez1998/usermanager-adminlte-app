@extends('adminlte::page')

@section('title', __('Users'))

@section('content_header')
    <h1>{{ __('Edit') }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('users.update', $user->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('Roles') }} User</span>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse ($roles as $role)
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" 
                                        id="check-{{ $role->id }}"
                                        value="{{ $role->id }}"
                                        {{ $userRoles->contains('id', $role->id) ? 'checked' : null }}>
                                        <label class="form-check-label" for="check-{{ $role->id }}">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">
                                    {{ __('Not Found') }}
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
