<style>
    #hideDetails i {
        font-size: 12px;
        transition: transform 0.3s ease-out;
    }

    #hideDetails.open i {
        transform: rotate(-90deg);
    }

    .accordion-content {
        max-height: 400px;
        opacity: 1;
        overflow: hidden;
        transition: max-height 0.5s, opacity 0.1s ease-out;
    }

    .accordion-content.open {
        max-height: 0;
        opacity: 0;
        transition: max-height 0.5s, opacity 0.1s ease-in;
    }

    .tabs {
        display: grid;
        grid-template-columns: repeat(3, 1fr);

    }

    .tab {
        border-bottom: 1px solid #dfd2d2;
        cursor: pointer;
        font-size: 1.1rem;
        padding: 10px;
        color: #979797;
    }

    .tab i {
        margin-right: 0.5rem;
    }

    .tab.active {
        border: 1px solid #dfd2d2;
        border-bottom: none;
        color: #00AFF0;
    }

    .tab-content {
        display: none;
        margin-top: 1rem;
    }

    .tab-content.active {
        display: block;
    }

    .user-profile p {
        color: #423d3d;
        font-size: 13px;
    }

    .user-profile ul li {
        margin-bottom: 10px;
        color: #423d3d;
        font-size: 13px;
    }
</style>
<x-app-layout>
    <div class="container mx-auto">
        <div class="relative main-head ">
            <div class="absolute top-0 left-0 w-full h-full gradient z-1"
                style="background: linear-gradient(180deg, rgba(66, 66, 66, 0.3) 50%, rgba(255, 255, 255, 0.5) 100%);">
            </div>
            <div class="background-img">
                <img src="https://api.fanso.club/covers/sgshs-1475689989.jpg" alt="">
            </div>
            <div class="absolute left-0 -bottom-14 bottom-data z-1">
                <div class="flex items-end">
                    <div class="p-1 border-2 rounded-full border-cyan-400">
                        <img class="w-24 h-24 rounded-full shadow-lg img"
                            src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg"
                            alt="">
                    </div>
                    <div class="pb-2 ml-4 info">
                        <p class="m-0 font-bold leading-none name">
                            {{$user->name}} <span class="text-cyan-400"><i class="fa-solid fa-certificate"></i></span> <a
                                class="text-cyan-400" href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                        </p>
                        <p class="font-semibold leading-none text-cyan-400">
                            @anlleleacheri
                        </p>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 flex gap-2 social-icons -bottom-11">
                <span
                    class="flex items-center justify-center border-2 rounded-full text-1xl w-9 h-9 icon border-cyan-200 text-cyan-400 "><i
                        class="fa-regular fa-heart"></i></span>
                <span
                    class="flex items-center justify-center border-2 rounded-full text-1xl w-9 h-9 icon border-cyan-200 text-cyan-400 "><i
                        class="fa-solid fa-dollar-sign"></i></span>
                <span
                    class="flex items-center justify-center border-2 rounded-full text-1xl w-9 h-9 icon border-cyan-200 text-cyan-400 "><i
                        class="fa-regular fa-comment-dots"></i></span>
                <span
                    class="flex items-center justify-center border-2 rounded-full text-1xl w-9 h-9 icon border-cyan-200 text-cyan-400 "><i
                        class="fa-regular fa-bookmark"></i></span>
                <span
                    class="flex items-center justify-center border-2 rounded-full text-1xl w-9 h-9 icon border-cyan-200 text-cyan-400 "><i
                        class="fa-solid fa-arrow-right-from-bracket"></i></span>
            </div>

        </div>
    </div>
    <div class="container mx-auto mt-20">
        <div class="button-container">
            <button class="text-base" id="hideDetails">
                <i class="fa-solid fa-chevron-down"></i><span class="w-4 h-4 bg-indigo-500 rounded-full "></span><small>
                    United States of America</small>
            </button>
            <div class="text-base user-profile accordion-content " id="profileInfo">
                <p class="mt-3 text-sm">
                    #BePositive! #CEO Owner of @Cheri_Fit Activewear Backup Account @MoreAnaCheri Twitter: anacherimore
                    PR: Talent.anacheri@gmail.com 👇🏼Let’s Connect
                </p>
                <div class="grid grid-cols-3 mt-3 text-sm ">
                    <div>
                        <ul>
                            <li>Gender: Female</li>
                            <li>Body Type: slim</li>
                            <li>Height: 4'6" (137.16 Cm)</li>
                            <li>Ethnicity: Asian</li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li>Gender: Female</li>
                            <li>Body Type: slim</li>
                            <li>Height: 4'6" (137.16 Cm)</li>
                            <li>Ethnicity: Asian</li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li>Gender: Female</li>
                            <li>Body Type: slim</li>
                            <li>Height: 4'6" (137.16 Cm)</li>
                            <li>Ethnicity: Asian</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container mx-auto mt-10">
        <div class=" tabs">
            <button class="py-2 tab active" data-tab="tab1"><i class="fa-solid fa-fire"></i></button>
            <button class="py-2 tab" data-tab="tab2"><i class="fa-solid fa-video"></i></button>
            <button class="py-2 tab" data-tab="tab3"><i class="fa-regular fa-image"></i></button>
        </div>

        <div class="tab-content active" data-tab="tab1">
            <h4>8 POSTS</h4>
            <livewire:posts :posts="$posts"  /> 
        </div>

        <div class="tab-content" data-tab="tab2">
             <h4>8 VIDEOS</h4>
            <livewire:video-gallery /> 
        </div>

        <div class="tab-content" data-tab="tab3">
              <h4>8 PHOTOS</h4>
            <livewire:video-gallery /> 
        </div>
    </div>


