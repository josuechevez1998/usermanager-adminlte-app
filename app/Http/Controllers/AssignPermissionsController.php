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

    }
}
