<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-white sm:items-center py-4 sm:pt-0">
          
          
          
          
          <div class="p-20 h-screen w-screen flex flex-col md:flex-row items-center justify-center bg-white-200">
  <div class="content text-3xl text-center md:text-left">
  <center><img src="/public/images/logo.png" style="height: 50px !important">
    <p>Get help through our ticket system.</p></center>
  </div>
  <div class="container mx-auto flex flex-col items-center">
       <a href="/login/">
    <div class="w-80 p-2 flex flex-col rounded-lg">
     <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg my-2">Login</button> 
    
    </div>
    </a>
     <a href="/register/">
    <div class="w-80 p-2 flex flex-col rounded-lg">
     <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Register Support Account</button>
    </div>
    </a>
    
  </div>
</div>
          
          
          
          
          
        </div>
    </body>
</html>
