<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role; 
use App\Models\User;

class BackController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function role_index(){

        $roles = Role::latest()->paginate(5);
        return view('role.index', compact('roles'));
    }
    public function role_create(){
        return view('role.create');
    }
    public function role_store(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required'
        ]);
        if($request->input('status') != 'null'){
            $role = new Role;
            $role->name = $request->input('name');
            $role->status = $request->input('status');
            $role->save();
            return redirect()->route('role_index')->with('success', 'Successfully Created Role');
        }else{
            return redirect()->route('role_create')->with('error', 'Please select status');
        }
    }
    public function role_edit($id){
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }  
    public function role_update(Request $request, $id){
        $this->validate($request, [
            'name'=>'required',
            'status'=>'required'
        ]);
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->status = $request->input('status');
            $role->save();
            return redirect()->route('role_index')->with('warning', 'Successfully Updated');
    }
    public function role_disable($id){
        $role = Role::find($id);
        $role->status = false;
        $role->save();
        return redirect()->route('role_index')->with('error', 'Successfully Disabled');
    }  


}
 