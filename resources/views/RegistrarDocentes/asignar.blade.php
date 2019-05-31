

<!DOCTYPE html>
<a href="http://127.0.0.1:8000/ControlEscolarInicio">
            <button class="btn btn-success" style="position: absolute;top: 100%;left:88%">Cancelar</button></a>

<html land="es">
<head>
	<meta charset="utf-8" />
	@include('ControlEscolar.CEprincipal')
	@extends('layouts.app')
	<title>Drag & drop</title>

	<style type="text/css">

section {
	margin: auto;
	width: 1000px;
}

#cuadro1, #cuadro2,#cuadro3,#cuadro4,#cuadro5,#cuadro6,#cuadro7,#cuadro8, #cuadro9,#cuadro10,#cuadro11,#cuadro12,#cuadro13,#cuadro14 {
	float: left;
	width: 220px;
	height: 230px;
	padding: 10px;
	margin: 10px;
}

#cuadro1{
	background: white;
}

#cuadro2 {
	background: white;
}

#cuadro3 {
	background: white;
}

#cuadro4 {
	background: white;
}

#cuadro5 {
	background: white;
}
#cuadro6{
	background: white;
}

#cuadro7 {
	background: white;
}

#cuadro8 {
	background: white;
}

#cuadro9 {
	background: white;
}

#cuadro10 {
	background: white;
}

#cuadro11{
	background: white;
}

#cuadro12 {
	background: white;
}

#cuadro13 {
	background: white;
}

#cuadro14 {
	background: white;
}







#arrastrable1 {
	background: white;
	border: 2px solid black;
}

#arrastrable2 {
	background: white;
	border: 2px solid black;
}

#arrastrable3 {
	background: white;
	border: 2px solid black;
}

#arrastrable4 {
	background: white;
	border: 2px solid black;
}

#arrastrable5 {
	background: white;
	border: 2px solid black;
}

#arrastrable6 {
	background: white;
	border: 2px solid black;
}
#arrastrable7 {
	background: white;
	border: 2px solid black;
}

#arrastrable8 {
	background: white;
	border: 2px solid black;
}

#arrastrable9 {
	background: white;
	border: 2px solid black;
}

#arrastrable10 {
	background: white;
	border: 2px solid black;
}

#arrastrable11{
	background: white;
	border: 2px solid black;
}

