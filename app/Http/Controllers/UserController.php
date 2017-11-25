<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        if($keyword == '') {
            $user = User::get();
        } else {
            $user = User::where('account', 'like', '%'.request()->input('keyword').'%')->get();
        }

        // 若要多回傳值的話，就要用陣列的key value方式回傳
        return view('admin.user.index')->with([
            'rows' => $user,
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
        return view('admin.user.create');
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
            'password' => 'required',
        ]);

        $account = request()->input('account');
        $name = request()->input('name');
        $password = request()->input('password');
        $status = requiest()->input('status');

        User::create([
            'account' => $account,
            'name' => $name,
            'password' => bcrypt($password),
            'status' => $status
        ]);

        return redirect()->to('/admin/user');
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
        return view('admin.user.edit')->with(compact('user'));
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
            'password' => 'required',
        ]);

        // dd($user);
        $user->update([
            'name' => $user->name,
            'password' => bcrypt($user->password),
            'status' => $user->status,
        ]);
        return redirect()->to('/admin/user');
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
        return redirect()->to('/admin/user');
    }
}
