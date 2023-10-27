<div class="mb-6">
    <label class="block mb-3">
        {{ ucwords($name) }}

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="border border-gray-400 p-2 w-full"
            {{ $attributes(['value' => old($name)]) }}
        />

        <x-form.error name="{{ $name }}" />
    </label>
</div>
