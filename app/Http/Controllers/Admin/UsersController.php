<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserValidation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display all users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //  get all users with roles
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Create new user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store new user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserValidation $request)
    {

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'password' => bcrypt($request->input('password')),
        ]);

        if ($user) {
            // sync roles
            $user->roles()->sync($request->input('role'));

            $notification = array(
                'message' => 'User is created successfully!',
                'type' => 'success'
            );

            return redirect('/admin/users')->with($notification);
        } else {
            $notification = array(
                'message' => 'User doesn\'t create!',
                'type' => 'error'
            );

            return redirect('admin/users/' . $user->id . '/edit')->with($notification);
        }
    }

    /**
     * Edit user
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get user by id
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserValidation $request, $id)
    {
        // get user by id
        $user = User::findOrFail($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->status = $request->input('status');

        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($user->update()) {
            $user->roles()->sync($request->input('role'));

            $notification = array(
                'message' => 'User is  successfully updated!',
                'type' => 'success'
            );

        } else {
            $notification = array(
                'message' => 'User doesn\'t update!',
                'type' => 'error'
            );

        }

        return redirect()->back()->with($notification);

    }

    /**
     * Delete user
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        // get user
        $user = User::findOrFail($id);

        if($user->delete()) {
            $message = [
                'message' => 'User has been deleted.',
                'type' => 'success'
            ];
        } else {
            $message = [
                'message' => 'User has not been deleted.',
                'type' => 'danger'
            ];
        }

        return redirect()->back()->with($message);
    }
}
