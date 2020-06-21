<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(8);
        return view('admin.users.user-index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $user = User::find($id);
        $roles = Role::all();
        $userrole = UserRole::where('user_id', $id)->get();
        return view('admin.users.user-edit', compact(['user', 'roles', 'userrole']));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ],
            [
                'name.required' => 'Логин является обязательным полем!',
                'email.required' => 'Поле e-mail является обязательным!',
                'email.email' => 'Поле e-mail должно иметь вид example@example.com!',
            ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $request['password'] == null ?: $user->password = bcrypt($request->get('password'));
        $user->save();
        $role = UserRole::where('user_id', $user->id);
        $role->update(['role_id' => (int)$request->get('role')]);
        return redirect('/admin/users')->with('success', 'Данные о пользователе обновлены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('delete', 'Вы удалили пользователя!');
    }
}
