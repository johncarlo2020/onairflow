<style>
    .sidebar {
        background-color: white;
        width: 280px;
        z-index: 12;
        position: fixed;
        top: 0;
        right: -300px;
        transition: right 0.2s ease-in-out;
    }

    .sidebar.open {
        right: 0;
    }

    body.side-open::after {
        content: '';
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(128, 128, 128, 0.534);
        z-index: 10;
    }

    .seperator {
        background-color: rgb(75, 221, 221);
        height: 1px;
        width: 100%;
    }

    .sidebar-links li {
        margin-bottom: 5px;
        padding: 5px 10px;
        border-radius: 4px;
        color: rgb(138, 129, 129);
    }

    .sidebar-links li:hover {
        background-color: #1ea2f1;
        color: #fff;
        border-radius: 5px;
    }

    .sidebar-links li a {
        color: inherit;
    }
</style>
<aside class="h-screen sidebar" id="sidebar">
    <div class="flex items-start justify-between px-6 py-4 profile-info-sidebar">
        <div class="flex items-center">
            <div class="relative rounded-full border-1 border-cyan-400">
                    @if (empty($currentImages['profile_image']))
                        <img class="w-10 h-10 rounded-full shadow-lg img"
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                            alt="">
                    @else
                        <img class="w-10 h-10 rounded-full shadow-lg img" src="{{$currentImages['profile_image'] }}" alt="Profile Image">
                    @endif
                <span class="absolute w-2 h-2 bg-yellow-300 rounded-full -right-0 ol-indicator bottom-2"></span>
            </div>
            <div class="pb-2 ml-2 info">
                <p class="pt-2 m-0 text-sm font-bold leading-none name"> {{auth()->user()->getUserName()}}
                    <span class="text-cyan-400"><i class="fa-solid fa-certificate"></i></span> <a
                        class="text-cyan-400" href="#"></a>
                </p>
               
            </div>
        </div>
        <button class="text-sm text-gray-400" id="closeSidebar">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="flex justify-between px-6 pb-3 text-sm text-gray-400 price-sub">
        <button><i class="fa-solid fa-money-bill-wave"></i> <span>$100</span></button>
        <button><i class="fa-regular fa-star"></i></i><span> </span>2</button>
    </div>
    <div class="seperator"></div>
    <div class="px-4 py-3 links">
        <ul class="mb-2 sidebar-links">
            <li>
                <a href="{{ route('profile') }}" class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-house"></i>
                    My Profile
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"  class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-user-large"></i>
                    Edit Profile
                </a>
            </li>
        </ul>
        <div class="mb-2 seperator"></div>
        <ul class="mb-2 sidebar-links">
            <li>
                <a href="" class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-fire-flame-simple"></i>
                    My Feeds
                </a>
            </li>
            <li>
                <a href="" class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-video"></i>
                    My Videos
                </a>
            </li>
            <li>
                <a href="" class="text-sm text-gray-500 ">
                    <i class="fa-regular fa-image"></i>
                    My Galleries
                </a>
            </li>
        </ul>
        <div class="mb-2 seperator"></div>
        <ul class="mb-2 sidebar-links">
            <li>
                <a href="" class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Order History
                </a>
            </li>
            <li>
                <a href="" class="text-sm text-gray-500 ">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    Earning History
                </a>
            </li>
        </ul>
        <div class="mb-2 seperator"></div>
        <ul class="mb-2 sidebar-links">
            <li>
                <form class="p-0 m-0" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="text-sm text-gray-500 " :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>

</aside>