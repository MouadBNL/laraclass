<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Matières') }}
        </h2>
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <x-card>
        <form action="{{ route('subject.update', $subject->id) }}" method="post" class="mb-3">
            @csrf
            @method('PUT')
            
            <x-validation-errors/>
            <!-- Subject name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ __('Nom de la Matières') }}</span>
                </div>
                <input type="text" class="form-control" id="basic-url" name="name" value="{{ $subject->name }}">
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
