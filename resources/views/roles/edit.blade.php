<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('roles.index') }}" class="text-primary hover:underline">Roles</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Account Settings</span>
            </li>
        </ul>
        <div class="pt-5">           
            <div class="panel grid grid-cols-1 sm:grid-cols-2 gap-4">                
                <form class="space-y-5" action="{{ route('roles.update',$role->id) }}" method="POST">
                    @csrf
                    @method('PUT')                    
                    <div>
                        <label for="actionName">Name:</label>
                        <input id="actionName" type="text" class="form-input" name="name" value="{{ $role->name }}" />
                    </div>                   
                    <div>
                        <label for="actionGuardName">Guard Name:</label>                       
                        <select name="guard_name" id="actionGuardName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select</option>
                            <option value="web" @if ($role->guard_name == "web") {{ 'selected' }} @endif>Web</option>
                            <option value="api" @if ($role->guard_name == "api") {{ 'selected' }} @endif>API</option>
                        </select>
                    </div>  
                    <div>  
                        <!-- <label for="actionPermission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions:</label>
                        <select name="permission_id" id="actionPermission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="option_select" disabled selected>Select name</option>
                            @if(isset($permissions))
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" {{ $permission->id == $role->permission_id ? 'selected' : ''}}>{{ $permission->name }}</option>
                            @endforeach
                            @endif
                        </select>   -->
                        <ul>
                            @foreach($permissions as $permission)
                            <li style="width:19%;display: inline-block;">
                                <label class="inline-flex">
                                    <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class="form-checkbox outline-info permission" {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>                       
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>
