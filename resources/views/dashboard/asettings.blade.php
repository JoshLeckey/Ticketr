<x-app-layout>
    <x-slot name="header">
      
      
       <div class="flex flex-row">
       <a href="/dashboard/admin">
        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Overview
        </button>
        </a>
        <a href="/dashboard/admin/settings"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
            Settings
        </button>
        </a>
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
        <a href="/dashboard/admin/users"><button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">
            Users
        </button>
        </a>
    </div>
       
         
        
    </x-slot>
    
    
    
    
    
    
    
           
    
    <div class="flex items-center bg-white">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-2 bg-white p-5 rounded-md shadow-sm">
      
            <div class="m-7">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.set.options') }}">

                    {!! csrf_field() !!}
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm text-gray-600">Site Name</label>
                        <input type="text" name="name" id="name" placeholder="{{config('app.name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-100 focus:border-blue-300" />
                    </div>
                    <div class="mb-6">
                        <label for="logo" class="block mb-2 text-sm text-gray-600">Site Logo</label>
                        <input type="file" accept=".png" name="logo" id="logo" class="" />
                    </div>
                    <div class="mb-6">
                        <label for="favicon" class="block mb-2 text-sm text-gray-600">Site Favicon</label>
                        <input type="file" accept=".ico" name="favicon" id="favicon" class="" />
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-blue-500 rounded-md focus:bg-blue-600 focus:outline-none">Save</button>
                    </div>
                    
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
                </form>
            </div>
        </div>
    </div>
    
 
</div>
    
   
   
   
   
   
   
   
     <div class="grid grid-cols-3 gap-1">
   
    <div>
    
        <div class="flex items-center bg-white">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Add Category</h1>
            </div>
            <div class="m-7">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.set.options') }}">
                    {!! csrf_field() !!}
                    <div class="mb-6">
                        <label for="categoryadd" class="block mb-2 text-sm text-gray-600">Category Name</label>
                        <input type="text" name="categoryadd" id="categoryadd" placeholder="Add Category" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-100 focus:border-blue-300" />
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-blue-500 rounded-md focus:bg-blue-600 focus:outline-none">Add Category</button>
                    </div>
                    
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
                </form>
            </div>
        </div>
    </div>
    
 
</div>
    
</div>    
    
      <div>
    
        <div class="flex items-center bg-white">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Remove Category</h1>
            </div>
            <div class="m-7">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.set.options') }}">
                    {!! csrf_field() !!}
                    <div class="mb-6">
                        <label for="categoryremove" class="block mb-2 text-sm text-gray-600">Category Name</label>
                        <input type="text" name="categoryremove" id="categoryremove" placeholder="Remove Category" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-100 focus:border-blue-300" />
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-blue-500 rounded-md focus:bg-blue-600 focus:outline-none">Remove Category</button>
                    </div>
                    
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
                </form>
            </div>
        </div>
    </div>
    
 
</div>
    
</div> 

     <div>
    
        <div class="flex items-center bg-white">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Category List</h1>
            </div>
            <div class="m-7">
               
               
       <center>         <table class="table-fixed text-center">
  <thead>
    <tr>
      <th class="px-8 py-3 border-b-2 border-gray-150 text-left text-sm leading-4 text-blue-500 tracking-wider">Category Name</th>
    </tr>
  </thead>
  <tbody> 
  
  
                  @foreach($categories as $category)
    <tr>
      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{$category->name}}</td>
     
                @endforeach
                       
        
    </tr>
  </tbody>
</table>  
  {{ $categories->render() }}
               </center>
               
               
               
               
               
            </div>
        </div>
    </div>
 
</div>
    
</div> 
    
    </div>
    

    
    
    
    
    
    
    </x-app-layout>