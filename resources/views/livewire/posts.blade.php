
<div class="container pt-4 mx-auto">
   <style>
      .overlay-blur::after {
         position: absolute;
         top: 0;
         left: 0;
         filter: blur(224px);
         z-index: 1;
         content: '';
         width: 100%;
         height: 100%;
         background-color: #ffffff;
      }
   </style>
   
   @foreach($curentPost as $post)
   <div class="pb-4 mt-5 post">
      <div class="">
         <div class="p-3 pt-4 bg-white rounded shadow-sm">
            <div class="flex items-end">
               <div class="relative rounded-full border-1 border-cyan-400">
                  <img class="w-10 h-10 rounded-full shadow-lg img"
                     src="data:image/jpeg;base64,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" alt="">
                  <span class="absolute w-2 h-2 bg-yellow-300 rounded-full -right-0 ol-indicator bottom-2"></span>
               </div>
               <div class="ml-2 info">
                  <p class="m-0 font-bold leading-none name">
                     {{ $post->user->name }} <span class="text-cyan-400"><i class="text-sm fa-solid fa-certificate"></i></span><a
                        class="text-sm text-cyan-400" href="#"> <i class="text-sm fa-regular fa-pen-to-square"></i></a> <span class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</span>
                  </p>
                  <p class="text-sm font-semibold leading-none text-cyan-400">
                     @anlleleacheri
                  </p>
               </div>
            </div>
            <p class="mt-2 text-sm text">
               {{ $post->content }}
            </p>
            <p  class="mt-2 text-sm text">
               {{-- #{{ implode(' #', $post->tags) }} --}}
            </p>
            <div class="relative w-full content">
            @if($post->video)
            <div class="relative w-full vidio-container h-fit ">
               <video class="mt-3" width="100%" height="100%" controls>
                  <source src="{{ asset('videos/' . $post->video) }}" type="video/mp4">
                  Your browser does not support the video tag.
               </video>
            </div>
            @endif
            @if($post->image)
            <div class="relative w-full h-72 img-container">
               <img  class="absolute top-0 left-0 object-contain w-full h-full z-1"  src="{{ asset('images/' . $post->image) }}" alt="Image">
            </div>
            @endif
               <div
                  class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full text-lg text-white bg-gray-950 opacity-60 overlay-blur overlay z-2">
                  <i class="text-lg fa-solid fa-lock"></i>
               </div>
            </div>
            <div class="flex justify-between border-b-1 icons-option border-cyan-400">
               <div class="first">
                  <div class="icon-with-num">
                     <button class="p-2 like-button  text-{{ $post->has_liked ? 'blue' : 'slate' }}-500 like-button-{{ $post->id }}" data-post-id="{{ $post->id }}">
                        <i class="fa-regular fa-heart"></i>
                        <span class="inline-block text-sm"><small id="likes-count-{{ $post->id }}">{{ $post->likes_count }}</small></span>
                     </button>
                     <button class="p-2 commentBtn comment-button-{{$post->id}} text-{{ $post->has_comment ? 'blue' : 'slate' }}-500" >
                        <i class="pointer-events-none fa-regular fa-comments"></i>
                        <span class="inline-block text-sm pointer-events-none"><small id="comments-count-{{$post->id}}">{{ $post->comments_count }}</small></span>
                     </button>
                     <button class="p-2 text-slate-800">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span class="inline-block text-sm"><small>Send tip</small></span>
                     </button>
                  </div>
               </div>
               <div class="second">
                  <button class="p-2 text-slate-800">
                     <i class="fa-regular fa-flag"></i>
                     <span class="inline-block text-sm"><small>0</small></span>
                  </button>
                  <button class="p-2 text-slate-800">
                     <i class="fa-regular fa-bookmark"></i>
                     <span class="inline-block text-sm"><small>0</small></span>
                  </button>
               </div>
            </div>
         </div>
     
         <div class="flex items-center w-full gap-3 pt-2 mb-3 border-t-2 comment-box">
               <textarea class="w-full comment_content_{{$post->id}} text-sm placeholder:text-sm placeholder:text-gray-400 border-none rounded shadow-sm" name="" id="" cols="30"
                  rows="2" placeholder="Add a comment here"></textarea>
               <button class="p-4 text-sm text-white rounded shadow-lg w-18 comment_send h-15 bg-cyan-600" data-id="{{$post->id}}">
                  <i class="fa-solid fa-paper-plane"></i>
               </button>
         </div>
         <!-- comment list block -->
         @foreach($post->comment as $key => $comment)
            <div class="p-3 mb-3 bg-white rounded shadow-sm comment-list" id="postContainer{{$post->id}}">
            <div class="mb-2 comment-item">
               <div class="relative flex items-start">
                  <div class="relative rounded-full border-1 border-cyan-400">
                     <img class="w-10 h-10 rounded-full shadow-lg img"
                        src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg"
                        alt="">
                  </div>
                  <div class="w-full pb-2 mt-2 ml-4 info">
                     <p class="m-0 font-bold leading-none name">
                        {{$comment->user->name}}  <small class="font-thin text-gray-400">{{ $comment->created_at->diffForHumans() }}</small>
                     </p>
                     <p class="mt-2 text-sm font-thin text-black">
                        {{$comment->content}}
                     </p>
                     <div class="mt-3 buttons">
                        <button class="text-sm text-gray-400">
                           <i class="fa-regular fa-heart"></i>
                        </button>
                        <button class="text-sm text-gray-400">
                           Reply
                        </button>
                     </div>
                     {{-- <button class="mt-2 text-sm hide-coments text-cyan-400">
                        <i class="fa-solid fa-caret-down"></i> <span>Hide</span> reply
                     </button> --}}
                     <!-- reply list block -->
                     {{-- <div class="reply-list">
                        <div class="mb-2 comment-item">
                           <div class="relative flex items-start">
                              <div class="relative rounded-full border-1 border-cyan-400">
                                 <img class="w-6 h-6 rounded-full shadow-lg img"
                                    src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg"
                                    alt="">
                              </div>
                              <div class="w-full pb-2 mt-1 ml-2 info">
                                 <p class="m-0 font-bold leading-none name">
                                    Anacheri <small class="font-thin text-gray-400">a few seconds ago</small>
                                 </p>
                                 <p class="mt-2 text-sm font-thin text-black">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, ipsa!
                                 </p>
                                 <div class="mt-3 buttons">
                                    <button class="text-sm text-gray-400">
                                       <i class="fa-regular fa-heart"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
                     </div> --}}
                     {{-- <div class="flex items-center gap-2">
                        <textarea class="w-full mt-1 text-sm text-gray-400 border-none rounded shadow-sm bg-cyan-50" name="" id="" cols="30"
                        rows="2">Add a comment here</textarea>
                        <button class="h-10 px-2 text-sm text-gray-400 bg-white border-2 border-gray-200 rounded shadow-sm">
                           Reply
                        </button>
                     </div> --}}
                  </div>
                  <button class="absolute top-0 right-2">
                     <i class="fa-solid fa-ellipsis"></i>
                  </button>
               </div>
            </div>
         </div>
         @endforeach
         
      </div>
      <!-- hide this if comment is empty -->
      @if($post->comments_count  == 0)
      <div class="p-3 text-sm text-center text-gray-400 bg-white rounded no-commnet">
         <p>Be the first to comment</p>
      </div>
      @endif
   </div>
   @endforeach
</div>

<!-- 
todo 
add function for comment and reply 
hide reply function and animation 
like event for liked post , comment and reply 
online indicator for online user per post
hide coments ?
send tip function
report fucntion
bookmark function
add tooltip package 
and toastr package
reply time
edit post

-->