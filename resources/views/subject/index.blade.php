<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matières') }}
        </h2>
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <x-card>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <th scope="row">{{ $subject->id }}</th>
                    <td>{{ $subject->name }}</td>
                    <td>
                        <x-a href="{{ route('subject.edit', $subject->id) }}">Modifier</x-a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </x-card>
</x-app-layout>