@section('scripts')
    @parent
        <script>
                const myButton = document.querySelector('#hideDetails');
                const myDiv = document.querySelector('#profileInfo');

                myButton.addEventListener('click', () => {
                    myDiv.classList.toggle('open');
                    myButton.classList.toggle('open')
                });

                const tabs = document.querySelectorAll('.tab');
                const tabContents = document.querySelectorAll('.tab-content');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const tabId = tab.getAttribute('data-tab');

                        tabs.forEach(tab => {
                            tab.classList.remove('active');
                        });

                        tab.classList.add('active');

                        tabContents.forEach(content => {
                            if (content.getAttribute('data-tab') === tabId) {
                                content.classList.add('active');
                            } else {
                                content.classList.remove('active');
                            }
                        });
                    });
                });

                // Like button click event handler
                        $(document).on('click', '.like-button', function(){
                            var postId = $(this).data('post-id');
                            console.log('asdasdas');
                            $.ajax({
                                url: '{{ url('/like/') }}/'+postId,
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    postId: postId
                                }
                            }).done(function(data) {
                                if(data == 'like'){
                                    $('.like-button-'+postId).removeClass('text-gray-500');
                                    $('.like-button-'+postId).addClass('text-blue-500');

                                }else{
                                $('.like-button-'+postId).addClass('text-gray-500');
                                    $('.like-button-'+postId).removeClass('text-blue-500');
                                }
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                console.log('Error: ' + textStatus + ' - ' + errorThrown);
                            });
                        });

                        var likes = pusher.subscribe('post-likes');

                        // Bind event handler for "PostLiked" event
                        likes.bind('App\\Events\\PostLiked', function(data) {
                            // Update the likes count for the corresponding post
                            var postId = data.postId;
                            var likesCount = data.likesCount;

                            $('#likes-count-' + postId).text(likesCount);
                        });

                        var dislikes = pusher.subscribe('post-dislikes');

                        // Bind event handler for "PostLiked" event
                        dislikes.bind('App\\Events\\PostDisliked', function(data) {
                            // Update the likes count for the corresponding post
                            var postId = data.postId;
                            var likesCount = data.likesCount;
                            
                            $('#likes-count-' + postId).text(likesCount);
                        });

                        var comment_count = pusher.subscribe('comment-count');

                        // Bind event handler for "PostLiked" event
                        comment_count.bind('App\\Events\\CommentEvent', function(data) {
                            // Update the likes count for the corresponding post
                            var postId = data.postId;
                            var commentsCount = data.new_comment_count;
                            $('#comments-count-' + postId).text(commentsCount);
                            $('.comment-button-'+postId).removeClass('text-slate-500');
                            $('.comment-button-'+postId).addClass('text-blue-500');

                            
                        });

                        $(document).on('click', '.comment_send', function() {
                            var post_id = $(this).data('id');
                            var comment_content = $('.comment_content_' + post_id).val();

                            $.ajax({
                                type: 'POST',
                                url: '{{ url('/posts') }}/' + post_id + '/comments',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    content: comment_content
                                },
                                success: function(response) {
                                    //append mo dito ung new comment naka json response ung data ng comment
                                },
                                error: function(xhr) {
                                    // Handle error
                                }
                            });
                        });
            </script>
        @endsection
</x-app-layout>
