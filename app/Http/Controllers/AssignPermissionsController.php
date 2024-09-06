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
        $roleAssignPermissions = $role->permissions->pluck('name')->toArray();

        return view('role.assign-permissions.index', compact('permissions', 'role', 'roleAssignPermissions'));
    }

    public function changeAssignPermission(Request $request, Role $role)
    {
        // Verificar si el permiso ya está asignado
        if ($role->hasPermissionTo($request->permission)) {
            // Si está asignado, se elimina
            $role->revokePermissionTo($request->permission);
        } else {
            // Si no está asignado, se agrega
            $role->givePermissionTo($request->permission);
        }

        return redirect()->back()->with('success', 'Permission updated successfully');
    }
}
