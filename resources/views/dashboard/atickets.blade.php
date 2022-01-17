<x-app-layout>
    <x-slot name="header">
       
       
          <div class="flex flex-row">
       <a href="/dashboard/admin">
        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
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
        <a href="/dashboard/agent/tickets/"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
            Tickets
        </button>
        </a>
        @else
        <a href="/dashboard/admin/tickets/"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
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

</style>
    </x-slot>
        <div class="overflow-hidden bg-white max-y">
            
            
            
            
            
         
            
            
            
            
            
               <div class="relative py-3 sm:mx-auto " style="width: 75rem">
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                            <center>   
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                            
    <div class="relative px-255 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-15">
        
      <div class="max-w-m mx-auto">
        <div class="">


  
  

<style>
  .active {background: white; border-radius: 9999px; color: #63b3ed;}
</style>
  
  
  
<div class="float-left" class="ml-5">
<form action="{{route('tick.submit') }}" method="POST" enctype="multipart/form-data" class="form">
    {!! csrf_field() !!}




<div class="text-gray-600">
 <button type="submit" class="right-750 top-0 mr-2 ml-4">
    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
  </button>
  <input type="search" name="ticketid" id="ticketid" placeholder="Search by ID/Username" class="bg-white h-10 px-5 rounded-full text-sm focus:outline-none">
 
</div>
</form>
</div>

<div class="float-right mr-2">
  <div class="bg-gray-200 text-sm text-gray-500 leading-none border-2 border-gray-200 rounded-full inline-flex">
    <button class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-l-full px-4 py-2 active" id="grid">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
</svg>
<span>&nbsp; All</span>
    </button>
    <a href="{{url('/dashboard/admin/tickets/active')}}">
    <button class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-r-full px-4 py-2" id="list">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
</svg>      <span>&nbsp; Open</span>
    </button>
    </a>
  </div>
</div>
 

 
 <table class="table-fixed text-center">
  <thead>
    <tr>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Ticket</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Last Reply</th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Creation Date</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
        <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
        <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
    </tr>
  </thead>
  <tbody> 
  
  
  
    @foreach($tickets as $ticket)
    <tr>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><a href="/dashboard/view/{{$ticket->ticket_id}}">{{$ticket->ticket_id}}</a></td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"> {{$ticket->title}}</td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$ticket->updated_at}}</td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$ticket->created_at}}</td>
       <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">
                    @if($ticket->status == 'Open')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Open
                            </span>
                   @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Closed
                            </span>
                    @endif
           </td>        
          
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <a href="/dashboard/view/{{$ticket->ticket_id}}"<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">View</a></button>
           </a>
                                    </td>
        <form action="{{route('tick.submit') }}" method="POST" enctype="multipart/form-data" class="form">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}">
           @if($ticket->status == 'Open')
          <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <button name="close" value="close" type="submit" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Close</button>
           </a>
                                    </td>
           @else
                     <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <button name="open" value="open" type="submit" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Open</button>
           </a>
                                    </td>
          @endif
    
    </tr>
    </form>
    
    @endforeach
  </tbody>
</table>   
{{$tickets->render()}}

 
 
 
 
 
    
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
        </div>
      </div>
    </div>

</center>


    </div>
            
            
            
            
            
            
            
            
            
            
            
         
 
            </div>
            
            
    
 
            
            
            
</x-app-layout>