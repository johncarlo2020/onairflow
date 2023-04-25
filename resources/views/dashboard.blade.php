<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mx-auto ">
        <swiper-container navigation="true" autoplay-delay="2500">
            <swiper-slide ><img class="w-full" src="https://api.fanso.club/iqakg-01.png" alt=""></swiper-slide>
            <swiper-slide><img class="w-full" src="https://api.fanso.club/v4yi2-02.png" alt=""></swiper-slide>
            <swiper-slide><img class="w-full" src="https://api.fanso.club/fveza-03.png" alt=""></swiper-slide>
        </swiper-container>
    </div>
    <div class="container mt-4">
        <div class="container flex items-center justify-between p-0 border-b-2 ">
            <h2 class="text-gray-500 ">HOME</h2>
            <div class="search">
                <div class="input-group">
                    <i class="text-gray-500 fa-solid fa-magnifying-glass"></i>
                    <input  class="text-sm bg-transparent border-0 focus:outline-none" placeholder="Type to search here ..." type="text">
                </div>
            </div>
        </div>
    </div>
   
    <livewire:posts :posts="$posts" />
    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-6 text-3xl font-bold">Create Post</h1>

            @if (session('success'))
            <div class="px-4 py-2 mb-4 text-sm font-semibold text-white bg-green-500 rounded">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
                class="max-w-md px-6 py-4 mx-auto bg-white rounded-md shadow dark:bg-gray-800">
                @csrf
                <textarea
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    name="content" id="content" placeholder="What's on your mind?"></textarea>


                <div class="mt-4">
                    <label for="media" class="block text-sm font-medium text-gray-700">Attach media</label>
                    <input id="media" name="media[]" type="file" accept="image/*,video/*"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        multiple>
                </div>

                <!-- Add any other input fields you need, such as location or tags -->
                <div class="mt-4">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Post
                    </button>
                </div>
                <!-- Add a divider line -->
                <hr class="my-4 border-t border-gray-300">
            </form>

        </div>
    </div>

    <div class="max-w-3xl mx-auto space-y-6 sm:px-6 lg:px-8">
        @foreach ($posts as $post)
        <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
            <!-- Post content -->
            <div class="flex items-start">
                <img src="https://picsum.photos/48" alt="Profile Image" class="w-12 h-12 mr-4 rounded-full">
                <div class="flex-grow">
                    <h2 class="font-semibold">{{ $post->user->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex items-start">
                <p class="mt-2">{{ $post->content }}</p>
            </div>
            @if ($post->media != null && count($post->media) > 0)
            <div class="flex items-center mt-4">
                @foreach ($post->media as $media)
                <img src="{{ asset($media) }}" class="w-32 h-32 mr-4">
                @endforeach
            </div>
            @endif

            <div class="items-center mt-4">
                <div class="flex items-center mt-4">
                    @if ($post->likes_count > 0)
                    <button
                        class=" text-{{ $post->has_liked ? 'blue' : 'white' }}-500 font-semibold focus:outline-none like-button-{{ $post->id }}"
                        data-post-id="{{ $post->id }}">
                        <i class="fas fa-thumbs-up"></i>
                        <span class="" id="likes-count-{{ $post->id }}">
                            {{ $post->likes_count }}
                        </span>
                    </button>
                    @endif

                    <div class="flex-grow"></div>
                    @if ($post->comments_count > 0)
                    <!-- Add a flex-grow element to push the comment button to the right -->
                    <button class="ml-4 " data-post-id="{{ $post->id }}">
                        {{ $post->comments_count }} comment
                    </button>
                    @endif
                </div>
            </div>
            <hr class="my-3 border-t border-gray-300">
            <div class="flex justify-center">
                <button
                    class="like-button ml-5 mr-5 text-{{ $post->has_liked ? 'blue' : 'white' }}-500 font-semibold focus:outline-none like-button-{{ $post->id }} mr-4"
                    data-post-id="{{ $post->id }}">
                    <i class="fas fa-thumbs-up"></i> Like
                </button>
                <button class="ml-5 mr-5 comment-button" data-post-id="{{ $post->id }}">
                    <i class="text-gray-500 fas fa-comments"></i> Comment
                </button>
                <button class="ml-5 mr-5" data-post-id="{{ $post->id }}">
                    <i class="fas fa-hand-holding-usd"></i> Tip
                </button>
            </div>
            <hr class="my-3 border-t border-gray-300">



            <div class="mt-4 comments-container" id="comments-container-{{ $post->id }}"></div>

        </div>
        @endforeach
    </div> --}}



    @section('scripts')
    @parent
    <script>
        // Like button click event handler


        $(document).on('click', '.like-button', function () {
            var postId = $(this).data('post-id');
            console.log('{{url('/like/') }}/'+postId);
            $.ajax({
                url: '{{ url('/like/') }}/'+postId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    postId: postId
                }
            }).done(function (data) {
                if (data == 'like') {
                    $('.like-button-' + postId).removeClass('text-gray-500');
                    $('.like-button-' + postId).addClass('text-blue-500');

                } else {
                    $('.like-button-' + postId).addClass('text-gray-500');
                    $('.like-button-' + postId).removeClass('text-blue-500');
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown);
            });
        });

        var likes = pusher.subscribe('post-likes');

        // Bind event handler for "PostLiked" event
        likes.bind('App\\Events\\PostLiked', function (data) {
            // Update the likes count for the corresponding post
            var postId = data.postId;
            var likesCount = data.likesCount;

            $('#likes-count-' + postId).text(likesCount);
        });

        var dislikes = pusher.subscribe('post-dislikes');

        // Bind event handler for "PostLiked" event
        dislikes.bind('App\\Events\\PostDisliked', function (data) {
            // Update the likes count for the corresponding post
            var postId = data.postId;
            var likesCount = data.likesCount;

            $('#likes-count-' + postId).text(likesCount);
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