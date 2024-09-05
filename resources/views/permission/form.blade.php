<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <x-adminlte-select2 name="name" id="name">
                <option value="">--seleccionar--</option>
                @forelse ((array)$routesList as $route)
                    <option value="{{ $route }}" {{ $permission->name == $route ? 'selected' : '' }}>
                        {{ $route }}
                    </option>
                @empty
                    <option value="" disabled>No hay rutas disponibles</option>
                @endforelse
            </x-adminlte-select2>

            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="guard_name" class="form-label">{{ __('Guard Name') }}</label>
            <select class="form-control form-select form-select-sm  @error('guard_name') is-invalid @enderror"
                name="guard_name">
                <option value="">--seleccionar--</option>
                <option value="web" {{ $permission->guard_name == 'web' ? 'selected' : '' }}>Acceder desde Navegador
                </option>
                <option value="api" {{ $permission->guard_name == 'api' ? 'selected' : '' }}>Acceder desde API
                </option>
            </select>
            {!! $errors->first('guard_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
