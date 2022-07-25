<select class="form-control select2" name="{{ $name }}">
    @if ($placeholder !== false)
        @if (!empty($placeholder))
            <option value="-1">{{ $placeholder }}</option>
        @else
            <option value="-1">Не указано</option>
        @endif
    @endif
    @foreach ($items as $item)
        @if (isset($item->id))
            <option value="{{ $item->id }}"
                    @if ($selected && $selected === $item->id) selected="selected" @endif
            >
                {{ $item->name ?? $item->value }}
            </option>
        @else
            <option value="{{ $item->value }}"
                    @if ($selected && $selected === $item->value) selected="selected" @endif
            >
                {{ $item->name ?? $item->value }}
            </option>
        @endif
    @endforeach
</select>
