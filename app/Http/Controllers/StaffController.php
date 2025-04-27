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
	        'password' => 'sometimes|min:8', // Password is sometimes required and must have a minimum length of 8 characters
	    ]);

	    // Update other fields from the request
	    $staff->update($request->except('password'));

	    // Check if a new password is provided and update it if so
	    if ($request->filled('password')) {
	        $staff->password = bcrypt($request->password);
	        $staff->save();
	    }

        return redirect()->route('staff.index')
            ->with('success', 'User staff updated successfully.');
    }

    public function destroy(User $staff)
    {
        $staff->delete();

        return redirect()->route('pages.staff.index')
            ->with('success', 'User member deleted successfully.');
    }
}
