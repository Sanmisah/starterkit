<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>User Edit</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5>
            </div>
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Recent Orders</h5>
                </div>
                <form method="POST" action="{{ route('users.update', ['user'=>$user->id]) }}">
                 @csrf
                 @method('PATCH')
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" value="{{ $user->name }}"/>
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email" value="{{ $user->email }}"
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Role</label>
                        <select class="form-control form-control-user @error('role') is-invalid @enderror" name="role">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" 
                                    {{old('role_id') ? ((old('role_id') == $role->id) ? 'selected' : '') : (($user->role_id == $role->id) ? 'selected' : '')}}>
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>
