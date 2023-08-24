<?php
namespace App\Http\Controllers;

use App\Models\User;

use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all()->load('role');
        $roles = Role::all();
        return view('user.index',compact('users','roles'));
    }
   
    public function edit(User $user)
    {        
        return view('profile.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        $roles = Role::all();   
        return view('profile.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $input = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
            'role_id' => $request->role_id,
        ]);  
        $user->syncRoles($request->role_id);
        return redirect()->route('index');
    }
    public function change()
    {
        return view('profile.change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return Redirect::route('dashboard')->with('succedd', 'Password has been changed');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
       
    }
 
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'active' => 'required',
        ]);
    
        $input = $request->all();
        $user->update($input);
        $user->syncRoles($request->role_id);
        return redirect()->route('index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('index');
    }
}
