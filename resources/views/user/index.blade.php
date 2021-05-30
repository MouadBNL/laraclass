<x-app-layout>
    <x-slot name="header">
        {{ __('Enseignants') }}
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <div class="d-flex">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Ajouter un Enseignant</a>
    </div>
    <x-card>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" class="col-2">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->implode(',') }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('user.destroy', $user->id) }}" class="d-inline" method="post"
                            onSubmit="return confirm('Voulez vous supprimer l\'Enseignant : {{ $user->name }} ?');"
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
          {{ $users->links() }}
    </x-card>
</x-app-layout>
