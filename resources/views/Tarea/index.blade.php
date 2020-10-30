@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

          <div class="pull-left"><h3>Tareas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tarea.create') }}" class="btn btn-info" >Nueva Tarea</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Tarea</th>
               <th>Descripción</th>
               <th>Autor</th>
               <th>Estado</th>
               <th>Usuario</th>
               <th>Fecha Creación</th>
               <th>Fecha Vencimiento</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($tareas->count())  
              @foreach($tareas as $tarea)  
              <tr>
                <td>{{$tarea->tarea}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->autor}}</td>
                <td>{{$tarea->estado}}</td>
                <td>{{$tarea->usuario}}</td>
                <td>{{$tarea->created_at}}</td>
                <td>{{$tarea->fechavencimiento}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TareaController@edit', $tarea->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TareaController@destroy', $tarea->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $tareas->links() }}
    </div>
  </div>
</section>

@endsection
