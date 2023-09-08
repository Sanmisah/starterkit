<x-layout.default>
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="multicolumn">
        <div class="flex items-center gap-3">
            <div>
                <input id="fromDate" type="text" placeholder="From Date..." class="form-input"
                    x-model="fromDate" />
            </div>
            <div >
                <input id="toDate" type="text" placeholder="To Date..." class="form-input"
                    x-model="toDate"  />
            </div>
            <div>
                <button type="submit" class="btn btn-primary" x-on:click="searchByDate()">Search</button>
            </div>
            <x-add-button :link="route('students.create')" :text="Student"/>
        </div>
        <div class="panel mt-6 table-responsive">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Students List
            </h5>
            <table id="myTable" class="whitespace-nowrap table-hover">
                @foreach ($students as $student)
                <tr>
                    <td>{{ ($student->name) }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->dob }}</td>
                 
                    <td class="text-center">
                        <ul class="flex items-center justify-center gap-2">
                            <li style="display: inline-block;vertical-align:top;">
                                <x-edit-button :link=" route('students.edit', $student->id)" />                               
                            </li>
                            <li style="display: inline-block;vertical-align:top;">
                                <x-delete-button :link=" route('students.destroy',$student->id)" />  
                            </li>
                        </ul>
                    </td> <td class="text-center">
                                           
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("multicolumn", () => ({
                datatable: null,
                fromDate: '',
                toDate: '',
                init() {
                    flatpickr(document.getElementById('fromDate'), {
                        dateFormat: 'd/m/Y',
                    });
                    flatpickr(document.getElementById('toDate'), {
                        dateFormat: 'd/m/Y',
                    });
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings: ['Name', 'Email', 'Mobile', 'Address', 'Gender',
                                'DOB', 'Action'],
                        },
                        searchable: true,
                        perPage: 20,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                            select: 0,
                            sort: "asc"
                        }, ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    })
                },

                searchByDate(){
                    console.log("hi");
                    
                },
            }));
        });
    </script>


</x-layout.default>
