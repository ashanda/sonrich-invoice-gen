<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::whereIn('type', [0, 2, 3])->get();
        return view('pages.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('pages.staff.create');
    }

    public function store(Request $request)
    {
       
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();
    
        return redirect()->route('staff.index')->with('success', 'User member created successfully.');
    }

    public function edit(User $staff)
    {
        return view('pages.staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'password' => 'required|min:8',
            'type' => 'required'
        ]);

        $staff->update($request->all());

        return redirect()->route('pages.staff.index')
            ->with('success', 'User member updated successfully.');
    }

    public function destroy(User $staff)
    {
        $staff->delete();

        return redirect()->route('pages.staff.index')
            ->with('success', 'User member deleted successfully.');
    }
}
