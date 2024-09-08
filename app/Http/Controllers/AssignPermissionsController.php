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

    public function assignPermission(Request $request, $roleId)
    {
        // Encuentra el rol por ID o lanza un error 404 si no existe
        $role = Role::findOrFail($roleId);
    
        // Obtén el nombre del permiso desde el request
        $permissionName = $request->input('permission-name');
    
        // Encuentra el permiso en la base de datos por su nombre
        $recordPermission = Permission::where('name', $permissionName)->first();
    
        // Verifica si se encontró el permiso
        if (!$recordPermission) {
            return redirect()->route('roles.assignPermissions', ['role' => $role->id])
                ->with('error', 'Permission not found.');
        }
    
        // Obtén la lista actual de permisos del rol
        $currentPermissions = $role->permissions;
    
        // Verifica si ya tiene el permiso
        if ($currentPermissions->contains($recordPermission)) {
            return redirect()->route('roles.assignPermissions', ['role' => $role->id])
                ->with('info', 'The role already has this permission.');
        }
    
        $role->givePermissionTo($permissionName);
    
        // Redirecciona con un mensaje de éxito
        return redirect()->route('roles.assignPermissions', ['role' => $role->id])
            ->with('success', 'Permission assigned successfully.');
    }
    

    public function revokePermission(Request $request, $roleId)
    {
        // Encuentra el rol por ID o lanza un error 404 si no existe
        $role = Role::findOrFail($roleId);

        // Obtén el nombre del permiso desde el request
        $permissionName = $request->input('permission-name');

        // Encuentra el permiso en la base de datos por su nombre
        $recordPermission = Permission::where('name', $permissionName)->first();

        // Verifica si se encontró el permiso
        if (!$recordPermission) {
            return redirect()->route('roles.assignPermissions', ['role' => $role->id])
                ->with('error', 'Permission not found.');
        }

        // Revocar el permiso al rol
        $role->revokePermissionTo($recordPermission);

        // Redirecciona con un mensaje de éxito
        return redirect()->route('roles.assignPermissions', ['role' => $role->id])
            ->with('success', 'Permission revoked successfully.');
    }
}
