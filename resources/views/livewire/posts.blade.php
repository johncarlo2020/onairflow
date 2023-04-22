<style>
   .overlay-blur::after{
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
<div class="container pt-4 mx-auto">
   @foreach($posts as $post)
   <div class="mt-5 mb-3 post">
      <div class="">
         <div class="flex items-end">
            <div class="relative rounded-full border-1 border-cyan-400">
               <img class="w-10 h-10 rounded-full shadow-lg img"
                  src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg" alt="">
               <span class="absolute w-2 h-2 bg-yellow-300 rounded-full -right-0 ol-indicator bottom-2"></span>
            </div>
            <div class="pb-2 ml-4 info">
               <p class="m-0 font-bold leading-none name">
                  {{ $post->user->name }} <span class="text-cyan-400"><i class="fa-solid fa-certificate"></i></span><a
                     class="text-cyan-400" href="#"><i class="fa-regular fa-pen-to-square"></i> </a>  {{ $post->created_at->diffForHumans() }}
                   

               </p>
               <p class="font-semibold leading-none text-cyan-400">
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
         <div class="relative content">
            <video class="mt-3" width="100%" height="400" controls>
               <source src="https://youtu.be/W88FUZcjJEw" type="video/mp4">
               Your browser does not support the video tag.
            </video>
            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full text-white overlay-blur overlay z-2">
               <i class="fa-solid fa-lock"></i>
            </div>
         </div>
         <div class="flex justify-between border-b-1 icons-option border-cyan-400">
            <div class="first">
               <div class="icon-with-num">
                  <button class="p-2 like-button  text-{{ $post->has_liked ? 'blue' : 'slate' }}-500 like-button-{{ $post->id }}" data-post-id="{{ $post->id }}">
                     <i class="fa-regular fa-heart"></i>
                     <span class="inline-block text-sm"><small id="likes-count-{{ $post->id }}">{{ $post->likes_count }}</small></span>
                  </button>
                  <button class="p-2 text-{{ $post->has_comment ? 'blue' : 'slate' }}-500">
                     <i class="fa-regular fa-comments"></i>
                     <span class="inline-block text-sm"><small id="comments-count-{{$post->id}}">{{ $post->comments_count }}</small></span>
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
         <div class="pt-2 border-t-2 comment-box flex items-center w-full gap-3">
               <textarea class="w-full comment_content_{{$post->id}} text-sm text-gray-300 border-none rounded shadow-sm" name="" id="" cols="30"
                  rows="2">Add a comment here</textarea>
               <button class="p-4 comment_send text-white rounded shadow-lg w-15 h-15 bg-cyan-600" data-id="{{$post->id}}">
                  <i class="fa-solid fa-paper-plane"></i>
               </button>
         </div>
         <!-- comment list block -->
         @foreach($post->comment as $key => $comment)
            <div class="p-3 mb-3 bg-white rounded shadow-sm comment-list">
            <div class="mb-2 comment-item">
               <div class="relative flex items-start">
                  <div class="relative rounded-full border-1 border-cyan-400">
                     <img class="w-10 h-10 rounded-full shadow-lg img"
                        src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg" alt="">
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
                                    src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg" alt="">
                              </div>
                              <div class="w-full pb-2 mt-1 ml-2 info">
                                 <p class="m-0 font-bold leading-none name">
                                    Anacheri  <small class="font-thin text-gray-400">a few seconds ago</small>
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
      <div class="p-3 text-sm text-center text-gray-400 bg-white rounded no-commnet">
         <p>Be the first to comment</p>
      </div>
   </div>
   @endforeach
</div>


<!-- 
todo 

add function for comment and reply 
hide reply function and animation 
like event for liked post , comment and reply 
hide post overlay -
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
