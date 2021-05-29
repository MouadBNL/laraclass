<x-app-layout>
    <x-slot name="header">
            {{ __('Ajouter une Matières') }}
    </x-slot>

    <x-card>
        <form action="{{ route('subject.store') }}" method="post">
            @csrf
            
            <!-- Subject name -->
            <div class="form-group">
                <label for="name">{{ __('Nom de la Matières') }}</label>
                <input name="name" type="text" class="@error('name') is-invalid @enderror form-control" id="name" aria-describedby="Nom de la Matières" placeholder="Nom de la Matières">
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
