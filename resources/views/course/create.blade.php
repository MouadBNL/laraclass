<x-app-layout>
    <x-slot name="header">
            {{ __('Ajouter un Cours') }}
    </x-slot>


    <x-card>
        <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- course name -->
                <div class="form-group col-12">
                    <label for="title">{{ __('Titre du Cours') }}</label>
                    <input 
                        name="title" type="text" 
                        class="@error('title') is-invalid @enderror form-control" id="title" 
                        aria-describedby="Titre du Cours" placeholder="Titre du Cours" autofocus
                        value="{{ old('title') ?? '' }}"
                    >
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <!-- course level -->
                <div class="form-group col-6">
                    <label for="level">{{ __('Niveau') }}</label>
                    <select class="@error('level') is-invalid @enderror form-control" name="level">
                        <option value="0">Selectioner un Niveau</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                    @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    
                </div>


                <!-- course subject -->
                <div class="form-group col-6">
                    <label for="subject">{{ __('Matière') }}</label>
                    <select class="@error('subject') is-invalid @enderror form-control" name="subject">
                        <option value="0">Selectioner une Matière</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                      </select>
                    @error('subject')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- course file -->
                <div class="form-group col-12">
                    <label for="course_file">{{ __('Fichier du Cours') }}</label>
                    <input class="@error('course_file') is-invalid @enderror d-block" type="file" name="course_file">
                    @error('course_file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
