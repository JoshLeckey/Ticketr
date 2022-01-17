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
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                            <center>   
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                            
    <div class="relative px-255 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-15">
        
      <div class="max-w-m mx-auto">
        <div class="">
 
 
 
 
 <a href="{{url('/dashboard/admin/users/')}}">                   <button type="button" class="focus:outline-none text-blue-600 text-sm py-2.5 px-5 rounded-md hover:bg-blue-100">

    Show All</button>
</a>
 
 
<br><br>

 
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