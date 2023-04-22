<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Create Post</h1>

            @if(session('success'))
                <div class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow rounded-md px-6 py-4">
                @csrf
                <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" 
                name="content" id="content" placeholder="What's on your mind?"></textarea>

                
            <div class="mt-4">
                <label for="media" class="block text-sm font-medium text-gray-700">Attach media</label>
                <input id="media" name="media[]" type="file" accept="image/*,video/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" multiple>
            </div>
              
                <!-- Add any other input fields you need, such as location or tags -->
                <div class="mt-4">
                    <button type="submit" class="inline-flex justify-center w-full items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Post
                    </button>
                </div>
                <!-- Add a divider line -->
                <hr class="my-4 border-t border-gray-300">
            </form>

        </div>
    </div>
<livewire:posts :posts="$posts" /> 
  

    @section('scripts')
    @parent
    <script>

            // Like button click event handler


            $(document).on('click', '.like-button', function(){
                var postId = $(this).data('post-id');

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

             $('.comment-button').on('click', function() {
                var postId = $(this).data('post-id');
                var commentsContainer = $('#comments-container-' + postId);

                // Use Ajax to fetch comments for the specific post
                $.ajax({
                    url: '{{ url('/posts') }}/' + postId + '/comments', // Replace with your actual endpoint URL
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        commentsContainer.append('<input type="text" class="comment-input mt-4" placeholder="Add a comment..." /><button class="submit-comment-button bg-blue-500 text-white font-semibold px-4 py-2 rounded mt-2">Submit</button>');

                        // Update the comments container with the fetched comments
                          $.each(data, function(index, comment) {
                            var commentHTML = `
                                <div class="flex items-start">
                                    <img src="https://picsum.photos/48" alt="Profile Image" class="w-6 h-6 rounded-full mr-4">
                                    <div class="flex-grow">
                                        <h2 class="font-semibold">${comment.user.name}</h2>
                                        <p class="text-gray-500 text-sm">${comment.created_at}</p>
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
                                url: '/posts/' + postId + '/comments', // Replace with your actual endpoint URL
                                type: 'POST',
                                data: {
                                    content: commentContent
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // Update the comments container with the new comment
                                    commentsContainer.append('<div class="comment"><p class="text-gray-600">' + response.content + '</p></div>');
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
