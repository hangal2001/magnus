<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Permission;
use App\User;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission($request->all());
        $permission->schema_name = strtolower(preg_replace('/\s/', '_', $request->schema_name));
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission schema has been created!');
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
        //
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
        $permission = Permission::findOrFail($id);

        $permission->update($request->all());
        $permission->schema_name = strtolower(preg_replace('/\s/', '_', $request->schema_name));
        $permission->save();
        
        return redirect()->route('permissions.index')->with('success', 'Permission schema has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        if(User::where('permission_id', $id)->count() == 0) {
            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permission schema has been deleted!');
        } else {
            return redirect()->route('permissions.index')->withErrors('This schema cannot be deleted, there are users associated with it');
        }
    }
}
