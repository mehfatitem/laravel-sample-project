<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class LoginController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function login(Request $request){
        $returnResult = "";
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $password = md5($password);
        $results = DB::table('user_tbl')->where('username' , $username)->where('password' , $password)->get();

        $data = $results->count()>0 ? true : false;

        if($data){
            session()->put('username', $username);
            $result = DB::table('user_tbl')->select(array('contact', 'user_id'))->where('username' , $username)->get();
            var_dump($result);
            foreach ($result as $key =>$value){
                foreach ($value as $secondKey => $secondValue){
                    if($secondKey == 'contact')
                        $contact = $secondValue;
                    else if($secondKey == 'user_id')
                        $userId = $secondValue;
                }
            }
            session()->put('contact' , $contact);
            session()->put('user_id' , $userId);
            Session::save();
            $returnResult = "true";
        }
        else{
            $returnResult = "false";
        }
        return $returnResult;
    }

    public function logout(){
        Session::flush();
        redirect()->to('/login')->send();
    }
}