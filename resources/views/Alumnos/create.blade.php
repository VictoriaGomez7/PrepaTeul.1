
@extends('layouts.app')

@section('title','Alumno')


@section('eliminar')

	<form type="session" class="form-group"  method="GET"  action="Alumno">
	    <div class="text-center">
			<label for="Matricula" style="position: absolute;top:280px; left:500px; margin: 0px; padding: 0px; font-size:20px;">Matrícula </label>

			<input type="text" id="PMatri" name="PMatri" required style="width: 25%; padding: 7px 20px;margin: 8px 0;position: absolute; top: 330px; left: 500px;border: 1px solid #646464;border-radius: 10px;box-sizing: border-box;right: 500px;text-align: center; color:#646464;">

			<button  class="btn btn-primary" style="position: absolute; top: 380px; left: 550px;width: 200;background-color:#000080;color:white; padding: 7px 20px;margin: 8px 0;border: none;border-radius: 20px;cursor: pointer;font-size:18px;">Eliminar</button>
		</div>
	</form>
@endsection