#arrastrable12{
	background: white;
	border: 2px solid black;

	</style>
	<script type="text/javascript">
		contador = 0; // Variable global para tener poder poner un id unico a cada elemento cuando se clona.
		materiaObtenida="";
		docenteObtenido="";
		MateriYCuadro=[];
		function start(e) {
			e.dataTransfer.effecAllowed = 'move'; // Define el efecto como mover (Es el por defecto)
			e.dataTransfer.setData("Data", e.target.id); // Coje el elemento que se va a mover
			e.dataTransfer.setDragImage(e.target, 0, 0); // Define la imagen que se vera al ser arrastrado el elemento y por donde se coje el elemento que se va a mover (el raton aparece en la esquina sup_izq con 0,0)
			e.target.style.opacity = '0.9';

		}

		function end(e){
			e.target.style.opacity = ''; // Pone la opacidad del elemento a 1
			e.dataTransfer.clearData("Data");
			materiaObtenida=e.target.value;
			if (docenteObtenido=="" || materiaObtenida==""){
				alert("Ese no se agrego")
			} else{
				MateriYCuadro.push(materiaObtenida);
				MateriYCuadro.push(docenteObtenido);
				document.getElementById("Arreglo").value = MateriYCuadro;
				docenteObtenido=""
			}


			//document.write(materiaObtenida+" "+docenteObtenido);

		}


		function enter(e) {
			e.target.style.border = '3px #555';


		}

		function leave(e) {
			e.target.style.border = '';

		}

		function over(e) {
			var elemArrastrable = e.dataTransfer.getData("Data"); // Elemento arrastrado
			var id = e.target.id; // Elemento sobre el que se arrastra






			// return false para que se pueda soltar
			if (id == 'cuadro1'){
				return false; // Cualquier elemento se puede soltar sobre el div destino 1
			}

			if ((id == 'cuadro2')){
				return false; // En el cuadro2 se puede soltar cualquier elemento menos el elemento con id=arrastrable3
			}

			if (id == 'cuadro3'){
				return false;
			}
			if (id == 'cuadro4'){
				return false;
			}
			if (id == 'cuadro5'){
				return false;
			}
			if (id == 'cuadro6'){
				return false;
			}
			if (id == 'cuadro7'){
				return false;
			}
			if (id == 'cuadro8'){
				return false;
			}
			if (id == 'cuadro9'){
				return false;
			}
			if (id == 'cuadro10'){
				return false;
			}
			if (id == 'cuadro11'){
				return false;
			}
			if (id == 'cuadro12'){
				return false;
			}
			if (id == 'cuadro13'){
				return false;
			}
			if (id == 'cuadro14'){
				return false;
			}

		}


		/**
		*
		* Mueve el elemento
		*
		**/
		function drop(e){
			docenteObtenido=e.target.id;
			/*MateriYCuadro[]=materiaObtenida;
			MateriYCuadro[]=docenteObtenido;
			document.write(MateriYCuadro);*/
			var elementoArrastrado = e.dataTransfer.getData("Data"); // Elemento arrastrado
			e.target.appendChild(document.getElementById(elementoArrastrado));
			e.target.style.border = '';  // Quita el borde
			tamContX = $('#'+e.target.id).width();
			tamContY = $('#'+e.target.id).height();

			tamElemX = $('#'+elementoArrastrado).width();
			tamElemY = $('#'+elementoArrastrado).height();

			posXCont = $('#'+e.target.id).position().left;
			posYCont = $('#'+e.target.id).position().top;

			// Posicion absoluta del raton
			x = e.layerX;
			y = e.layerY;

			// Si parte del elemento que se quiere mover se queda fuera se cambia las coordenadas para que no sea asi
			if (posXCont + tamContX <= x + tamElemX){
				x = posXCont + tamContX - tamElemX;
			}

			if (posYCont + tamContY <= y + tamElemY){
				y = posYCont + tamContY - tamElemY;
			}

			document.getElementById(elementoArrastrado).style.position = "relative";
			//document.getElementById(elementoArrastrado).style.left = x + "px";
			//document.getElementById(elementoArrastrado).style.top = y + "px";

		}

	</script>
