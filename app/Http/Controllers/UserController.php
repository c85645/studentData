<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request()->input('keyword');

        if ($keyword == '') {
            $user = User::paginate(15);
        } else {
            $user = User::where('account', 'like', '%'.request()->input('keyword').'%')->paginate(15);
        }

        // 若要多回傳值的話，就要用陣列的key value方式回傳
        return view('admin.user.index')->with([
            'rows' => $user ,
            'keyword' => $keyword
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create')->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this -> validate(request(), [
            'account' => 'required',
            'name' => 'required',
            // 'password' => 'required',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $account = request()->input('account');
        $name = request()->input('name');
        // $password = request()->input('password');
        $status = request()->input('status');
        $role_id = request()->input('role_id');

        $tmp = User::where('account', $account)->exists();
        if ($tmp == true) {
            return back()->withInput()->withErrors([
                'errors' => '帳號重複',
            ]);
        }

        $user = User::create([
            'account' => $account,
            'name' => $name,
            'password' => bcrypt($account),
            'status' => $status,
        ]);

        // 用attach寫法就可以不需要手動新增role_user這張表
        $user->roles()->attach($role_id);
        // \DB::table('role_users')->insert([
        //     'role_id' => $role_id,
        //     'user_id' => $user->id,
        // ]);

        return redirect()->to('/studentData/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();

        return view('admin.user.edit')->with(compact('user'))->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $this -> validate(request(), [
            'name' => 'required',
            // 'password' => 'required',
            'role_id' => 'required',
            'status' => 'required',
        ]);

        $name = request()->input('name');
        // $password = request()->input('password');
        $status = request()->input('status');
        $role_id = request()->input('role_id');

        $user->update([
            'name' => $name,
            // 'password' => bcrypt($password),
            'status' => $status,
        ]);

        // $user->roles()->detach($role_id);
        $user->roles()->sync($role_id);
        // \DB::table('role_user')->where('user_id', $user->id)->update([
        //     'role_id' => $role_id,
        //     'user_id' => $user->id,
        // ]);
        return redirect()->to('/studentData/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->to('/studentData/admin/user');
    }

    public function updateAccount(User $user)
    {
        $this -> validate(request(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        $name = request()->input('name');
        $password = request()->input('password');

        auth()->user()->update([
            'name' => $name,
            'password' => bcrypt($password),
        ]);

        return redirect()->to('studentData/admin');
    }

    public function resetPassword()
    {
        if (request()->user_id != null && request()->user_id != '') {
            $user = User::find(request()->user_id);
            $user->password = bcrypt($user->account);
            $user->save();

            return response()->json([
                'msg' => '密碼已重置！',
            ]);
        } else {
            return response()->json([
                'msg' => '程式發生錯誤，請聯絡系統開發者！',
            ]);
        }
    }
}
