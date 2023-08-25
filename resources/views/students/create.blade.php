<x-layout.default>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('students.index') }}" class="text-primary hover:underline">Students</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Create</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Add Students</h5>
            </div>
            <form class="space-y-5" action="{{ route('students.store') }}" method="POST">
             @csrf
                <div class="panel">
                    <div class=" grid grid-cols-3 gap-4">               
                        <div>
                            <label >Name:</label>
                            <input type="text" placeholder="Enter Name" class="form-input" name="name" required autofocus />
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label >Email:</label>
                            <input type="email" placeholder="Enter Email" class="form-input" name="email" required autofocus />
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label >Mobile:</label>
                            <input type="text" placeholder="Enter Mobile" class="form-input" name="mobile" required autofocus />
                            @error('mobile')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>      
                        <div >
                            <label for="actionRole">Gender:</label>
                            <select class="selectize  @error('gender') is-invalid @enderror" name="gender">
                                <option selected disabled>Select </option>
                                <option value='Female'>Female</option>
                                <option value='Male'>Male</option>
                                
                            </select>
                            
                            @error('gender')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>               
                        <div>
                            <label >D.O.B:</label>
                            <input type="date" placeholder="Enter Date" class="form-input" name="dob" required autofocus />
                            @error('dob')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>                
                        
                    
                    </div>
                    <div class="  grid grid-cols-1">   
                        <div>
                            <label >Address:</label>
                            <input type="text" placeholder="Enter Address" class="form-input" name="address" required autofocus />
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>    
                        
                    </div>
                </div>
                <div class="panel table-responsive">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light"> Students Details</h5>
                    </div>

                    <div x-data="StudentDetails">
                        <div class="flex xl:flex-row flex-col gap-2.5">
                            <div class="panel px-0 flex-1 py-6 ltr:xl:mr-6 rtl:xl:ml-6">
                            
                                <hr class="border-[#e0e6ed] dark:border-[#1b2e4b] my-6">
                            
                                <div class="mt-8">
                                    <template x-if="studentDetails">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th class="w-1">Marks</th>
                                                        <th class="w-1">Grade</th>
                                                        <th class="w-1"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-if="studentDetails.length <= 0">
                                                        <tr>
                                                            <td colspan="5" class="!text-center font-semibold">No Item Available
                                                            </td>
                                                        </tr>
                                                    </template>
                                                    <template x-for="(studentDetail, i) in studentDetails" :key="i">
                                                        <tr class="align-top border-b border-[#e0e6ed] dark:border-[#1b2e4b]">
                                                            <td>
                                                                <input type="text" class="form-input min-w-[200px]"
                                                                    placeholder="Enter Item Name" x-model="studentDetail.subject" x-bind:name="`student_details[${studentDetail.id}][subject]`"/>
                                                            </td>
                                                                <td><input type="text" class="form-input w-32" placeholder="Marks"  x-bind:name="`student_details[${studentDetail.id}][marks]`"
                                                                    x-model="studentDetail.marks"  /></td>
                                                            <td><input type="text" class="form-input w-32" placeholder="Grade" x-bind:name="`student_details[${studentDetail.id}][grade]`"
                                                                    x-model="studentDetail.grade" /></td>
                                                            <td>
                                                                <button type="button" @click="removeItem(studentDetail)">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="w-5 h-5">
                                                                        <line x1="18" y1="6" x2="6"
                                                                            y2="18"></line>
                                                                        <line x1="6" y1="6" x2="18"
                                                                            y2="18"></line>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>
                                    </template>
                                    <div class="flex justify-between sm:flex-row flex-col mt-6 px-4">
                                        <div class="sm:mb-0 mb-6">
                                            <button type="button" class="btn btn-primary" @click="addItem()">Add Item</button>
                                        </div>                                    
                                    </div>

                                   
                                </div>
                                
                            </div>
                        
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary !mt-6">Submit</button>
             </form> 

           
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data('StudentDetails', () => ({
                studentDetails: [],
                               
                

                addItem() {
                    let maxId = 0;
                    if (this.studentDetails && this.studentDetails.length) {
                        maxId = this.studentDetails.reduce((max, character) => (character.id > max ? character
                            .id : max), this.studentDetails[0].id);
                    }
                    this.studentDetails.push({
                        id: maxId + 1,
                        subject: '',
                        marks: 0,
                        grade: '',
                    });
                },

                removeItem(studentDetail) {
                    this.studentDetails = this.studentDetails.filter((d) => d.id != studentDetail.id);
                }
            }));
        });
    </script>

</x-layout.default>
