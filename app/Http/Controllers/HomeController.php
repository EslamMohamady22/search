<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\search;
use App\Models\User;
use App\Models\usernotes;
use App\Models\zoomdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){

        if(Auth::id()){

            return redirect("/redirect");
        }
        else{
        return redirect("/login");
        }
}
    public function redirect()
    {
        if(Auth::id()){
                $usertype = Auth::user()->usertype;
                if($usertype == '1'){
                    $contact = User::find(auth()->user()->id);
                    $sec = $contact->total_sec ;
                    return view("admin.adminhome",compact("sec"));
                }
                else{
                    $contact = User::find(auth()->user()->id);
            $sec = $contact->total_sec ;
            return view("home",compact("sec"));

                }
        }
        else{
        return redirect('/login');
       }
    }
    public function search(Request $request)
    {
        $id = Auth::id();
        $q = $request->q;
        $data = new search();
        $data->searchresult = $q;
        $data->user_id = $id;
        $data->save();
        return redirect('/#gsc.tab=0&gsc.q='.$q);
    }

    public function chat($id)
    {
        $reciever = $id;
        return view('user.chatuser',compact('reciever'));
    }
    public function chatuser(){

        return view('user.chatuser1');
    }
    public function usernote()
    {

            $contact = User::find(auth()->user()->id);
            $sec = $contact->total_sec ;
    return view("user.usernotes",compact("sec"));
    }
    public function addusernote(Request $request)
    {
        $contact = User::find(auth()->user()->id);
        $sec = $contact->total_sec ;
        // return view("user.usernotes",compact("sec"));
        $usernote = new usernotes();
        $usernote->user_id = Auth::id();
        $usernote->title = $request->title;
        $usernote->note = $request->note;
        $usernote->save();
        return redirect('/shownotes');
    }
    public function shownotes()
    {
        $contact = User::find(auth()->user()->id);
        $sec = $contact->total_sec ;
        $user_id = Auth::id();
        $notes = usernotes::where('user_id',$user_id)->get();
        return view('user.shownotes',compact('notes','sec'));
    }
    public function deleteusernotes($id)
    {
        $data = usernotes::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function showmeetings()
    {
        $data = zoomdata::all();
        $contact = User::find(auth()->user()->id);
        $sec = $contact->total_sec ;
        return view('user.listofmeetings',compact('data','sec'));
    }
    public function zoomjoiniframe(Request $request)
    {
        $joinurl = $request->iframe;
        return view('user.zoomjoiniframeview',compact('joinurl'));
    }
    public function ajax(Request $request)
{
  $set_time = User::find(auth()->user()->id);

  $sec = $set_time->total_sec = $set_time->total_sec + 10;




  $set_time->update();
//   return response()->json(['success'=>$sec ,'data'=>"data"]);
}
public function store_login()
{
    $store_login = new Attendance();
    $store_login->name = auth()->user()->name;
    $store_login->user_id = auth()->user()->id;
    $store_login->login_time = now();
    $store_login->save();
    return redirect('/');
}
public function store_logout()
{
    $store_logout =  Attendance::where('user_id',auth()->user()->id)->where('logout_time',null)->first();
    if($store_logout)
    {
        $store_logout->logout_time = now();
        $store_logout->update();
    }

    return redirect()->to('/logout');
}

    public function logout(Request $request) {
        Auth::logout();
    //     $user = User::find(auth()->user()->id);
    //     $last_logout = Attendance::where('user_id',auth()->user()->id)->where('logout_time',null)->first();
    //     if($last_logout)
    // {
    //     $last_logout->logout_time = $user->last_logout_at;

    //     $last_logout->update();
    // }

        return redirect()->route('login');
    }


}
