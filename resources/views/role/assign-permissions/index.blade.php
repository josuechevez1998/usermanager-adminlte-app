@extends('adminlte::page')

@section('title', 'Permission')

@section('content_header')
    <h1>Permission</h1>
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
                                        <form action="{{ route('roles.updatePermissions', ['role' => $role->id]) }}" method="POST">
                                            @csrf
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    id="permission-{{ $permission->id }}"
                                                    name="permission"
                                                    value="{{ $permission->name }}"
                                                    class="form-check-input"
                                                    {{ in_array($permission->name, $roleAssignPermissions) ? 'checked' : '' }}
                                                    onclick="this.closest('form').submit();">
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
