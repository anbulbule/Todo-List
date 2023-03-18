<x-layout class="bg-violet-300">
    <x-slot:title>
            Login
    </x-slot>

    <div class="">
        <h1 class="text-4xl font-bold font-serif text-center mt-5">Login Here</h1>
    </div>
    
    <div class="row">
        <div class="col-12 ">
            <div class="text-white w-2/4 bg-violet-900 mx-auto card rounded-2xl mt-4 px-5 ">
                @if(session('success'))
                    <span class="bg-green-300 alert text-xl text-green-900 font-bold mt-3 mb-2" role="alert">{{ session('success') }} !!</span>
                @endif
                @if(session('fail'))
                    <span class="bg-red-300 alert text-xl text-red-900 font-bold mt-3 mb-2" role="alert">{{ session('fail') }} !!</span>
                @endif
                <form action="{{ url('/') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="email" class="text-xl font-serif font-bold">User Email :</label>
                        <input type="email" name="email" class="form-control border-gray-500 rounded" placeholder="Enter a Email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-xl font-serif font-bold">User password :</label>
                        <input type="password" name="password" class="form-control border-gray-500 rounded" placeholder="Enter a password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3 mb-2">
                        <input type="submit" name="conf_password" class="px-5 btn text-white bg-slate-900 " placeholder="Confirm Password">
                    </div>
                </form>
                <span class="mb-5">You have don't have acount please Register here <a class="text-primary" href="{{ route('register') }}">Register</a></span>
            </div>
        </div>
    </div>
    
</x-layout>