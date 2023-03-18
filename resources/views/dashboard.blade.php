<x-layout class="h-screen w-full bg-fuchsia-800">
    <x-slot:title>
        Dashboard
    </x-slot>
    
    {{-- Navabar --}}
    <x-navbar>
    </x-navbar>

    {{-- list title --}}

    <div class="grid justify-center">
        <div class="py-3 card-body text-white">
            <button type="button" class="w-20 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <img class="" src="{{ url('icons/note.png') }}" alt=""> </button>
            <h5 class="card-title text-center">Add Notes</h5>
        </div>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Notes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('addNotes') }}" method="post">
            @csrf
                <input type="text" name="title" placeholder="Title" class="form-control mb-3">
                <label for="desc" class="mb-1">Description</label>
                <textarea id="desc" name="description" placeholder="Description" class="form-control"> </textarea>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gray-400 hover:bg-gray-800 hover:text-white" data-bs-dismiss="modal">Close</button>
              <input type="submit" class="btn bg-blue-500 hover:bg-blue-800 hover:text-white" value="Add">
            </div>
          </form>
      </div>
    </div>
  </div>
  @if(session('success'))
    <span class="grid bg-green-300 justify-items-center text-green-900 mx-auto text-xl w-2/6 alert alert-success">{{ session('success') }}</span>
  @endif

  {{-- Notes list --}}
<div class="container">
  <div class="row">
    @foreach ($notes as $note )
    <div class="col-3">
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $note->title }}</div>
        <div class="card-body">
          <p class="card-text">{{ $note->description }}</p>
        </div>
          <div class="card-footer">
           <a href="{{ url('editNote', $note->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a> 
          <a href="{{ url('delete', $note->id) }}" class="btn btn-primary"><i class="fa-solid fa-trash"></i></a>
        </div>
      </div>
    </div>
    @endforeach
  </x-layout>

