<?php

namespace App\Http\Controllers;

//use App\Models\Message;

use App\Models\Attendance;
use App\Models\Message;
use App\Models\note;
use App\Models\search;
use App\Models\User;
use App\Models\usernotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function addashboard()
    {
    return view('admin.adminhome');
    }
    public function users()
    {
        $contact = User::find(auth()->user()->id);
        $sec = $contact->total_sec ;
        $users = User::all();
        return view('admin.users',compact('users','sec'));
    }
    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function searchresult()
    {

        $searchs = DB::table('users')
        ->Join('searches', 'users.id', '=', 'searches.user_id')
        ->select('users.id','users.name','users.last_login_at','users.last_logout_at','searches.searchresult','searches.created_at')
        ->get();
        return view('admin.searchresults',compact('searchs'));
    }

    public function choose($id)
    {


        $searchs = search::where('user_id',$id)->get();
        return view('admin.searchchoose',compact('searchs'));

    }
    public function searchuser(Request $request)
    {
        $result = $request->searchuser;
        $users = User::where('name','LIKE','%'.$result.'%')->get();
        return view('admin.users',compact('users'));

    }
    public function adduserview()
    {
        return view('admin.adminadduser');
    }

    public function addnewuser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|max:255|min:4',
            'email'=>'required|email',
            'phone' => 'required|min:11',
            // 'cv' => 'required',
            'address' => 'required'
        ],[

            'name.required' =>'please enter  name ',
            'password.required' =>'please enter Password ',
            'password.min'=>'this password is very short,please enter at least 8 characters ',
            'email.required' =>'please enter  email ',
            'phone.required' =>'please enter  phone ',
            'cv.required' =>'please upload  cv ',
            'address.required' =>'please enter  address '

        ]);


        // User::create([
        //     'name' => $request->name,
        //     'email' =>'es',
        //     'phone' =>'phone',
        //     'job'=>$request->job,
        //     // 'cv' =>$cvname,
        //     'address'=>$request->address,
        //     'password'=>  Hash::make($request->password),
        // ]);
        $user = new User();
        $cv = $request->cv;
        $cvname =time().'.'.$cv->getClientOriginalExtension();
        $cv->move('CvImageFolder',$cvname);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->price = $request->price;
        $user->job = $request->job;
        $user->cv = $cvname;
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('Add','User Added Successfully !');
        return redirect('/users');
    }
    public function note()
    {
        return view('admin.note');

    }

    public function addnote(Request $request)
    {
        $data = new note();
        $data->title = $request->title;
        $data->note = $request->note;
        $data->save();
        return redirect('/shownote');
    }
    public function shownote()
    {
        $notes = note::all();
        return view('admin.shownote',compact('notes'));
    }
    public function deletenote($id)
    {
        $data = note::find($id);
        $data->delete();
        return redirect()->back();
    }

    //chat
    public function chatnow($id)
    {
        if(Auth::user()->usertype == '1'){
            $reciever = $id;
        return view('admin.chatadmin',compact('reciever'));
        }else{
            $reciever = $id;
            return view('user.chatuser',compact('reciever'));

        }

    }
    public function deletmsg($id)
    {
        $deletmsg = Message::find($id);
        $deletmsg->delete();
        return redirect()->back();
    }

    public function search2(Request $request)
    {
        $users = User::where('name', 'LIKE' , '%'.$request->search.'%')
        ->get();
        return view('chat.dashboard2',compact('users'));
    }
    public function sendfile(Request $request)
    {
        $message = new Message();
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalName();
        $request->file->move('chatfile' , $filename);
        $message->message_file = $filename;
        $message->message_text = null;
        $message->reciever_id = $request->rcv_id;
        $message->user_id = auth()->user()->id;
        $message->save();
        return redirect()->back();
    }
    public function showusernotes()
    {
        $notes = DB::table('users')
        ->Join('usernotes', 'users.id', '=', 'usernotes.user_id')
        ->select('users.id','users.name','usernotes.title','usernotes.note','usernotes.created_at')
        ->get();
        return view('admin.showusernotes',compact('notes'));
    }
    public function redefine($id)
    {
        $redefine = User::find($id);
        $redefine->total_sec = 0;
        $redefine->update();
        return redirect()->back();
    }
    public function attendance()
    {
        $attendance = Attendance::all();
        return view('admin.attendance',compact('attendance'));
    }
    public function ajax(Request $request)
    {
      $set_time = User::find(auth()->user()->id);

      $sec = $set_time->total_sec = $set_time->total_sec + 10;




      $set_time->update();
    //   return response()->json(['success'=>$sec ,'data'=>"data"]);
    }
    // public function detiels($id)
    // {
    //     $user = User::find($id);
    //     return view('admin.show_one_user',compact('user'));
    // }


}
