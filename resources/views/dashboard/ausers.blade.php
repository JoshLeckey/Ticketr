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
        <a href="/dashboard/admin/tickets/"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Tickets
        </button>
        </a>
        <a href="/dashboard/admin/users"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
            Users
        </button>
        </a>
    </div>
       
    </x-slot>
        <div class="overflow-hidden bg-white max-y">
            
            
            
            
            
         
            
            
            
            
            
               <div class="relative py-3 sm:mx-auto " style="width: 75rem">
                   
                   
                   
  
<form action="{{route('user.submit') }}" method="POST" enctype="multipart/form-data" class="form">
    {!! csrf_field() !!}
<div class="text-gray-600">
 <button type="submit" class="right-750 top-0 mr-2 ml-4">
    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
  </button>
  <input type="search" name="usersearch" id="usersearch" placeholder="Search by Username" class="bg-white h-10 px-5 rounded-full text-sm focus:outline-none">
 
</div>
</form>
                   
                   
                   
                   
                   
                   
                   
                   
                            <center>   
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                            
    <div class="relative px-255 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-15">
        
      <div class="max-w-m mx-auto">
        <div class="">
 
 
 
 
 
 
 


 
 <table class="table-fixed text-center">
  <thead>
    <tr>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Username</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Tickets</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Role</th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Change Role</th>
       <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
    </tr>
  </thead>
  <tbody> 
    @foreach($users as $user)
    <p hidden>{{$userank = $user->is_admin}}</p>
    <tr>
       
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$user->name}}</td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$user->email}}</td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{count(App\Tickets::where('user_id', $user->id)->get())}}</td>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">@if($userank == 2)Agent @elseif($userank == 1) Admin @else User @endif</td>
    
    <form action="{{route('user.submit') }}" method="POST" enctype="multipart/form-data" class="form">
                                    {!! csrf_field() !!}
    <input type="hidden" name="user_id" value="{{ $user->id }}">
      
        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <button value="User" name="User" tpye="submit" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">User</button>
                                  </a> 
                                  
                                  
                                    </td>
       <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <button value="Agent" name="Agent" tpye="submit" class="px-5 py-2 border-yellow-500 border text-yellow-500 rounded transition duration-300 hover:bg-yellow-700 hover:text-white focus:outline-none">Agent</button>
                                  </a> 
                                  
                                  
                                    </td>
           
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-100 text-sm leading-5">
                
               <a href="#">
                                        <button value="Admin" name="Admin" tpye="submit" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Admin</button>
                                  </a> 
                                  
                                  
                                    </td>
           
          
   
    </form>    
    </tr>

    @endforeach
    
  </tbody>
</table>   

 
 

 
 
 
    
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
        </div>
      </div>
    </div>

</center>


    </div>
            
            
            
            
            
            
            
            
            
            
            
         
 
            </div>
</x-app-layout>