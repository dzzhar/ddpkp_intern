@props(['name', 'label', 'value' => '', 'placeholder' => '', 'type' => 'text'])

<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700 mb-2">
        {{ $label }}
    </label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' =>
                'w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100',
        ]) }}>

    @error($name)
        <p class="text-xs text-red-500 mt-2">
            {{ $message }}
        </p>
    @enderror
</div>
