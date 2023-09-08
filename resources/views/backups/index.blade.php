<x-layout.default>
    <style>
        .dt-head-right {float: right;}
    </style>    
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="multicolumn">        
       
        <div class="panel mt-6">
            <x-add-button :link="route('backup.all')" :text="'Backup'"/>
            <x-add-button :link="route('backup.onlyDb')" :text="'Database Backup '"/>
            <x-add-button :link="route('backup.onlyFiles')" :text="' Files Backup'"/>

            <div class="lead" style="display:inline-block;">
                <a href="{{ route('backup.clean') }}" class="btn btn-danger rounded-full">
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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> Clean Backup
                </a>
            </div>
         
        </div>
    </div>
  
</x-layout.default>
