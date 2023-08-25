<x-layout.default>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('contacts.index') }}" class="text-primary hover:underline">Contact Form</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Account Settings</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <!-- <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5> -->
            </div>
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Contact Form</h5>
                </div>
                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" required autofocus autocomplete="name"/>
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email"
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" required autofocus autocomplete="email"/>
                        </div>
                    </div>                   
                    <div>
                        <label for="actionMessage">Message:</label>
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....." required autofocus autocomplete="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.default>
