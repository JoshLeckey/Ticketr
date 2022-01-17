<x-app-layout>

    <div class="py-12">
  
            
             
            <div class="md:grid md:grid-cols-2 md:gap-4 space-y-4 md:space-y-0 sm:px-96 mt-4">
            <div class="shadow border rounded-lg">
                <div class="flex items-center space-x-4 p-4">
                    <div class="flex items-center p-4 bg-blue-400 text-white rounded-lg">
<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
</svg>                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 font-semibold">Total Tickets</p>
                        <div class="flex items-baseline space-x-4">
                            <h2 class="text-2xl font-semibold">
                                {{count(\App\Tickets::where('user_id', auth()->user()->id)->get())}}
                            </h2>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/view/" class="block p-3 text-lg font-semibold bg-blue-50 text-blue-800 hover:bg-blue-100 cursor-pointer">
                    View all
                </a>
            </div>
          
            <div class="shadow border rounded-lg">
                <div class="flex items-center space-x-4 p-4">
                    <div class="flex items-center p-4 bg-green-400 text-white rounded-lg">
<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
</svg>                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 font-semibold">Active Tickets</p>
                        <div class="flex items-baseline space-x-4">
                            <h2 class="text-2xl font-semibold">
                                {{count(\App\Tickets::select('*')->where('user_id',auth()->user()->id)->where('status', 'Open')->get())}}
                            </h2>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/view" class="block p-3 text-lg font-semibold bg-green-50 text-green-800 hover:bg-green-100 cursor-pointer">
                    View all
                </a>
            </div>
        </div>
            
            
              <div class="relative py-3 hidden sm:table sm:mx-auto " style="width: 47rem">
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                            <center>   
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                 <br><br>      
                       
                            
    <div class="relative px-255 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-15">
        
      <div class="max-w-m mx-auto">
        <div class="">
 
 
@isset($ticket)

 
 <h1 class="text-2xl md:text-2xl mb-5 leading-tight">Latest ticket awaiting your reply:</h1>
 
 
 
 
 
 
 


 
 <table class="table-fixed text-center">
  <thead>
    <tr>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Ticket</th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Last Reply</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
    </tr>
  </thead>
  <tbody> 
  
  
  
    <tr>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><a href="/dashboard/view/{{$tickets->ticket_id ?? ''}}">#{{$ticket->ticket_id}}</a></td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$ticket->updated_at}}</td>
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                       
                                        <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"><a href="/dashboard/view/{{$ticket->ticket_id ?? ''}}">View</a></button>
                                    </td>
           
           </a>
        
        
    </tr>
  </tbody>
</table>   

 
 

 
 
 
 
 
    
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
        </div>
      </div>
    </div>

</center>


    </div>
    
    <br>
    
<center>   <a href="/dashboard/new/"> <button class="bg-blue-500 px-4 py-2 font-semibold tracking-wider text-white rounded hover:bg-blue-600">Create Ticket</button> </a> </center>
    @endisset 
    @empty($ticket)
    
     <div
         class="bg-green-200 px-5 py-3 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4"
         >
      <svg
           viewBox="0 0 24 24"
           class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
           >
        <path
              fill="currentColor"
              d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"
              ></path>
      </svg>
      <span class="text-green-800"> No tickets awaiting reply. </span>
    </div>
    
    
    @endempty
            
         

</x-app-layout>