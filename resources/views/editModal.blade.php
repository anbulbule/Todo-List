<x-layout class="h-screen w-full bg-fuchsia-800">
    <x-slot:title>
        Dashboard
    </x-slot>
    
    {{-- Navabar --}}
    <x-navbar>
    </x-navbar>

    <div class="bg-blue-500 w-2/5 h-3/5 rounded-3xl mx-auto mt-5">
        <div class="text-center m-0 p-0 mt-4 text-3xl text-white mb-2">Edit Notes</div><hr>

        <div>
            <form action="" method="post">
                @csrf
                @method('put')
                    <div class="px-10 mt-3">
                        <input type="text" name="title" placeholder="Title" value="{{ $note->title }}" class="form-control mb-3">
                    </div>
                    <div class="px-10 mt-3">
                        <label for="desc" class="mb-1">Description</label>
                        <textarea id="desc" name="description" placeholder="Description" class="form-control">{{ $note->description }} </textarea>
                    </div>
                    <div class="px-10 mt-3 text-center" >
                        <input type="submit" class="btn px-12 mx-2 bg-blue-200 hover:bg-blue-800 hover:text-white" value="Update" />
                        <a href="{{ url('dashboard') }}" class="btn bg-gray-600 text-white hover:bg-gray-900"> Back to Dashboard</a>
                    </div>
            </form>
            
        </div>

    </div>

   
  </x-layout>

