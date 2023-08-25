<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
          
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
            </div>
            <form method="POST" action="{{ route('users.store') }}">
                 @csrf
            <div class="panel grid grid-cols-1 sm:grid-cols-2 gap-4">
               
               
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" />
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email" 
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>
                    <div>
                        <label for="actionEmail">Password:</label>
                        <div class="flex flex-1">
                           
                            <input id="actionEmail" type="password" placeholder=""  name="password" 
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label for="actionRole">Role:</label>
                        <select class="selectize  @error('role') is-invalid @enderror" name="role">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" 
                                    {{old('role') ? ((old('role') == $role->id) ? 'selected' : '') : '' }}>
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        
                        @error('role')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>   
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label for="actionRole">Active:</label>
                        <select class="selectize  @error('active') is-invalid @enderror" name="active">
                            <option selected disabled>Select Role</option>
                            <option value='true'>Active</option>
                            <option value='false'>Deactive</option>
                           
                        </select>
                        
                        @error('active')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>   
                   
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>
