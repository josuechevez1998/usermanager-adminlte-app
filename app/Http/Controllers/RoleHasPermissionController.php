<?php

namespace App\Http\Controllers;

use App\Models\RoleHasPermission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RoleHasPermissionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RoleHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $roleHasPermissions = RoleHasPermission::paginate();

        return view('role-has-permission.index', compact('roleHasPermissions'))
            ->with('i', ($request->input('page', 1) - 1) * $roleHasPermissions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roleHasPermission = new RoleHasPermission();

        return view('role-has-permission.create', compact('roleHasPermission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleHasPermissionRequest $request): RedirectResponse
    {
        RoleHasPermission::create($request->validated());

        return Redirect::route('role-has-permissions.index')
            ->with('success', 'RoleHasPermission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $roleHasPermission = RoleHasPermission::find($id);

        return view('role-has-permission.show', compact('roleHasPermission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $roleHasPermission = RoleHasPermission::find($id);

        return view('role-has-permission.edit', compact('roleHasPermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleHasPermissionRequest $request, RoleHasPermission $roleHasPermission): RedirectResponse
    {
        $roleHasPermission->update($request->validated());

        return Redirect::route('role-has-permissions.index')
            ->with('success', 'RoleHasPermission updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RoleHasPermission::find($id)->delete();

        return Redirect::route('role-has-permissions.index')
            ->with('success', 'RoleHasPermission deleted successfully');
    }
}
