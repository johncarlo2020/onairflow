
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
                  @if (empty($post->user->image))
                        <img class="w-10 h-10 rounded-full shadow-lg img"
                     src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                    @else
                        <img class="w-10 h-10 rounded-full shadow-lg img" src="{{ asset('images/' . $post->user->image) }}" alt="Profile Image">
                    @endif
               
                  <span class="absolute w-2 h-2 bg-yellow-300 rounded-full -right-0 ol-indicator bottom-2"></span>
               </div>
               <div class="ml-2 info">
                  <p class="m-0 font-bold leading-none name">
                     {{ $post->user->name }} <span class="text-cyan-400"><i class="text-sm fa-solid fa-certificate"></i></span><a
                        class="text-sm text-cyan-400" href="#"> <i class="text-sm fa-regular fa-pen-to-square"></i></a> <span class="text-sm text-gray-500 ">{{ $post->created_at->diffForHumans() }}</span>
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
               <textarea class="w-full comment_content_{{$post->id}} text-sm placeholder:text-sm placeholder:text-gray-400 border-none rounded shadow-sm" name="" id="textInput{{$post->id}}" cols="30"
                  rows="2" placeholder="Add a comment here"></textarea>
               <button class="p-4 text-sm text-white rounded shadow-lg w-18 comment_send h-15 bg-cyan-600" data-id="{{$post->id}}">
                  <i class="fa-solid fa-paper-plane"></i>
               </button>
         </div>
         <!-- comment list block -->
         <div class="parent-container" id="commentContainer{{$post->id}}">
            @foreach($post->comment as $key => $comment)
            <div class="p-3 mb-3 bg-white rounded shadow-sm comment-list" id="postContainer{{$post->id}}">
            <div class="mb-2 comment-item">
               <div class="relative flex items-start">
                  <div class="relative rounded-full border-1 border-cyan-400">
                   
                        @if (empty($comment->user->image))
                        <img class="w-10 h-10 rounded-full shadow-lg img"
                     src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="">
                    @else
                        <img class="w-10 h-10 rounded-full shadow-lg img" src="{{ asset('images/' . $comment->user->image) }}" alt="Profile Image">
                    @endif
                  </div>
                  <div class="w-full pb-2 mt-2 ml-4 info">
                     <p class="m-0 font-bold leading-none name">
                        {{$comment->user->name}}  <small class="font-thin text-gray-400 time-comment">{{ $comment->created_at->diffForHumans() }}</small>
                     </p>
                     <p class="mt-2 text-sm font-thin text-black comment-text">
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
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
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
         </div>
      
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