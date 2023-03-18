<x-layout class="h-screen w-full bg-fuchsia-800">
    <x-slot:title>
        Profile
    </x-slot>
    
    {{-- Navabar --}}
    <x-navbar>
    </x-navbar>

    <div class="mt-4 text-white grid justify-items-center">
        <span class="text-center text-2xl mb-3">Edit Profile</span>
        <div class="w-2/5 px-5 py-10 bg-violet-500">
            <form action="" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="User Name" class="text-xl">User Name :</label>
                    <input type="text" name="username" class="form-control" value="{{ $profile->name }}">
                </div>
                <div class="mt-4 ">
                    <input type="submit" class="text-white btn bg-blue-900" value="Update">
                </div>
            </form>
        </div> 
    </div>
  </x-layout>

