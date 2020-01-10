@extends('layouts.master')
@section('title')
@section('content')
	@if(isset($id))
	{{var_dump($id)}}
	@endif
	<div class="container-fluid p-5">
		<div class="row">
			<div class="col-md-5">
				<header>
					<h1>
						@if(!empty($usuario))
							Editar Cliente
						@else
							Alta de Cliente
						@endif 
					</h1>
					<hr>
				</header>
				<form action="@if(!empty($usuario)){{url("editar/$usuario->id_cliente")}}@else{{url("alta/")}}@endif" method="post">
				{{csrf_field()}}
					<div class="form-group">
						<label for="estatus">Estatus: </label>
						<input type="checkbox" name="estatus" 
						@if(!empty($usuario))
							@if($usuario->estatus == 1)
							checked 
							@elseif($usuario->estatus == 2)
							@elseif($usuario->estatus == 3)
							disabled 
							@endif
						@endif>					
					</div>
						<label for="clave">Clave: </label>
						<input type="text" name="clave" class="form-control" value="@if(!empty($usuario)){{$usuario->clave}}@else{{old('clave')}}@endif">
						 @if ($errors->has('clave'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('clave') }}
                        </div>
                    	@endif

					<div class="form-group">
						<label for="nom_com">Nombre Comercial: </label>
						<input type="text" name="nom_com" class="form-control" value="@if(!empty($usuario)){{$usuario->nom_com}}@else{{old('nom_com')}}@endif">
						 @if ($errors->has('nom_com'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('nom_com') }}
                        </div>
                    	@endif
					</div>
					<div class="form-group">						
						<label for="raz_soc">Razón Social: </label>
						<input type="text" name="raz_soc" class="form-control" value="@if(!empty($usuario)){{$usuario->raz_soc}}@else{{old('raz_soc')}}@endif">
						 @if ($errors->has('raz_soc'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('raz_soc') }}
                        </div>
                    	@endif
					</div>
					<div class="form-group">						
						<label for="rfc">RFC: </label>
						<input type="text" name="rfc" class="form-control" value="@if(!empty($usuario)){{$usuario->rfc}}@else{{old('rfc')}}@endif">
						 @if ($errors->has('rfc'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('rfc') }}
                        </div>
                    	@endif
					</div>
					<div class="form-group">						
						<label for="edad">Edad: </label>
						<input type="text" name="edad" class="form-control" value="@if(!empty($usuario)){{$usuario->edad}}@else{{old('edad')}}@endif">
						 @if ($errors->has('edad'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('edad') }}
                        </div>
                    	@endif
					</div>
					<div class="form-group">						
						<label for="domicilio">Domicilio: </label>
						<input type="text" name="domicilio" class="form-control" value="@if(!empty($usuario)){{$usuario->domicilio}}@else{{old('domicilio')}}@endif">
						 @if ($errors->has('domicilio'))
                        <div class="alert alert-danger" role="alert">
                        {{ $errors->first('domicilio') }}
                        </div>
                    	@endif
					</div>



					<div class="form-group">
						<input class="btn btn-primary form-control" type="submit" value="@if(!empty($usuario)) Guardar @else Crear @endif">
					</div>
				</form>
				@if(!empty($usuario))
				<form action="{{url("eliminar/$usuario->id_cliente")}}" method="post">
					{{csrf_field()}}
				<div class="form-group">
					<input class="btn btn-danger form-control" type="submit" value="Eliminar">
				</div>
				</form>

				<form action="{{url("/")}}" method="post">
					{{csrf_field()}}
				<div class="form-group">
					<input class="btn btn-success form-control" type="submit" value="Volver">
				</div>
				</form>
				@endif
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<header>
					<h1>
						Lista de clientes
					</h1>
				</header>
				<div class="table-responsive">
				<table class="table table-sm">
					<tr>
						<th>Clave</th>
						<th>Nombre Comercial</th>
						<th>Razón Social</th>
						<th>RFC</th>
						<th>Edad</th>
						<th>Domicilio</th>
						<th>Estatus</th>
					</tr>
					@foreach ($consulta as $data)
					<tr>
						<td><a href="{{url($data->id_cliente)}}">{{$data->clave}}</a></td>
						<td>{{$data->nom_com}}</td>
						<td>{{$data->raz_soc}}</td>
						<td>{{$data->rfc}}</td>
						<td>{{$data->edad}}</td>
						<td>{{$data->domicilio}}</td>
						<td>
							@if ($data->estatus == 1)
							Activo
							@elseif($data->estatus == 2)
							Inactivo
							@elseif($data->estatus == 3)
							Eliminado
							@endif
						</td>
					</tr>
					@endforeach
				</table>
				</div>
			</div>
		</div>
	</div>
@endsection

