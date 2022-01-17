<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Tickets
        </h2>
        
       
    </x-slot>
    
    
    
    
    
    
    <div class="bg-gray-50 w-screen h-screen sm:p-5">
  <div class="bg-white border border-gray-200 rounded flex h-full">
    <!-- Left -->
    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 h-full">
   
      <!-- Chats -->
      <ul class="py-1 overflow-auto">
        <!-- Chat 1 -->
          @if($tickets->isEmpty())
                <P>You have not made any tickets.</P>
            @else
            
            @foreach($tickets as $ticket)
<a href="{{ url('/dashboard/view/' . $ticket->ticket_id)}}">
        <li>
          <button class="flex items-center w-full px-4 py-2 select-none hover:bg-gray-100 focus:outline-none">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
</svg>
            <div class="transform translate-y-0.5 text-left">
              <h3 class="leading-4">{{$ticket->title}}</h3>  @if($ticket->status ==='Open')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                            </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Closed
                            </span>
                    @endif
              <span class="text-xs text-gray-500">Last Reply: {{$ticket-> updated_at}}</span>
            </div>
          </button>
        </li>
</a>
        @endforeach
        {{ $tickets->render() }}
        @endif
      </ul>
    </div>
    <!-- Right -->
    <div class="hidden sm:w-1/2 md:w-2/3 lg:w-3/4 border-l border-gray-200 sm:flex items-center justify-center text-center">
      <div class="space-y-5">
        <div class="inline-flex p-3 items-center justify-center">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
</svg>
        </div>
        <div class="space-y-0.5">
          <h1 class="font-semibold text-xl">Your Tickets</h1>
        </div>
    <a href="/dashboard/new">    <button class="bg-blue-500 py-1 px-3 rounded text-white select-none focus:outline-none">Create New Ticket</button> </a>
      </div>
    </div>
  </div>
</div>
    
    
    
    
    
</x-app-layout>