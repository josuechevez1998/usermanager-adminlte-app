@extends('adminlte::page')

@section('title', __('Roles'))

@section('content_header')
    <h1>{{ __('Assign') }}</h1>
@stop

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="h5 font-weight-bold">
                                {{ __('Assign') }} {{ __('Permissions') }}
                            </h1>
                        </div>
                        <div class="col-md-4 text-md-right mt-2 mt-md-0">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="p-3">
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <div class="row">
                        @forelse ($permissions as $permission)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <strong>Module:</strong> {{ $permission->name }}<br>
                                        <strong>Access From:</strong> {{ $permission->guard_name }}
                                    </div>
                                    <div class="card-footer p-3">
                                        <form
                                            action="{{ route(in_array($permission->name, $roleAssignPermissions) ? 'roles.revoke-permission' : 'roles.assign-permission', ['role' => $role->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')

                                            <!-- Campo hidden que siempre envía un valor por defecto -->
                                            <input type="hidden" name="permission-name" value="{{ $permission->name }}">

                                            <div class="form-check">
                                                <input type="checkbox" 
                                                    id="permission-{{ $permission->id }}"
                                                    name="permission-{{ $permission->id }}" 
                                                    value="{{ $permission->name }}"
                                                    class="form-check-input"
                                                    {{ in_array($permission->name, $roleAssignPermissions) ? 'checked' : '' }}
                                                    onchange="this.form.submit();">
                                                <label class="form-check-label">
                                                    {{ __('Assign') }}
                                                </label>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted">No permissions available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
