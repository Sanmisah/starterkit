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
            <form class="space-y-5" enctype="multipart/form-data" action="{{ route('contacts.update',$contact->id) }}" method="POST">
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
                <div   class="grid grid-cols-3 gap-4" x-data="data">
                    <div>
                        <label for="actionRole">Country:</label>
                        <select class="form-select" name="country_id" x-model="country_id"  x-on:change="countryChange()">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" 
                                    {{ $contact->country_id ? ($contact->country_id == $country->id ? 'selected' : '') : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                           
                            
                        </select>
                    </div>       
                    <div >
                        <label for="actionRole">State:</label>
                        <select class="form-select" x-model="state_id"  name="state_id" >
                        <option selected disabled>Select State</option>
                            <template x-for="state in states">
                            <option 
                                :value='state.id'
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
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....."  value="{{ $contact->message }}">{{ $contact->message}}</textarea>
                    </div>
                   
                    
                </div>      
                <div class="grid grid-cols-4">           
                    <div >
                    <label for="actionMssage">Picture:</label>
                        <input type="file" name="picture">
                    </div>
                    <div>
                    <img src="{{$contact->getFirstMediaUrl('picture')}}"  width="120px">
                    </div>
                   
                    
                </div> 
                <div class="grid grid-cols-1">           
                   
                    <div>
                        <x-success-button>
                            {{ __('Success') }}
                        </x-success-button>

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
                state_id: '',
                states: '',
                async countryChange() {
                    console.log("fi");
                    this.result = await (await fetch('/countries/'+ this.country_id, {
                    method: 'GET',
                    headers: {
                        'Content-type': 'application/json;',
                    },
                    })).json();
                    this.states = this.result;
                    console.log(this.states);
                },

                init(){
                    @if($contact->country_id)
                    this.country_id = {{ $contact->country_id }};
                    this.countryChange();
                    @endif

                    @if($contact->state_id)
                    this.state_id = {{ $contact->state_id }};
                    @endif
                }
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
