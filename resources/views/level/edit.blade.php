<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Niveau') }}
        </h2>
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <x-card>
        <form action="{{ route('level.update', $level->id) }}" method="post" class="mb-3">
            @csrf
            @method('PUT')

            <!-- Level name -->
            <div class="form-group">
                <label for="name">{{ __('Nom du Niveau') }}</label>
                <input 
                    name="name" type="text" 
                    class="@error('name') is-invalid @enderror form-control" id="name" 
                    aria-describedby="Nom du Niveau" placeholder="Nom du Niveau" autofocus
                    value="{{ $level->name }}"
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

        <form class="d-inline" action="{{ route('level.destroy', $level->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                {{ __('Supprimer') }}
            </button>
        </form>
    </x-card>
</x-app-layout>
