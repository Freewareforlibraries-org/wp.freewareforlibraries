<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn hvr-grow ms-auto bg-teal-dark text-white dropshadow']) }}>
    {{ $slot }}
</button>
