<x-layout.default>
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('country.index') }}" class="text-primary hover:underline">Country</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create</span>
        </li>
    </ul>
    <div class="pt-5">        
        <form class="space-y-5" action="{{ route('country.store') }}" method="POST">
            @csrf
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Country</h5>
                </div>
                <div class="grid grid-cols-1">               
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
