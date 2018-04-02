<table class="table table-responsive" id="infos-table">
    <thead>
        <tr>
            <th>Teléfono</th>
            <th>Teléfono 2</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($infos as $info)
        <tr>
            <td>{!! $info->phone !!}</td>
            <td>{!! $info->phone2 !!}</td>
            <td>{!! $info->email !!}</td>
            <td>{!! $info->address !!}</td>
            <td>{!! $info->city !!}</td>
            <td>
                {!! Form::open(['route' => ['infos.destroy', $info->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('infos.show', [$info->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('infos.edit', [$info->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>