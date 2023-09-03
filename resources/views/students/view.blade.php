<x-layout.default>
<link rel="stylesheet" href="{{ Vite::asset('resources/css/flatpickr.min.css') }}">
    <script src="/assets/js/flatpickr.js"></script>
    <script src="/assets/js/simple-datatables.js"></script>


    <div x-data="multicolumn">        
        
        <div class="flex items-center gap-3">
            <div>
                <input id="minvalue" type="text" placeholder="From Date..." class="form-input"
                    x-model="fromDate" />
            </div>
            <div >
                <input id="maxvalue" type="text" placeholder="To Date..." class="form-input"
                    x-model="toDate"  />
            </div>
            <div>
                <button type="submit" class="btn btn-primary" x-on:click="rangeChange()">Search</button>
            </div>
            <div>
                <a href="{{ route('students.create')}}" class="btn btn-warning rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>Add
                </a>
            </div>
        </div>
       
        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light"> student
            </h5>                  
           
            <table  id="myTable" class="whitespace-nowrap"></table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("multicolumn", () => ({                
                fromDate: '',
                toDate: '',
                dateSearch: '',
                allData: [
                    @if(!empty($students))
                    @foreach($students as $student)
                    {                                  
                        name: '{{ $student->name }}',
                        email:  '{{ $student->email }}',
                        mobile: '{{ $student->mobile }}', 
                        address: '{{ $student->address }}',
                        gender: '{{ $student->gender }}', 
                        dob: '{{ $student->dob }}',
                        action: '<a href=""  class="btn btn-sm btn-outline-danger"> Delete</a> &nbsp; <a href="{{ route("students.edit", ["student"=>$student->id]) }}"  class="btn btn-sm btn-outline-primary"> Edit</a>',
                    },
                
                    @endforeach
                    @endif
                ],
                filterData: [],

                dataArr: [],


                datatable: null,
                rangeChange() {
                    let dt = this.allData;

                    if (this.fromDate != '' && this.fromDate != null) {
                        dt = dt.filter((d) => d.dob >= this.fromDate);
                    }
                    if (this.toDate != '' && this.toDate != null) {
                        dt = dt.filter((d) => d.dob <= this.toDate);
                    }


                    this.filterData = dt;
                    console.log( this.filterData);

                    this.dataArr = [];
                    this.setTableData();
                    this.datatable.destroy();
                },

                setTableData() {
                    for (let i = 0; i < this.filterData.length; i++) {
                        this.dataArr[i] = [];
                        for (let p in this.filterData[i]) {
                            if (this.filterData[i].hasOwnProperty(p)) {
                                this.dataArr[i].push(this.filterData[i][p]);
                            }
                        }
                    }
                },
                initializeTable() {
                   
                    this.datatable = new simpleDatatables.DataTable('#myTable', {                       
                       
                        data: {
                            headings: ['Name', 'Email', 'Mobile', 'Address', 'Gender',
                                'DOB', 'Action'
                            ],
                            data: this.dataArr,
                        },
                        searchable: true,                        
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                render: (data, cell, row) => {
                                    return `<div class="flex items-center w-max"><img class="w-9 h-9 rounded-full ltr:mr-2 rtl:ml-2 object-cover" src="/assets/images/profile-${row.dataIndex + 1}.jpeg" />${data}</div>`;
                                },
                                sort: "asc"
                            },
                            // {
                            //     select: 5,
                            //     render: (data, cell, row) => {
                            //         return this.formatDate(data);
                            //     },
                            // }
                        ],
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
                init() {
                    this.initDatePicker();
                    this.$watch('dataArr', value => {
                        this.initializeTable();
                    });
                    this.filterData = this.allData;
                    this.setTableData();
                },
                // formatDate(date) {
                //     if (date) {
                //         const dt = new Date(date);
                //         const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt
                //         .getMonth() + 1;
                //         const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                //         return day + '/' + month + '/' + dt.getFullYear();
                //     }
                //     return '';
                // },
                initDatePicker() {
                    flatpickr(document.getElementById('minvalue'), {
                        dateFormat: 'd/m/Y',
                    });
                    flatpickr(document.getElementById('maxvalue'), {
                        dateFormat: 'd/m/Y',
                    });

                }
                


            }));
        });

        let minDate, maxDate;
 
      
        // Create date inputs
        minDate = new Date('#min', {
            format: 'MMMM Do YYYY'
        });
    </script>


</x-layout.default>
