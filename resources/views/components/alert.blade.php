
@props(['key' => 'status', 'type' =>  'success'])

<div class="container">
    <div class="alert alert-{{ $type }} py-3" role="alert">
        {{ session($key) }}
    </div>
</div>