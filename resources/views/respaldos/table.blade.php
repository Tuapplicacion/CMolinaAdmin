<table class="table table-responsive" id="respaldos-table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($respaldos as $respaldo)
        <tr>
            <td>{!! $respaldo->name !!}</td>
            <td>{!! $respaldo->text !!}</td>
            <td>
                {!! Form::open(['route' => ['respaldos.destroy', $respaldo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('respaldos.show', [$respaldo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('respaldos.edit', [$respaldo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>