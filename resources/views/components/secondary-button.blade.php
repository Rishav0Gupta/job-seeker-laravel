<button {{ $attributes->merge(['class' => 'bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600']) }}>
    {{ $slot }}
</button>
