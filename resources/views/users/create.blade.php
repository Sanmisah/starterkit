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
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Recent Orders</h5>
                </div>
                <form method="POST" action="{{ route('users.store') }}">
                 @csrf
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
                   
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout.default>
