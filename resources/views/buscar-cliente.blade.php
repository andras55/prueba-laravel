@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center my-5">
			<h1>
				Buscar cliente
			</h1>
		</div>
	</div>
</div>
<div class="container">
	<form action="">
		<div class="row">
			<div class="col-12">
				<table class="table">
					<tr>
						<td><label class="col-12" for="clave">Clave: </label></td>
						<td><input class="col-12" type="text" name="clave"></td>
						<td><input class="col-12" type="submit" value="Buscar"></td>
					</tr>
				</table>
			</div>
		</div>
	</form>
</div>
@endsection