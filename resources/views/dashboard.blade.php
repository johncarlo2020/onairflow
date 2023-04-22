<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Create Post</h1>

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
    </div>



    @section('scripts')
        @parent
        <script>
            // Like button click event handler


            $(document).on('click', '.like-button', function() {
                var postId = $(this).data('post-id');

                $.ajax({
                    url: '{{ url('/like/') }}/' + postId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        postId: postId
                    }
                }).done(function(data) {
                    if (data == 'like') {
                        $('.like-button-' + postId).removeClass('text-gray-500');
                        $('.like-button-' + postId).addClass('text-blue-500');

                    } else {
                        $('.like-button-' + postId).addClass('text-gray-500');
                        $('.like-button-' + postId).removeClass('text-blue-500');
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

            $('.comment-button').on('click', function() {
                var postId = $(this).data('post-id');
                var commentsContainer = $('#comments-container-' + postId);

                // Use Ajax to fetch comments for the specific post
                $.ajax({
                    url: '{{ url('/posts') }}/' + postId +
                    '/comments', // Replace with your actual endpoint URL
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        commentsContainer.append(
                            '<input type="text" class="mt-4 comment-input" placeholder="Add a comment..." /><button class="px-4 py-2 mt-2 font-semibold text-white bg-blue-500 rounded submit-comment-button">Submit</button>'
                            );

                        // Update the comments container with the fetched comments
                        $.each(data, function(index, comment) {
                            var commentHTML = `
                                <div class="flex items-start">
                                    <img src="https://picsum.photos/48" alt="Profile Image" class="w-6 h-6 mr-4 rounded-full">
                                    <div class="flex-grow">
                                        <h2 class="font-semibold">${comment.user.name}</h2>
                                        <p class="text-sm text-gray-500">${comment.created_at}</p>
                                        <p class="mt-2">${comment.content}</p>
                                    </div>
                                </div>
                            `;
                            // Append the comment HTML to the comments container
                            commentsContainer.append(commentHTML);
                        });
                        // Append input text field and submit comment button

                        // Submit comment button click event handler
                        $('.submit-comment-button').on('click', function() {
                            var commentInput = $(this).siblings('.comment-input');
                            var commentContent = commentInput.val();

                            // Use Ajax to submit comment
                            $.ajax({
                                url: '/posts/' + postId +
                                '/comments', // Replace with your actual endpoint URL
                                type: 'POST',
                                data: {
                                    content: commentContent
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // Update the comments container with the new comment
                                    commentsContainer.append(
                                        '<div class="comment"><p class="text-gray-600">' +
                                        response.content + '</p></div>');
                                    commentInput.val('');
                                },
                                error: function(xhr, status, error) {
                                    // Handle error if necessary
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error if necessary
                        console.error(xhr.responseText);
                    }
                });
            });
        </script>
    @endsection

</x-app-layout>
