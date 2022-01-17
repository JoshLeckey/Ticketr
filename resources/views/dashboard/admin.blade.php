<x-app-layout>
    <x-slot name="header">

      <div class="flex flex-row">
       <a href="/dashboard/admin">
        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
            Overview
        </button>
        </a>
        @if (Auth::user()->is_admin == 1)
        <a href="/dashboard/admin/settings"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Settings
        </button>
        </a>
        @endif
        @if (Auth::user()->is_admin == 2)
        <a href="/dashboard/agent/tickets/"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Tickets
        </button>
        </a>
        @else
        <a href="/dashboard/admin/tickets/"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Tickets
        </button>
        </a>
        @endif
         @if (Auth::user()->is_admin == 1)
        <a href="/dashboard/admin/users"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Users
        </button>
        @endif
        </a>
    </div>
        
        <style>
        chart: {
    width: '100%'
}
    </style>
         
        
    </x-slot>
    
   
    
      <div class="py-1">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
                  <div class="">
    <div class="relative bg-white shadow-lg sm:rounded-3xl sm:p-15">
      <div class="max-w-m mx-auto">
        <div class="">
 
 <center>
     
 
     
 </center>
 
 
  <center>
        {!! $chart->container() !!}
    </center>
 
 
        </div>
      </div>
    </div>

    </div>
    
    <br>
            
             <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">

            <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                    <div class="flex items-center">
                        <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
</svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-lg">{{count(App\Tickets::All())}}</div>
                            <div class="text-sm text-gray-400">Total Tickets</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-green-400">
                    <div class="flex items-center">
                        <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
</svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-lg">{{count(App\Tickets::where('status', 'Open')->get())}}</div>
                            <div class="text-sm text-gray-400">Active Tickets</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-red-400">
                    <div class="flex items-center">
                        <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-lg">{{count(\App\Models\User::All())}}</div>
                            <div class="text-sm text-gray-400">Registered Users</div>
                        </div>
                    </div>
                </div>
            </div>

            

          
        </div>
  
    
        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
    
    
    <div class="w-full lg:w-1/3">
         
            </div>
            
            
             <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-purple-400">
                    <div class="flex items-center">
                        <div class="icon w-14 p-3.5 bg-purple-400 text-white rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
</svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-lg">{{count(\App\Models\User::where('is_admin', 2)->get())}}</div>
                            <div class="text-sm text-gray-400">Operators</div>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    
    
    
   
    
    </div>
    </div>
    <script src="{{ LarapexChart::cdn() }}"></script>
    {{ $chart->script() }}
    
</x-app-layout>