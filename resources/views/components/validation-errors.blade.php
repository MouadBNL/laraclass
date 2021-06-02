@foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
@endforeach
{{ implode(',', $errors->all()) }}