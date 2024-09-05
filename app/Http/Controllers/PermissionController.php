<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $permissions = Permission::paginate();

        return view('permission.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * $permissions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permission = new Permission();

        $routesList =  collect(Route::getRoutes())
            ->map(function ($route) {
                return $route->getName() ?: $route->uri();
            })
            ->filter(function ($route) {
                return !is_null($route);
            })
            ->sort()
            ->values()
            ->toArray();

        return view('permission.create', compact('permission', 'routesList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request): RedirectResponse
    {
        Permission::create($request->validated());

        return Redirect::route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $permission = Permission::find($id);

        return view('permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $permission = Permission::find($id);

        $routesList =  collect(Route::getRoutes())
            ->map(function ($route) {
                return $route->getName() ?: $route->uri();
            })
            ->filter(function ($route) {
                return !is_null($route);
            })
            ->sort()
            ->values()
            ->toArray();

        return view('permission.edit', compact('permission', 'routesList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update($request->validated());

        return Redirect::route('permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Permission::find($id)->delete();

        return Redirect::route('permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}
