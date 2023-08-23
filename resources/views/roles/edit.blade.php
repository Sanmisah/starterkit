<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Roles</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Account Settings</span>
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
                <form method="POST" action="{{route('roles.update', ['role' => $role->id])}}">
                @csrf
                @method('PUT')
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" value="{{ $role->name }}"/>
                    </div>
                    {{-- Guard Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Guard Name</label>
                        <select class="form-control form-control-user @error('guard_name') is-invalid @enderror" name="guard_name">
                            <option selected disabled>Select Guard Name</option>
                            <option value="web" {{old('guard_name') ? ((old('guard_name') == 'web') ? 'selected' : '') : (($role->guard_name == 'web') ? 'selected' : '')}}>Web</option>
                            <option value="api" {{old('guard_name') ? ((old('guard_name') == 'api') ? 'selected' : '') : (($role->guard_name == 'api') ? 'selected' : '')}}>Api</option>
                        </select>
                        @error('guard_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label> <span style="color:red;">*</span> Permissions</label>
                        <input type="checkbox" name="check-all" class="form-contol" id="checkAllPermissions" {{ (count($permissions) == count($role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}/> All
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach ($permissions as $permissionIndex => $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input permission-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} type="checkbox" name="permissions[]" id="inlineCheckbox_{{$permissionIndex}}"  value="{{$permission->id}}">
                                        <label class="form-check-label" for="inlineCheckbox{{$permissionIndex}}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>


