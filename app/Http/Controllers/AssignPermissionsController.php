<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AssignPermissionsController extends Controller
{
    public function index(Role $role)
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();

        // Obtener los permisos asignados al rol
        $roleAssignPermissions = $role->permissions
            ->pluck('name')
            ->toArray();

        return view('role.assign-permissions.index', compact('permissions', 'role', 'roleAssignPermissions'));
    }

    public function updatePermissions(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissionName = $request->input('permission');
    
        if ($role->hasPermissionTo($permissionName)) {
            // Si el rol ya tiene el permiso, lo quitamos (revocamos)
            $role->revokePermissionTo($permissionName);
        } else {
            // Si el rol no tiene el permiso, lo asignamos
            $role->givePermissionTo($permissionName);
        }
    
        return redirect()->route('roles.assignPermissions', ['role' => $role->id]);
    }
    
}
