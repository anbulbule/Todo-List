<x-layout class="bg-slate-300">
    <x-slot:title>
            Register
    </x-slot>

    <div class="">
        <h1 class=" text-4xl font-bold font-mono text-center mb-2 mt-3">Registration Here</h1>
    </div>
    <div class="row">
        <div class="col-12 ">
            <div class="w-2/4 bg-slate-800 text-white mx-auto card rounded-2xl mt-4 px-5 ">
                @if(session('fail'))
                    <span class="alert alert-danger">{{ session('fail') }}</span>
                @endif
                <form action="{{ route('register/create') }}" method="post">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name" class="text-xl font-serif font-bold">User Name :</label>
                        <input type="text" name="name" class="form-control border-gray-500 rounded" placeholder="Enter a Username" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="text-xl font-serif font-bold">User Email :</label>
                        <input type="email" name="email" class="form-control border-gray-500 rounded" placeholder="Enter a Email" value="{{ old('name') }}">
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
                    <div class="form-group mt-3">
                        <label for="conf_password" class="text-xl font-serif font-bold">Confirm password :</label>
                        <input type="password" name="password_confirmation" class="form-control border-gray-500 rounded" placeholder="Confirm Password">
                    </div>
                    <div class="form-group mt-3 mb-1">
                        <input type="submit" name="submit" class="px-5 btn text-white bg-slate-900 " placeholder="Confirm Password">
                    </div>
                </form>
                <span class="mb-5">You have acount please login here <a class="text-blue-500" href="{{ route('login') }}">Login</a></span>
            </div>
        </div>
    </div>
</x-layout>