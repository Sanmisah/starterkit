<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('countries.index') }}" class="text-primary hover:underline">Countries</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('countries.update', ['country' => $country->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Country</h5>
                </div>
                <div class="grid grid-cols-2">               
                    <div>
                        <label for="fullname">Country Name:<span style="color: red">*</span></label>
                        <x-text-input id="country" class="form-input"  name="name" value="{{ $country->name }}" required  />                       
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />        
                    </div>
                </div>
                <button type="submit" class="btn btn-info" style="float:right;">Submit</button>
                <br><br>
            </div>
        </form> 
    </div>
</div>
</x-layout.default>
