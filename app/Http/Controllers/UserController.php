<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userGroups = UserGroup::all(); // Retrieve all user groups
        return view('user.edit', compact('user', 'userGroups'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        //$user->update($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'group_id' => 'required|exists:user_groups,id', // Validate that the group exists
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'group_id' => $request->input('group_id'),
        ]);
        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('user.list')->with('success', 'User deleted successfully');
}
}

?>