<section>
   <header>
      <h2 class="text-lg font-medium text-gray-900 ">
          {{ __('Update Images') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600 ">
          {{ __('Ensure that the image best describe you.') }}
      </p>
  </header>
   <div class="relative w-full h-56 mt-5 rounded edit-Images">
      <img class="absolute top-0 left-0 object-cover object-center w-full h-full rounded " src="https://api.fanso.club/covers/sgshs-1475689989.jpg" alt="" id="previewBackdrop" >
      <button class="absolute px-2 py-1 text-sm text-white bg-red-500 rounded shadow-sm top-1 right-1" onclick="document.getElementById('fileUploadCover').click()"><i class="fa-solid fa-pen"></i> Edit cover</button>
      <div class="absolute button-container left-3 -bottom-5">
         <button class="relative w-20 h-20 border-4 rounded-full priofile-image border-cyan-200"  onclick="document.getElementById('fileUploadProfile').click()">
            <img class="absolute top-0 left-0 object-cover w-full h-full rounded-full" src="https://api.fanso.club/covers/sgshs-1475689989.jpg" alt="" id="previewProfile">
            <i class="absolute p-2 text-white rounded-full shadow-lg -right-2 bg-cyan-400 bottom-1 fa-solid fa-camera"></i>
         </button>
      </div>
   </div>
   <div class="flex gap-2 mt-11">
      <form id="">
         <input type="file" id="fileUploadProfile" name="fileUploadProfile" style="display: none;"  onchange="previewImage(event)">
         <input type="file" id="fileUploadCover" name="fileUploadCover" style="display: none;" onchange="previewImage(event)">
         <x-primary-button>{{ __('Save') }}</x-primary-button>
       </form>
       <button class="hidden px-3 py-1 text-sm text-white bg-red-800 rounded" id="discard" onclick="clearForm()">Discard</button>
   </div>
</section>

  <script defer>
      const previewProfile = document.getElementById('previewProfile');
      const previewBackdrop = document.getElementById('previewBackdrop');
      const discard = document.querySelector('#discard')
      const oldProfileImg = previewProfile.src;
      const oldBackdropImg = previewBackdrop.src;

      
      function previewImage(event) {
        const file = event.target.files[0];
        const fileId = event.target.id;
     
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
      

            if(fileId == 'fileUploadProfile'){
               previewProfile.src = reader.result;
            }else{
               previewBackdrop.src = reader.result;
            }
        
        }
        discard.classList.remove('hidden');
      }

      function clearForm(){
          // reset the file inputs
         document.getElementById('fileUploadProfile').value = '';
         document.getElementById('fileUploadCover').value = '';

         previewProfile.src = oldProfileImg;
         previewBackdrop.src = oldBackdropImg ;

         discard.classList.add('hidden');
      }
    </script>
