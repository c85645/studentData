<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
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
            $role = Role::get();
        } else {
            $role = Role::where('role_id', 'like' , '%'.request()->input('keyword').'%')->get();
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
        return view('admin.role.create');
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

        $role_id = request()->input('role_id');
        $role_name = request()->input('role_name');

        Role::create([
            'role_id' => $role_id,
            'role_name' => $role_name,
            'created_name' => auth()->user()->account,
        ]);

        return redirect()->to('/admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.role.show')->with([
            'role' => $role
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
        return view('admin.role.edit')->with(compact('role'));
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

        $role->update([
            'role_name' => $role_name,
            'updated_name' => auth()->user()->account,
        ]);
        return redirect()->to('/admin/role');
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
        return redirect()->to('/admin/role');
    }
}
