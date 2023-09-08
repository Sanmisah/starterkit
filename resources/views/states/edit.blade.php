<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('states.index') }}" class="text-primary hover:underline">States</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('states.update', ['state' => $state->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit State</h5>
                </div>
                <div class="grid grid-cols-2 gap-4">             
                    <div> 
                        <label>Country:<span style="color: red">*</span></label>
                        <select class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="country_id">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" {{$state->country_id ? (($state->country_id == $country->id) ? 'selected' : '') : ''}}>
                                    {{$country->name}}
                                </option>
                            @endforeach
                        </select>                        
                        @if($errors->default->first('country_id'))
                        <p class="text-danger mt-1">Please select Country</p>
                        @endif
                    </div>     
                    <div>
                        <label>State Name:<span style="color: red">*</span></label>
                        <x-text-input class="form-input"  name="name" value="{{ $state->name }}" required  />                       
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />    
                    </div>
                </div>     
                <br>     
                <button type="submit" class="btn btn-info" style="float:right;">Submit</button>
                <br><br>
            </div>
        </form> 
    </div>
</div>
</x-layout.default>
