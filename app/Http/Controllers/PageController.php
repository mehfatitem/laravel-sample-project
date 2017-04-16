<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class PageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        if(session()->get('username') == NULL || session()->get('username') == ''){
            redirect()->to('/login')->send();
        }
        $users = DB::table('user_tbl')->orderBy('save_date', 'DESC')->get();
        if ($users->isEmpty()) {
            abort(404);
        }

        return view('index', compact('users'));
    }

    public function images(){
        if(session()->get('username') == NULL || session()->get('username') == ''){
            redirect()->to('/login')->send();
        }
        $userId = session()->get('user_id');
        $images = DB::table('img_tbl')->where('user_id' , $userId)->orderBy('save_date', 'DESC')->get();
        return view('images' , compact('images'));
    }

    public function loginPage(){
        $data = "";
        return view('login' , compact('data'));
    }
}