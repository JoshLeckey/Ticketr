<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket #{{$ticket->ticket_id}}
        </h2>
        <style>
            
          .creationdate{
              
              font-size: 13px;
              opacity: 0.5;
              
           
              
          }  
   #emojipicker:hover{
                  
                  cursor: pointer;
                  
              }            
            
        </style>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    </x-slot>
   @if(Auth::user()->is_admin == 1 or Auth::user()->is_admin == 2){
   @else
    @if(Auth::user()->id == $ticket->user_id)
    @else
         <script>window.location = "/dashboard";</script>
    @endif
    @endif
    
   
   
   
   
   
   <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
   <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
      <div class="flex items-center space-x-4">
                <canvas id="user-icon" width="55" height="55" style="border-radius: 99999px"></canvas>

         <div class="flex flex-col leading-tight">
             
            <div class="text-2xl mt-1 flex items-center">
               <span class="text-gray-700 mr-3">{{ $ticket->title}}</span>
               @if($ticket->status ==='Open')
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
           @else
           <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
               Closed
               </span>
            @endif
            </div>
            
            <span class="text-lg text-gray-600">Created {{ $ticket->created_at->diffForHumans() }}, by {{$ticket->user->name}}</span>
            
         </div>
          @if (Auth::user()->is_admin == 2 or Auth::user()->is_admin == 1)
         <button type="button" id="ticketlookup" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
</svg>
         </button>
         @endif
      </div>
      
      
   </div>

   <div id="messages" class="flex flex-col space-y-2 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
 
 
 
 
 
   <div class="chat-message">
         <div class="flex items-end justify-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
               <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                   
                   
              @if (file_exists (public_path ('/images/' .$ticket->ticket_id.'.jpg')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id.'.jpg'}}" alt="">
            @elseif (file_exists (public_path ('/images/' .$ticket->ticket_id.'.png')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id.'.png'}}" alt="">
            @endif
            {{$ticket->message}}
                   
                   
                   
               </span></div>
            </div>
         </div>
      </div>
 
 
 
 
   @foreach($comments as $comment) 
 @if($ticket->user_id === Auth::user()->id or $comment->user_id === $ticket->user_id)
      <div class="chat-message">
         <div class="flex items-end justify-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
               <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                   
                   
                    @if (file_exists (public_path ('/images/' .$ticket->ticket_id. $comment->id.'.jpg')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id. $comment->id .'.jpg'}}" alt="">
            @elseif (file_exists (public_path ('/images/' .$ticket->ticket_id. $comment->id.'.png')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id. $comment->id .'.png'}}" alt="">
            @endif
            {{$comment->comment}}
                   
                   
                   
               </span></div>
            </div>
         </div>
      </div>
      
      @else
      
      
      <div class="chat-message">
         <div class="flex items-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
               <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">
                   
                   
                   
                   
                   
                       @if (file_exists (public_path ('/images/' .$ticket->ticket_id. $comment->id.'.jpg')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id. $comment->id .'.jpg'}}" alt="">
            @elseif (file_exists (public_path ('/images/' .$ticket->ticket_id. $comment->id.'.png')))
	            <img src="{{URL::to('public/images').'/'.$ticket->ticket_id. $comment->id .'.png'}}" alt="">
            @endif
            {{$comment->comment}}
                   
                   
                   
                   
                   
               </span></div>
            </div>
         </div>
      </div>
      
      
      @endif
      
      
      @endforeach
      
      

      
      
   </div>
     <form action="{{ url('comment') }}" method="POST" enctype="multipart/form-data" class="form">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="url_id" value="{{ $ticket->ticket_id}}">
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
   <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
      <div class="relative flex">
           @if($ticket->status == 'Open')
                    
         <input type="text" id="commentinput" name="comment" placeholder="Write a message..." class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 bg-white rounded-full py-3">
         <div class="right-0 items-center inset-y-0 hidden sm:flex">
          
            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
               </svg>
            </button>
                            <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" style="width: 30px !important" name="image" type="file" name="vacancyImageFiles" @change="fileName" multiple>

           
            
            <button type="button" id="emojipicker" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
               </svg>
            </button>
            <button type="submit" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                  <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
               </svg>
            </button>
         </div>
         
         
          @if ($errors->has('comment'))
                <span class="help-block">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
            @else 
        <center>
        <span class="px-2 inline-flex text-m leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            You can not reply, the ticket is closed
                            </span></center>
 @endif
         
         
      </div>
   </div>
   </form>
</div>

<style>
.scrollbar-w-2::-webkit-scrollbar {
  width: 0.25rem;
  height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
  --bg-opacity: 1;
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
  --bg-opacity: 1;
  background-color: #edf2f7;
  background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
  border-radius: 0.25rem;
}
</style>

<script>
	const el = document.getElementById('messages')
	el.scrollTop = el.scrollHeight
</script>
   
   
   
   
        
   <script src="/public/js/fgEmojiPicker.js"></script>

     <script>
     
     new FgEmojiPicker({
    trigger: ['#emojipicker'],
    position: ['top', 'left'],
    preFetch: true,
    emit(obj, triggerElement) {
      const emoji = obj.emoji;
      document.querySelector('#commentinput').value += emoji;
    }
});

      
  </script>
    
      <script>
      
      $(document).ready(function($) {

  $("#image").change(function() {
    var filename = readURL(this);
    $(this).parent().children('span').html(filename);
  });

  function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0] && (
      ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "gif" || ext == "pdf"
      )) {
      var path = $(input).val();
      var filename = path.replace(/^.*\\/, "");
      return "Uploaded image: "+filename;
    } else {
      $(input).val("");
      return "Only images are allowed!";
    }
  }
});
      
  </script>
<script>
    
    var colours = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"];

var name = "{{$ticket->user->name}}",
    nameSplit = name.split(" "),
    initials = nameSplit[0].charAt(0).toUpperCase();

var charIndex = initials.charCodeAt(0) - 65,
    colourIndex = charIndex % 19;

var canvas = document.getElementById("user-icon");
var context = canvas.getContext("2d");

var canvasWidth = $(canvas).attr("width"),
    canvasHeight = $(canvas).attr("height"),
    canvasCssWidth = canvasWidth,
    canvasCssHeight = canvasHeight;

if (window.devicePixelRatio) {
    $(canvas).attr("width", canvasWidth * window.devicePixelRatio);
    $(canvas).attr("height", canvasHeight * window.devicePixelRatio);
    $(canvas).css("width", canvasCssWidth);
    $(canvas).css("height", canvasCssHeight);
    context.scale(window.devicePixelRatio, window.devicePixelRatio);
}

context.fillStyle = colours[colourIndex];
context.fillRect (0, 0, canvas.width, canvas.height);
context.font = "27px Arial";
context.textAlign = "center";
context.fillStyle = "#FFF";
context.fillText(initials, canvasCssWidth / 2, canvasCssHeight / 1.5);
    
</script>

<script>
    $( "#ticketlookup" ).click(function() {


Swal.fire({
  icon: 'info',
  title: 'Ticket Lookup',
  html: 'Author Username: <b> {{$ticket->user->name}} </b> <br> Author Email: <b> {{$ticket->user->email}} </b> <br> Ticket Title: <b> {{$ticket->title}} </b> <br> Ticket ID: <b> #{{$ticket->ticket_id}} </b> <br> Ticket Status: <b> {{$ticket->status}} </b> <br> Ticket Creation Date: <b> {{$ticket->created_at}} </b>'
})



});
   
    
</script>
    
</x-app-layout>