</head>
<body>
	<div style="background: #000080; width:20%; height: 10%; position: absolute; top: 45%; left: 5%;">
		<p style="text-align:  center; font-size:160%; color: rgb(212, 172, 13)">
			Materias
		</p>
	</div>

	<section style="background: #aaa; width:20%; height: 42%; position: absolute; top: 55%; left: 5%; overflow-y: scroll; text-align:  center;">
		<?php $var=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14);
			$i=0;
			$j=0;
			$k=0;
			$color='#B71C1C';
			$ColorPrimero='#515A5A'; // es un tono de gris
			$ColorSegundo='#00FF00'; // es como un verde limon
			$ColorTercero='#515A5A';
			$ColorCuarto='#FFEB3B'; //es como amarillo
			$ColorQuinto='#515A5A';
			$ColorSexto='#0000FF'; // es azul
			$NombresPrimero=array( );
			$NombresSegundo=array( );
			$NombresTercero=array( );
			$NombresCuarto=array( );
			$NombresQuinto=array( );
			$NombresSexto=array( );

		?>
			@foreach ($M_P_S as $M_P) {{-- ES EL CICLO PARA NOM DE PRIMER SEM --}}
				<?php
				$nomP=$M_P->Nombre;
				$NombresPrimero[]=$nomP; ?>
			@endforeach

			@foreach ($M_S_S as $M_S)
				<?php
				$nomSE=$M_S->Nombre;
				$NombresSegundo[]=$nomSE; ?>
			@endforeach

			@foreach ($M_T_S as $M_T) {{-- ES EL CICLO PARA NOM DE TERCER SEM --}}
				<?php
				$nomT=$M_T->Nombre;
				$NombresTercero[]=$nomT; ?>
			@endforeach

			@foreach ($M_C_S as $M_C)
				<?php
				$nomC=$M_C->Nombre;
				$NombresCuarto[]=$nomC; ?>
			@endforeach

			@foreach ($M_Q_S as $M_Q) {{-- ES EL CICLO PARA NOM DE TERCER SEM --}}
				<?php
				$nomQ=$M_Q->Nombre;
				$NombresQuinto[]=$nomQ; ?>
			@endforeach

			@foreach ($M_SIX_S as $M_SIX)
				<?php
				$nomSIX=$M_SIX->Nombre;
				$NombresSexto[]=$nomSIX; ?>
			@endforeach

			@foreach($Materias as $Materia)

				<?php
					if ($num=2){
						if (in_array($Materia->Nombre,$NombresSegundo)){
							$color=$ColorSegundo;
						}
						elseif (in_array($Materia->Nombre,$NombresCuarto)){
							$color=$ColorCuarto;
						}
						elseif (in_array($Materia->Nombre,$NombresSexto)){
							$color=$ColorSexto;
						}
						else{
							$color='#B71C1C';
						}
					}
					else{
						if (in_array($Materia->Nombre,$NombresPrimero)){
							$color=$ColorPrimero;
						}
						elseif (in_array($Materia->Nombre,$NombresTercero)){
							$color=$ColorTercero;
						}
						elseif (in_array($Materia->Nombre,$NombresQuinto)){
							$color=$ColorQuinto;
						}
						else{
							$color='#B71C1C';
						}
					}
				;?>

				<?php  $j=$j+1;?>
				<input class="cuadradito" style="background: {{ ($color) }};border: 2px solid #0000000; width: 200px;height: 30px; margin: 5px;" readonly id="arrastrable{{$j}}" draggable="true" ondragstart="start(event)" ondragend="end(event)" value='{{($Materia->Nombre)}}'>
			@endforeach

	</section>



		<section style="{{-- background: #E74C3C; --}} width:67%; height: 53%; position: absolute; top: 45%; left: 28%">

			<?php $var=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14);
				$i=0;
				$j=0;
				$k=0;
				$NombreDocente=array( );
			?>

				<div class="panel panel-default" style="overflow-x: scroll; text-align:  center;">
					<table border="1">
						<tr style="font-size:125%; background: #000080; color: rgb(212, 172, 13);">
							@foreach($Docentes as $Docente)
									<?php
										$Cadena=$Docente->Nombre;
										$NombreDocente[]=$Cadena;
									?>
									<th>{{$Docente->Nombre}}</th>
							@endforeach
						</tr>
						<tbody>
							@foreach($Docentes as $Docente)
								<?php  $i=$i+1;?>
								<td style="background: #aaa"><div  id="cuadro{{$i}}" ondragenter="return enter(event)" ondragover="return over(event)" ondragleave="return leave(event)" ondrop="return drop(event)"></div>
								</td>
							@endforeach
						</tbody>
					</table>
				</div>
				<?php $CadenaDocente=implode(",",$NombreDocente) ?>
				{!! Form::open(['route'=>['Asigna.store'],'method'=>'POST'])!!}
	<input type="hidden" value="" name="Arreglo" id="Arreglo" >
	<input type="hidden" value="{{$CadenaDocente}}" name="Arreglo2" id="Arreglo2" >
	<button type="submit" class="btn btn-primary" style="position: absolute;top: 100%;left:80%">Guardar</button>
	{!! Form::close()!!}
		</section>


	<div style=" position: absolute;top: 100%; left: 5%;">SEMESTRE:</div>
	<div style="background: #515A5A; position: absolute;top: 100%; left: 11.5%;">Primero</div>
	<div style="background: #00FF00; position: absolute;top: 100%; left: 16%;">Segundo</div>
	<div style="background: #515A5A; position: absolute;top: 100%; left: 21%;">Tercero</div>
	<div style="background: #FFEB3B; position: absolute;top: 100%; left: 25%;">Cuarto</div>
	<div style="background: #515A5A; position: absolute;top: 100%; left: 29%;">Quinto</div>
	<div style="background: #0000FF; position: absolute;top: 100%; left: 33%;">Sexto</div>

</body>


</html>

