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
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Roles</h5>
                </div>
                <form class="space-y-5" action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="actionName">Name:</label>
                        <x-text-input  class="form-input"  name="name"  required  />                       
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />    
                    </div>
                    <div>
                        <label for="actionGuardName">Guard Name:</label>                        
                        <select name="guard_name" id="actionGuardName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 required">
                            <option selected>Select Guard name</option>                            
                            <option value="web">Web</option>
                            <option value="api">API</option>
                        </select>
                    </div>
                   
                    <div>
                        <ul>
                            @foreach($permissions as $permission)
                            <li style="width:19%;display: inline-block;">
                                <label class="inline-flex">                            
                                <!-- <input type="checkbox" name="permission_id" value="{{ $permission->id }}" class="form-checkbox outline-info" id="permission"> -->
                                <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class="form-checkbox outline-info permission">
                                {{ $permission->name }}
                            </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <x-success-button>
                        {{ __('Success') }}
                    </x-success-button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {
                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }
            });
        });
    </script>
@endsection