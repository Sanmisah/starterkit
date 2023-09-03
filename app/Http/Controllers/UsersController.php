<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Create User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with(['roles' => $roles]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store( StoreUserRequest $request) 
    {
       

        $input = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' =>true,
        ]);  
        return redirect()->route('users.index')
        ->withSuccess(__('User updated successfully.'));

    }

   
  
    public function edit(User $user)
    {
         $roles = Role::all();
         
        return view('users.edit')->with([
            'user'  => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => $roles
        ]);
    }
    public function update(User $user, Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'active' => 'required',
        ]);    
       
        
        $user->update($request->all());


        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

  

  
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

  

}
