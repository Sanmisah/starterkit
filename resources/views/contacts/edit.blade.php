<x-layout.default>

    <div>
      <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('contacts.index') }}" class="text-primary hover:underline">Contact </a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <!-- <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5> -->
            </div>
            <form class="space-y-5" action="{{ route('contacts.update',$contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="panel">      
                <div class="grid grid-cols-4 gap-4"> 
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" value="{{ $contact->name }}" />
                    </div>
                    <div>
                        <label for="actionName">Pan Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input @error('pancard') has-error @enderror " name="pancard" value="{{ $contact->pancard }}"/>
                      
                    </div>
                    <div>
                        <label for="actionName">Aadhar Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input @error('pancard') has-error @enderror " name="aadhar" value="{{ $contact->aadhar }}"/>
                      
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email" value="{{ $contact->email }}"
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>   
                </div>                
                <div class="grid grid-cols-1">           
                    <div>
                        <label for="actionMessage">Message:</label>
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....."  value="{{ $contact->message }}">{{ $contact->message}}</textarea>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary !mt-6 float-right">Submit</button>

                    </div>
                    
                </div>                 
            </div>
            </form>
        </div>
    </div>
</x-layout.default>
