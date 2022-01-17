<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
        
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

<style>
    
       #emojipicker:hover{
                  
                  cursor: pointer;
                  
              }  
   
   
   

 
    
</style>










    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 25px 25px 25px 25px !important">
                
                
                
           <center>     <h1 style="font-size: 35px !important; margin-bottom: 15px;">Create a ticket</h1> </center>
                
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('tick.post.create') }}">
                                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title:</label>
                    <input type="text" name="title" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required>
                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                    <br>
                  
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                       <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">Category:</label>
                    <select name="category" class="rounded-md border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option disabled>Select Category</option>                      
                        @foreach ($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
  </select>
                             @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                    <br>
                    <div class="hidden form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="priority">Priority:</label>
                    <select name="priority" class="rounded-md border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
    <option>Low</option>
    <option>Medium</option>
    <option>High</option>
  </select>
   @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
  
                    
                    <br>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="message">Message:</label>

                        <textarea rows="5" name="message" id="message" placeholder="Your Message" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required></textarea>
 
                                    <span class="help-block">
                                        <strong></strong>
                                    </span>
                            </div>
                            <br>
                            
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">Attach Image:</label>

 <div class="fileUpload blue-btn btn width100">
                            <span>Upload Image</span>
                            
                            <input type="file" id="image" name="image">
                          
                          </div>

                            <br><br>
                            
                    
                    <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg" type="submit">Submit Ticket</button>
                    <a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-400 hover:bg-blue-380 hover:shadow-lg" id="emojipicker">
       
    
       
       <i class="far fa-smile-wink"></i>
   </a>
                </form>
                
                
            </div>
        </div>
    </div>
    
    <script src="/public/js/fgEmojiPicker.js"></script>




     <script>
     
     new FgEmojiPicker({
    trigger: ['#emojipicker'],
    position: ['top', 'right'],
    preFetch: true,
    emit(obj, triggerElement) {
      const emoji = obj.emoji;
      document.querySelector('textarea').value += emoji;
    }
});




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
  
  



    
</x-app-layout>