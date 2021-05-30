<x-app-layout>
    <x-slot name="header">
        {{ __('Niveaux') }}
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <div class="d-flex">
        <a href="{{ route('level.create') }}" class="btn btn-primary">Ajouter un Niveau</a>
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
                @foreach ($levels as $level)
                <tr>
                    <th scope="row">{{ $level->id }}</th>
                    <td>{{ ucwords(strtolower($level->name)) }}</td>
                    <td>
                        <a href="{{ route('level.edit', $level->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('level.destroy', $level->id) }}" class="d-inline" method="post"
                            onSubmit="return confirm('Voulez vous supprimer la Matières : {{ $level->name }} ?');"
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
          {{ $levels->links() }}
    </x-card>
</x-app-layout>
