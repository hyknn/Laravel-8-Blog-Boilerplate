<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::flash('alert_type', 'success');
        Session::flash('alert_message', 'Data Updated');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id != 1) {
            $user = User::findOrFail($id);
            return view('user.edit', compact('user'));
        }
        else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id != 1) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            ]);

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            Session::flash('alert_type', 'success');
            Session::flash('alert_message', 'Data Updated');
            return redirect()->route('users.index');
        }
        else {
            return redirect()->route('users.index');
        }
    }

    public function updatePass(Request $request, $id)
    {
        if ($id != 1) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::findOrFail($id);
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('alert_type', 'success');
            Session::flash('alert_message', 'Data Updated');
            return redirect()->route('users.index');
        }
        else {
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != 1) {
            $user = User::findOrFail($id);
            $user->delete();

            Session::flash('alert_message', 'Data Deleted');
            Session::flash('alert_type', 'warning');
            return redirect()->route('users.index');
        }
        else {
            return redirect()->route('users.index');
        }
    }
}
