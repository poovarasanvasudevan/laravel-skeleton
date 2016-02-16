<?php

namespace App\Http\Controllers;

use App\User as AppUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser()
    {
        $userArray = array();
        $userArray['name'] = Input::get('name');
        $userArray['email'] = Input::get('email');
        $userArray['password'] = Input::get('password');

        $error = array();
        $error['code'] = 0;
        $error['status'] = "Name or email or password field missing...";


        $success = array();
        $success['code'] = 1;
        $success['status'] = "User Created Succesfully...";


        if ($userArray['name'] == null || $userArray['email'] == null || $userArray['password'] == null) {
            return response()->json($error);
        } else {

            $user = new AppUser();
            $user->name = $userArray['name'];
            $user->email = $userArray['email'];
            $user->password = $userArray['password'];
            $user->save();

            $success['id'] = $user->id;
            return response()->json($success);
        }
    }

    public function assignPermission($userid, $permission)
    {
        $error = array();
        $error['code'] = 0;
        $error['status'] = "Check User or Permission...";


        $success = array();
        $success['code'] = 1;
        $success['status'] = "Permission Assigned Succesfully...";


        $user = AppUser::find($userid);

        if ($user->addPermission($permission)) {
            return response()->json($user);
        } else {
            return response()->json($error);
        }
    }
}
