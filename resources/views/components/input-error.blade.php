@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-center mt-3']) }}  style="font-size: .8rem; color: red;">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
