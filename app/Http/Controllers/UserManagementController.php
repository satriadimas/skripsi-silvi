<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
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
        if (Auth::user()->role != '2') {
            return redirect('/admin/home');
        }
        return view('admin.user_management');
    }

    public function list(){
        $data = User::where('role', '!=', '1')->get();

        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function tambah(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $nohp = $request->input('nohp');

        $password = Hash::make('admin123');

        $insert = new User;
        $insert->name = $name;
        $insert->email = $email;
        $insert->role = $role;
        $insert->nohp = $nohp;
        $insert->password = $password;
        $insert->save();

        return true;
    }

    public function delete($id) {
        $delete = User::where('id', $id)->delete();

        return true;
    }

}
