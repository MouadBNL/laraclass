@props(['key'])
<div {{ $attributes }}>
    <ul class="mt-3 list-disc list-inside text-sm text-green-500">
            <li>{{ session($key) }}</li>
    </ul>
</div>
