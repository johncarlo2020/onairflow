<section>
   <header>
      <h2 class="text-lg font-medium text-gray-900 ">
          {{ __('Update Images') }}
      </h2>

      <p class="mt-1 text-sm text-gray-600 ">
          {{ __('Ensure that the image best describe you.') }}
      </p>
  </header>
   <div class="relative w-full mt-5 rounded h-44 edit-Images">
      @if (empty($currentImages['cover_image']))
               <img class="absolute top-0 left-0 object-fill w-full h-full rounded " 
                     src="https://api.fanso.club/covers/sgshs-1475689989.jpg"
                     alt="">
            @else
               <img class="absolute top-0 left-0 object-fill w-full h-full rounded "  src="{{$currentImages['cover_image'] }}" alt="Profile Image">
            @endif
      <button class="absolute px-2 py-1 text-sm text-white bg-red-500 rounded shadow-sm top-1 right-1" onclick="document.getElementById('fileUploadCover').click()"><i class="fa-solid fa-pen"></i> Edit cover</button>
      <div class="absolute button-container left-3 -bottom-5">
         <button class="relative w-20 h-20 border-4 rounded-full priofile-image border-cyan-200"  onclick="document.getElementById('fileUploadProfile').click()">
            @if (empty($currentImages['profile_image']))
               <img class="absolute top-0 left-0 object-cover w-full h-full rounded-full"
                     src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                     alt="">
            @else
               <img class="absolute top-0 left-0 object-cover w-full h-full rounded-full" src="{{$currentImages['profile_image'] }}" alt="Profile Image">
            @endif
            <i class="absolute p-2 text-white rounded-full shadow-lg -right-2 bg-cyan-400 bottom-1 fa-solid fa-camera"></i>
         </button>
      </div>
   </div>
   <div class="mt-11">
      <form method="post" action="{{ route('password.image') }} " enctype="multipart/form-data">
      @csrf
         <input type="file" id="fileUploadProfile" name="fileUploadProfile" accept="image/*" style="display: none;">
       
         <input type="file" id="fileUploadCover" name="fileUploadCover" style="display: none;">
         <input type="submit" name="" id="">
       </form>
   </div>
</section>
