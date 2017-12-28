<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        if ($keyword == '') {
            $role = Role::paginate(15);
        } else {
            $role = Role::where('role_id', 'like', '%'.request('keyword').'%')
                          ->paginate(15);
        }

        return view('admin.role.index')->with([
            'rows' => $role,
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
        $menus = Menu::get();
        return view('admin.role.create')->with([
            'menus' => $menus,
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
            'role_id' => 'required',
            'role_name' => 'required',
        ]);

        $role_id = request('role_id');
        $role_name = request()->input('role_name');
        $menus = request()->input('menus');

        $tmp = Role::where('role_id', $role_id)->exists();
        if ($tmp == true) {
            return back()->withInput()->withErrors([
                'errors' => '角色代碼重複',
            ]);
        }

        $role = Role::create([
            'role_id' => $role_id,
            'role_name' => $role_name,
            'created_name' => auth()->user()->account,
        ]);

        $role->permissions()->attach($menus);

        return redirect()->to('/studentData/admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $menus = Menu::get();
        return view('admin.role.show')->with([
            'role' => $role,
            'menus' => $menus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $menus = Menu::get();
        $permissions = $role->hasPermissions()->pluck('id')->toArray();
        return view('admin.role.edit')->with(compact('role'))->with([
            'menus' => $menus,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        $this -> validate(request(), [
            'role_name' => 'required',
        ]);

        $role_name = request()->input('role_name');
        $menus = request()->input('menus');

        $role->update([
            'role_name' => $role_name,
            'updated_name' => auth()->user()->account,
        ]);

        $role->permissions()->sync($menus);
        return redirect()->to('/studentData/admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->to('/studentData/admin/role');
    }
}
