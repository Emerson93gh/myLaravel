<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::select('id', 'name', 'email')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($data) {
                    $button = '<button type="button" name="edit" id="'.$data->id.'"
                        class="btn btn-warning btn-sm edit"><i class="bi bi-pencil-square"></i>
                            Edit
                        </button>';
                    $button .= '  <button type="button" name="delete" id="'.$data->id.'"
                        class="btn btn-danger btn-sm delete"><i class="bi bi-trash"></i>
                            Delete
                        </button>';
                    return $button;
                })
                ->make(true);
        }
        return view('users.index');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $pass = $request->password;
        $postpass = Hash::make($pass);

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $postpass,
        );

        User::create($form_data);

        return response()->json(['success' => 'Data Added Successfully.']);
    }

    public function edit($id)
    {
        if(request()->ajax()) {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
        );

        User::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is Successfully Updated.']);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
