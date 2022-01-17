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
  
  
 


<a href="{{url('/dashboard/admin/tickets/')}}">                   <button type="button" class="focus:outline-none text-blue-600 text-sm py-2.5 px-5 rounded-md hover:bg-blue-100">

    Show All</button>
</a>

<br><br>
 

 
 <table class="table-fixed text-center">
  <thead>
    <tr>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Ticket</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Last Reply</th>
             <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Created at</th>
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