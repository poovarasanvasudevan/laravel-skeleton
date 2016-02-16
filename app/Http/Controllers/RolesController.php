<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class RolesController extends Controller
{
    //

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPermission($name, $permissions, $desc)
    {
        $permission = new Permission();
        $attr = json_decode($permissions);
        $myPermission = $permission->create([
            'name' => $name,
            'slug' => [          // pass an array of permissions.
                'create' => $attr[0] == null ? false : $attr[0],
                'view' => $attr[1] == null ? false : $attr[1],
                'update' => $attr[2] == null ? false : $attr[2],
                'delete' => $attr[3] == null ? false : $attr[3],
            ],
            'description' => strlen($desc) > 0 ? $desc : "No Description Available..."
        ]);
        $permission->save();

        $status = array();
        $status['result'] = "success";
        return response()->json($status);
    }
}
