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
            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel">
                <div class="grid grid-cols-4 gap-4"  x-data="data">              
                
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name"/>
                    </div>
                    <div>
                        <label for="actionName">Pan Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input @error('pancard') has-error @enderror " name="pancard"/>
                      
                    </div>
                    <div>
                        <label for="actionName">Aadhar Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input @error('pancard') has-error @enderror " name="aadhar" />
                      
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
                    <div >
                        <label for="actionRole">Country:</label>
                        <select class="selectize" name="country_id" x-model="country_id"  x-on:change="countryChange()">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" 
                                    {{old('country') ? ((old('country') == $country->id) ? 'selected' : '') : '' }}>
                                    {{$country->name}}
                                </option>
                            @endforeach
                           
                            
                        </select>
                    </div>       
                    <div >
                        <label for="actionRole">State:</label>
                        <select class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " id="country" name="state_id" >
                        <option selected disabled>Select State</option>
                            <template x-for="state in states">
                            <option 
                                :value='state.key'
                                x-text="state.name"
                            >
                            </option>
                            </template>
                          </select>
                    </div>       
                </div>      
                <div class="grid grid-cols-1">           
                    <div>
                        <label for="actionMessage">Message:</label>
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....."></textarea>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary !mt-6 float-right">Submit</button>

                    </div>
                    
                </div> 
            </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data('data', () => ({
                country_id: '',
                states: '',
                async countryChange() {
                    console.log("fi");
                    this.result = await (await fetch('/country/'+ this.country_id, {
                    method: 'GET',
                    headers: {
                        'Content-type': 'application/json;',
                    },
                    })).json();
                    this.states = this.result;
                    console.log(this.states);
                },
            }));
        });    
        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
</script>
</x-layout.default>
