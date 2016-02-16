<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;

/**
 * Class Dashboard
 *
 * @author Poovarasan Vasudevan
 * @package App\Http\Controllers
 */
class Dashboard extends Controller
{
    //

    /**
     * @return \Illuminate\Http\Response|Redirect
     */
    public function welcome()
    {
        if (Session::has("user")) {
            return redirect('dashboard');
        } else {
            return response()->view("welcome");
        }
    }


    /**
     * @param Request $request
     * @param $username
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request, $username, $password)
    {
        $data = 0;
        $result = DB::select('SELECT global_login_validate(?,?) AS result', [$username, $password]);
        foreach ($result as $user) {
            $data = $user->result;
        }

        if ($data == 1) {

            $request->session()->set("user", $username);
            //request()->session()->set("user", $username);
            Session::set("user", $username);
        }
        $json = array('result' => $data == 1 ? true : false);
        //$json = array('result' => Session::has("user"));
        return response()->json($json);
    }

    /**
     * @param $username
     * @return \Illuminate\Http\JsonResponse
     */
    public function makesession($username)
    {
        Session::set("user", $username);
        $status['status'] = 'ok';
        return response()->json($status);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function artefacttypes()
    {
        DB::beginTransaction();

        DB::select('select global_artefacttype(?)', ['artefacttype']);
        $result = DB::select('FETCH ALL IN "artefacttype"');
        DB::commit();

        $status = array();

        $status['status'] = 'ok';
        $status['count'] = sizeof($result);
        $status['result'] = $result;


        return response()->json($status);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getmenu()
    {

        $result = DB::select('SELECT global_general_menu() AS result');
        $status = array();

        $status['status'] = 'ok';
        $status['count'] = sizeof(json_decode($result[0]->result));
        $status['result'] = json_decode($result[0]->result);

        return response()->json($status);
    }

    /**
     * @return \Illuminate\Http\Response|Redirect
     */
    public function dashboard()
    {
        if (Session::has("user")) {
            config(['app.timezone' => 'America/Chicago']);
            return response()->view("dashboard");
        } else {
            return redirect('');
        }
    }

    /**
     * @return Redirect
     */
    public function logout()
    {
        Session::clear();

        //return redirect()->route("/");

        return redirect('');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sess()
    {

        $status['status'] = Session::get("user");

        return response()->json($status);
    }
}
