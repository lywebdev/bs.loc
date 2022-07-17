<select class="form-control select2" name="{{ $name }}">
    <option>{{ $placeholder ?? 'Не указано' }}</option>
    @foreach ($items as $item)
        <option value="{{ $item->id }}"
            @if ($selected && $selected === $item->id) selected="selected" @endif
        >
            {{ $item->name ?? $item->value }}
        </option>
    @endforeach
</select>
