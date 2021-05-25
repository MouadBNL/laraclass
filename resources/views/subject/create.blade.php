<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Matières') }}
        </h2>
    </x-slot>

    <x-card>
        <form action="{{ route('subject.store') }}" method="post">
            @csrf
            
            <!-- Subject name -->
            <div>
                <x-label for="name" :value="__('Nom de la Matières')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-button class="">
                    {{ __('Ajouter') }}
                </x-button>
            </div>
        </form>
    </x-card>
</x-app-layout>
