{{--
Компонент таблицы
Принимает 2 аргумента:
thead - массив, с именами полей
tbody - массив, с ключами значений для отображаемых записей
    если передаётся массив, значит используется например связанное значение, и передаются следующие аргументы в массив:
        - имя поля в текущей таблице
        - класс связуемой модели
        - поле, в связуемой таблице, которое нужно отобразить
data - данные таблицы, которые нужно отобразить
--}}
<div class="table-responsive">
@if ($data->count())
<table class="table table-striped mb-0">
    <thead>
    <tr>
        @foreach ($thead as $tr)
            <th>{{ $tr }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
        <tr>
            <th scope="row">{{ $row->id }}</th>
            @foreach ($tbody as $tr)
                @if (is_array($tr))
                    @switch ($tr[0])
                        @case('image')
                            <td>
                                @if (strpos(mb_strtolower($row->{$tr[1]}), 'http') === false)
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::get($row->{$tr[1]}) }}"
                                        alt=""
                                        style="height: 150px; width: 150px"
                                    >
                                @else
                                    <img
                                        src="{{ $row->{$tr[1]} }}"
                                        alt=""
                                        style="height: 150px; width: 150px"
                                    >
                                @endif
                            </td>
                        @break
                        @case('relation')
                            <td>
                                @if (isset($row->{$tr[1]}))
                                    {{ $row->{$tr[1]}->{$tr[2]} }}
                                @else
                                    -
                                @endif
                            </td>
                        @break
                    @endswitch
                @else
                    <td>{{ $row->{$tr} }}</td>
                @endif
            @endforeach
            <td style="display: flex;">
                <a href="{{ route($route . '.edit', $row->id) }}" class="btn btn-outline-success btn-sm">Редактировать</a>
                <form action="{{ route($route . '.destroy', $row->id) }}" method="post" style="margin-left: 7px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p class="card-title-desc">Нет записей</p>
@endif

@if (!isset($pagination))
    <div class="mt-4">
        {{ $data->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif
</div>
