<div class="mb-6">
    <label class="block mb-3">
        {{ ucwords($name) }}

        <textarea
            type="text"
            name="{{ $name }}"
            id="{{ $name }}"
            class="border border-gray-400 p-2 w-full"
            rows="6"
        >{{ $slot ?? old($name) }}</textarea>

        <x-form.error name="{{ $name }}" />
    </label>
</div>
