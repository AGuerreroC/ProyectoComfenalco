@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Actualizar Tarea</h3>
				</div>
				<div class="panel-body">
				@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif						
					<div class="table-container">
						<form method="POST" action="{{ route('tarea.update',$tarea->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="tarea" id="tarea" class="form-control input-sm" value="{{$tarea->tarea}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$tarea->descripcion}}">
									</div>
								</div>
							
	 							<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="autor" id="autor" class="form-control input-sm" placeholder="Autor"value="{{$tarea->autor}}">
									</div>	
								</div>

								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group" >
										<select name="estado" id="estado" class="form-control input-sm">
										   <option value="A">Activo</option> 
										   <option value="T">Terminado</option>
										   <option value="P">Pendiente</option> 
										</select>
										
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group" >
										<select name="usuario" id="usuario" class="form-control input-sm">
											<option value="Sin Usuario">Sin Usuario</option>
										   @foreach ($usuarios as $usuario)
										   <option value="{{ $usuario['name'] }}">{{ $usuario['name'] }}</option>
										   @endforeach
										</select>
										
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="date" name="fechavencimiento" id="fechavencimiento" class="form-control input-sm" value="{{$tarea->fechavencimiento}}">
									</div>
								</div>
							</div>
							
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('tarea.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection