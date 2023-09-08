<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success float-right']) }}>
    {{ $slot }}
</button>
