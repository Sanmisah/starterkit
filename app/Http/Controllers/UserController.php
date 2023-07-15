<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        dd("hi");
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
        return view('users.add');
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
            'password'     => 'required',
            'email'         => 'required|unique:users,email',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user = User::create([
                'name'    => $request->first_name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),

            ]);
           
            DB::commit();
            return redirect()->route('users.index')->with('success','User Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

   
  
    public function edit(User $user)
    {
        return view('users.edit')->with([
            'user'  => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Validations
        $request->validate([
            'name'    => 'required',
            'password'     => 'required',
            'email'         => 'required|unique:users,email,'.$user->id.',id',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user_updated = User::whereId($user->id)->update([
                'name'    => $request->first_name,
                'password'     => $request->password,
                'email'         => $request->email,
            ]);

           
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('users.index')->with('success','User Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

  
    public function delete(User $user)
    {
        DB::beginTransaction();
        try {
            // Delete User
            User::whereId($user->id)->delete();

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

  

}
