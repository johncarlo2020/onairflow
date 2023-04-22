<x-app-layout>
    <style>
        .post-btn {
            width: clamp(10rem, 20vw, 18rem);
            height: clamp(10rem, 20vw, 18rem);
            border-radius: 8px;
            color: #ffff;
            box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
            opacity: 0.8;
        }

        .post-btn:hover {
            opacity: 1;
        }

        .post-btn i {
            font-size: clamp(1rem, 10vw, 2rem);
            margin-bottom: .8rem;
        }

        .post-btn p {
            font-size: clamp(.8rem, 1.2vw, 1rem);
        }

        .post-btn i,
        .post-btn p {
            pointer-events: none;
        }

        .photo {
            background: linear-gradient(90deg, #1ea2f1 10%, #00aff0 50%, #1ea2f1 90%);
        }

        .video {
            background: linear-gradient(180deg, #ffa75c 10%, #ff0066 50%, #ffa75c 90%);
        }

        .text {
            background: linear-gradient(180deg, #1ea2f1 10%, #00a2ae 50%, #1ea2f1 90%);
        }

        h1 {
            font-size: clamp(1.1rem, 1.4vw, 2rem);
            font-weight: 700;
        }

        .post-text-area {
            border: 1px solid rgb(191, 191, 191);
            border-radius: 4px;
            font-size: 12px;
        }

        .action-btn {
            border-radius: 4px;
            color: white;
            min-height: 30px;
            font-size: 0.9em;
            padding: 5px 20px;
            box-shadow: 0 5px 10px rgba(50, 50, 50, 0.2);
            margin-bottom: 10px;
        }

        .submit-btn {
            background-image: linear-gradient(0deg, #1ea2f1, #00aff0);
        }

        .discard-btn {
            background: #ff0066;
        }

        .action-btn:hover {
            opacity: 0.8;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 3px 12px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f7f7f7;
            color: #555;
            font-size: 13px;
            font-weight: bold;
        }

        #file-upload {
            position: absolute;
            left: -9999px;
        }

        .main-upload label {
            padding: 3rem;
        }
        .select-from .input-group{
            display: inline-block;
            margin-right: 10px;
        }
        .select-from label{
            font-size: 12px;
        }
        .select-from input[type='radio']{
            width: 12px;
            height: 12px;
        }
        [type='checkbox']:focus, [type='radio']:focus {
            --tw-ring-offset-width: 0;
        }

        @media (max-width: 600px) {
            .action-btn {
                width: 100%;
            }
        }
    </style>
    <div class="container mx-auto mt-5">
        <div class="head-tex">
            <h1 class="text-gray-400 "><i class="fa-solid fa-fire-flame-curved"></i> <span id="headText">New Post</span>
            </h1>
        </div>
        <div class="post-option-container" id="postTypebuttons">
            <div class="flex justify-center w-full gap-3 mx-auto mt-5 post-type">
                <button class="post-btn photo" id="addPhoto">
                    <i class="fa-regular fa-image"></i>
                    <p>Create a Photo post</p>
                </button>
                <button class=" post-btn video" id="addVideo">
                    <i class="fa-solid fa-video"></i>
                    <p>Create a Video post</p>
                </button>
            </div>
            <div class="flex justify-center w-full gap-3 mx-auto mt-4 post-type">
                <button class="mx- post-btn text" id="addText">
                    <i class="fa-solid fa-font"></i>
                    <p>Create a Text post</p>
                </button>
            </div>
        </div>
        <div class="hidden p-3 mt-2 bg-white rounded Create-post-photo" id="forPost">
            <form action="">
                <textarea class="w-full post-text-area" name="" id="" cols="30" placeholder="Compose new post"
                    rows="2"></textarea>
                    <div class="mt-3 text-gray-400 select-from">
                        <div class="input-group">
                          <input type="radio" id="only_for_subscriber" name="visibility" value="only_for_subscriber">
                          <label for="only_for_subscriber">Only for Subscribers</label>
                        </div>
                        <div class="input-group">
                          <input type="radio" id="pay_per_view" name="visibility" value="pay_per_view">
                          <label for="pay_per_view">Pay per View</label>
                        </div>
                        <div class="input-group">
                          <input type="radio" id="free_for_everyone" name="visibility" value="free_for_everyone">
                          <label for="free_for_everyone">Free for Everyone</label>
                        </div>
                      </div>
                <div class="hidden px-1 mt-3 text-sm input-group" id="formPrice">
                    <label class="block mb-1 text-sm text-red" for="price">Price*</label>
                    <input class="w-20 h-8 border-gray-300 rounded" type="number">
                </div>
                <div class="flex gap-3 p-1 mt-3 file-upload main-upload">
                    <div class="add-photo" id="formAddPhotos">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-solid fa-plus"></i> Add photos
                        </label>
                        <input id="file-upload" type="file" />
                    </div>
                    <div class="add-video" id="formAddVideo">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-regular fa-file-video"></i> Add Video
                        </label>
                        <input id="file-upload" type="file" />
                    </div>
                </div>
                <div class="flex gap-3 p-1 mt-3 file-upload">
                    <div class="add-thumbnail" id="fromAddthumbnail">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-solid fa-camera-retro"></i> Add thumnail
                        </label>
                        <input id="file-upload" type="file" />
                    </div>
                    <div class="add-video" id="formAddTeaser">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-regular fa-file-video"></i> Add teaser
                        </label>
                        <input id="file-upload" type="file" />
                    </div>
                </div>
                <div class="mt-20">
                    <button class="submit-btn action-btn" type="submit">Submit</button>
                    <button class="discard-btn action-btn" id="closeForm">Discard</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const addPhoto = document.querySelector('#addPhoto');
        const addVideo = document.querySelector('#addVideo');
        const addText = document.querySelector('#addText');
        const forPost = document.querySelector('#forPost');
        const closeForm = document.querySelector('#closeForm');
        const postTypebuttons = document.querySelector('#postTypebuttons');
        const formAddPhotos = document.querySelector('#formAddPhotos');
        const formAddVideo = document.querySelector('#formAddVideo');
        const formAddTeaser = document.querySelector('#formAddTeaser');
        const formPrice  = document.querySelector('#formPrice');
        const fromAddthumbnail = document.querySelector('#fromAddthumbnail');
        const headText = document.querySelector('#headText');
        const radioButtons = document.querySelectorAll('input[type="radio"]');

        addPhoto.addEventListener('click', handleAddClick);
        addVideo.addEventListener('click', handleAddClick);
        addText.addEventListener('click', handleAddClick);


        function handleAddClick(event) {
            const clickedId = event.target.id;

            if (clickedId == 'addPhoto') {
                formAddVideo.classList.add('hidden');
                formAddTeaser.classList.add('hidden');
                headText.innerHTML = 'New Photo Post';
            
            } else if (clickedId == 'addVideo') {
                formAddPhotos.classList.add('hidden');
                headText.innerHTML = 'New Video Post';
             
            } else if(clickedId == 'addText'){
                formAddVideo.classList.add('hidden');
                formAddPhotos.classList.add('hidden');
                formAddTeaser.classList.add('hidden');
                fromAddthumbnail.classList.add('hidden');
                headText.innerHTML = 'New Text Post';
            }else{
                headText.innerHTML = 'New Post';
            }

            forPost.classList.remove('hidden');
            postTypebuttons.classList.add('hidden');

        }

        closeForm.addEventListener('click', function () {
            postTypebuttons.classList.remove('hidden');
            forPost.classList.add('hidden');
            event.preventDefault();
            ressetForm();
        });

        function ressetForm() {
            formAddVideo.classList.remove('hidden');
            formAddTeaser.classList.remove('hidden');
            formAddPhotos.classList.remove('hidden');
            fromAddthumbnail.classList.remove('hidden');
            formPrice.classList.add('hidden');
        }

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', () => {
                if (radioButton.checked) {
                    if(radioButton.value == 'pay_per_view'){
                        formPrice.classList.remove('hidden');
                    }
                    else{
                        formPrice.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</x-app-layout>