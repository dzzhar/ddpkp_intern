@props(['name', 'label', 'value' => '', 'placeholder' => '', 'rows' => 4])

<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700 mb-2">
        {{ $label }}
    </label>

    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' =>
                'w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-100 resize-none',
        ]) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="text-xs text-red-500 mt-2">
            {{ $message }}
        </p>
    @enderror
</div>
