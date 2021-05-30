<x-app-layout>
    <x-slot name="header">
            {{ __('Ajouter un Enseignant') }}
    </x-slot>

    <x-card>
        <form action="{{ route('user.store') }}" method="post">
            @csrf

            <div class="row">
                <!-- user name -->
                <div class="form-group col-12">
                    <label for="name">{{ __('Nom de l\'Enseignant') }}</label>
                    <input 
                        name="name" type="text" 
                        class="@error('name') is-invalid @enderror form-control" id="name" 
                        aria-describedby="Nom de l'Enseignant" placeholder="Nom de l'Enseignant" autofocus
                        value="{{ old('name') ?? '' }}"
                    >
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <!-- user email -->
                <div class="form-group col-12">
                    <label for="email">{{ __('Nom de l\'Enseignant') }}</label>
                    <input 
                        name="email" type="text" 
                        class="@error('email') is-invalid @enderror form-control" id="email" 
                        aria-describedby="Nom de l'Enseignant" placeholder="Nom de l'Enseignant" 
                        value="{{ old('email') ?? '' }}"
                    >
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- user role -->
                <div class="form-group col-12">
                    <label for="roles">{{ __('Roles de l\'Enseignant') }}</label>
                    <select class="custom-select @error('roles*') is-invalid @enderror" name="roles[]" id="user-roles" multiple>
                        @foreach (Spatie\Permission\Models\Role::all() as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    </select>
                    @error('roles*')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <!-- user password -->
                <div class="form-group col-6">
                    <label for="name">{{ __('Mot de passe') }}</label>
                    <input 
                        name="password" type="password" 
                        class="@error('password') is-invalid @enderror form-control" id="password" 
                        aria-describedby="mot de passe" placeholder="mot de passe" 
                    >
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <!-- user password comfirm -->
                <div class="form-group col-6">
                    <label for="name">{{ __('Confirmer le mot de passe') }}</label>
                    <input 
                        name="password_confirmation" type="password" 
                        class="@error('password') is-invalid @enderror form-control" id="password" 
                        aria-describedby="mot de passe" placeholder="mot de passe" 
                    >
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-success">
                    {{ __('Ajouter') }}
                </button>
            </div>
        </form>
    </x-card>

</x-app-layout>
