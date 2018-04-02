<li class="{{ Request::is('respaldos*') ? 'active' : '' }}">
    <a href="{!! route('respaldos.index') !!}"><i class="fa fa-edit"></i><span>Respaldo</span></a>
</li>

<li class="{{ Request::is('infos*') ? 'active' : '' }}">
    <a href="{!! route('infos.index') !!}"><i class="fa fa-edit"></i><span>Información</span></a>
</li>

