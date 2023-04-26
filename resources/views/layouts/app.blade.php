<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen bg-gray-100">
            @include('layouts.navigation')
            @include('layouts.sidebar')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
    <livewire:scripts />
     @include('popper::assets')
       <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <script>

        Pusher.logToConsole = true;
        var pusher = new Pusher('3d6268b6d8c01cd15db7', {
            cluster: 'us2'
        });

        //open sidebar
        const sidebarOpenButton = document.querySelector('#sidebarOpen');
        const sidebar = document.querySelector('#sidebar');
        const body = document.querySelector('body');
        const closeSidebar = document.querySelector('#closeSidebar')

        sidebarOpenButton.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            body.classList.toggle('side-open')
        });

        //close sidebar
        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('open');
            body.classList.remove('side-open')
        });

        function cloneDiv(data) {

            var textarea = document.getElementById('textInput'+data.post_id);
            var divToClone = document.querySelector('.comment-list');
            var parent = document.querySelector('#commentContainer'+data.post_id);
            var clone = divToClone.cloneNode(true);
            var content = clone.querySelector('.comment-text');
            var time = clone.querySelector('.time-comment');
            var commentCreatedAt = new Date(data.created_at);
            var diff = moment(commentCreatedAt).fromNow();
            content.textContent = data.content;
            time.textContent = diff;
            parent.insertBefore(clone, parent.childNodes[0]);
            
            textarea.value = '';
        }
    </script>
   
    @yield('scripts')
   

</body>

</html>
