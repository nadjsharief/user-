<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
        return view('home', ['users' => $users]);
    }
    public function create()
    {
        return view('create');
    }
    public function create1()
    {
        return view('create1');
    }
    public function store(Request $request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);

    }
    public function store1(Request $request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);

    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        
        return view('edit', ['users' => $users]);
    }
    public function edit1($id)
    {
        $users = User::findOrFail($id);
        
        return view('edit', ['users' => $users]);
    }
    public function update(Request $request)
    {
        var_dump($request->id);
        exit;
        $data = User::findOrFail($request->id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->save();
        return $data;
    }
    public function update1(Request $request)
    {
       
        $data = User::findOrFail($request->id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Status updated', 
          ], 200);
    }
    public function destroy($id) {

        $blog = DB::table('users')->where('id',$id)->delete();
    
        // return redirect('/index');
    
    }
}
