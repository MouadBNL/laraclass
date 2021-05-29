<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Matière') }}
        </h2>
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <x-card>
        <form action="{{ route('subject.update', $subject->id) }}" method="post" class="mb-3">
            @csrf
            @method('PUT')

            <!-- Subject name -->
            <div class="form-group">
                <label for="name">{{ __('Nom de la Matières') }}</label>
                <input 
                    name="name" type="text" 
                    class="@error('name') is-invalid @enderror form-control" id="name" 
                    aria-describedby="Nom de la Matières" placeholder="Nom de la Matières" autofocus
                    value="{{ $subject->name }}"
                >
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    {{ __('Modifier') }}
                </button>
            </div>
        </form>

        <form class="d-inline" action="{{ route('subject.destroy', $subject->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                {{ __('Supprimer') }}
            </button>
        </form>
    </x-card>
</x-app-layout>
