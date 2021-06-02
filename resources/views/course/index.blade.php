<x-app-layout>
    <x-slot name="header">
        {{ __('Cours') }}
    </x-slot>

    @if(session()->has('status'))
        <x-alert/>
    @endif

    <div class="d-flex">
        <a href="{{ route('course.create') }}" class="btn btn-primary">Ajouter un coure</a>
    </div>
    <x-card>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Niveau</th>
                <th scope="col">Matière</th>
                <th scope="col" class="col-2">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->level->name }}</td>
                    <td>{{ $course->subject->name }}</td>
                    <td>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('course.destroy', $course->id) }}" class="d-inline" method="post"
                            onSubmit="return confirm('Voulez vous supprimer l\'Enseignant : {{ $course->name }} ?');"
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
          {{ $courses->links() }}
    </x-card>
</x-app-layout>
