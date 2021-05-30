<x-app-layout>
    <x-slot name="header">
            {{ __('Ajouter un Niveau') }}
    </x-slot>

    <x-card>
        <form action="{{ route('level.store') }}" method="post">
            @csrf
            
            <!-- level name -->
            <div class="form-group">
                <label for="name">{{ __('Nom du Niveau') }}</label>
                <input 
                    name="name" type="text" 
                    class="@error('name') is-invalid @enderror form-control" id="name" 
                    aria-describedby="Nom du Niveau" placeholder="Nom du Niveau" autofocus
                    value="{{ old('name') ?? '' }}"
                >
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="mt-4">
                <button class="btn btn-success">
                    {{ __('Ajouter') }}
                </button>
            </div>
        </form>
    </x-card>
</x-app-layout>
