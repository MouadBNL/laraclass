<x-app-layout>
    <x-slot name="header">
        {{ __('Matières') }}
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <div class="d-flex">
        <a href="{{ route('subject.create') }}" class="btn btn-primary">Ajouter une Matières</a>
    </div>
    <x-card>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col" class="col-2">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <th scope="row">{{ $subject->id }}</th>
                    <td>{{ ucwords(strtolower($subject->name)) }}</td>
                    <td>
                        <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('subject.destroy', $subject->id) }}" class="d-inline" method="post"
                            onSubmit="return confirm('Voulez vous supprimer la Matières : {{ $subject->name }} ?');"
                            >
                            
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{ $subjects->links() }}
    </x-card>
</x-app-layout>
