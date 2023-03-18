<nav>
    <div class="">
        <div class="w-full bg-dark flex">
            <button class="py-2"><a href="{{ route('dashboard') }}" class="text-white mx-3">Dashboard </a></button>
            <div class="grid justify-items-center ml-auto px-3">
                <div class="text-white d-flex align-items-center hover:text-green-900">
                    <a href="" class="">Home</a>
                    <a href="{{ url('profile',session('user_id')) }}" class="px-5">Profile</a>
                    <a href="{{ route('logout') }}" class="">Logout</a>
                </div>
            </div>
            </div>
    </div>
</nav>