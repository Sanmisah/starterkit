<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('state.index') }}" class="text-primary hover:underline">State</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('state.store') }}" method="POST">
            @csrf
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add State</h5>
                </div>
                <div class="grid grid-cols-2 gap-4">          
                    <div>
                        <label>Country:<span style="color: red">*</span></label>
                        <select class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 selectize  @error('country') is-invalid @enderror" name="country_id">
                            <option selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" 
                                    {{old('country') ? ((old('country') == $country->id) ? 'selected' : '') : '' }}>
                                    {{$country->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('country')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>     
                    <div>
                        <label>Name:<span style="color: red">*</span></label>
                        <input type="text" placeholder="Enter name" class="form-input" name="name" required autofocus />
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary !mt-6">Submit</button>
        </form> 
    </div>
</div> 
</x-layout.default>
