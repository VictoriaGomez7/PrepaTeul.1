

<!DOCTYPE html>
<a href="http://127.0.0.1:8000/ControlEscolarInicio">
            <button class="btn btn-success" style="position: absolute;top: 107%;left:88%">Cancelar</button></a>

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

#cuadro01, #cuadro02,#cuadro03,#cuadro04,#cuadro05,#cuadro06,#cuadro07,#cuadro08, #cuadro09,#cuadro10,#cuadro11,#cuadro12,#cuadro13,#cuadro14 {
	float: left;
	width: 220px;
	height: 230px;
	padding: 10px;
	margin: 10px;
}

#cuadro01{
	background: white;
}

#cuadro02 {
	background: white;
}

#cuadro03 {
	background: white;
}

#cuadro04 {
	background: white;
}

#cuadro05 {
	background: white;
}
#cuadro06{
	background: white;
}

#cuadro07 {
	background: white;
}

#cuadro08 {
	background: white;
}

#cuadro09 {
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
			if (id == 'cuadro01'){
				return false;
			}

			if ((id == 'cuadro02')){
				return false;
			}

			if (id == 'cuadro03'){
				return false;
			}
			if (id == 'cuadro04'){
				return false;
			}
			if (id == 'cuadro05'){
				return false;
			}
			if (id == 'cuadro06'){
				return false;
			}
			if (id == 'cuadro07'){
				return false;
			}
			if (id == 'cuadro08'){
				return false;
			}
			if (id == 'cuadro09'){
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

	@if (session()->has('msj'))
        <div class="alert alert-success" role="alert" style="width: 90%; position:  absolute; top: 43%; left: 5%;z-index: 1;">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                <strong>¡Correcto! </strong>{{ session('msj') }}
        </div>
    @endif

	<div style="background: #000080; width:20%; height: 10%; position: absolute; top: 52%; left: 5%;">
		<p style="text-align:  center; font-size:160%; color: rgb(212, 172, 13)">
			Materias
		</p>
	</div>

	<section style="background: #aaa; width:20%; height: 42%; position: absolute; top: 62%; left: 5%; overflow-y: scroll; text-align:  center;">
		<?php $var=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14');
			$i=0;
			$j=0;
			$k=0;
			$color='#B71C1C';
			$ColorPrimero='#85C1E9'; // es un tono de gris
			$ColorSegundo='#85C1E9';
			$ColorTercero='#F0B27A';
			$ColorCuarto='#F0B27A';
			$ColorQuinto='#7DCEA0';
			$ColorSexto='#7DCEA0';
			$NombresPrimero=array( );
			$NombresSegundo=array( );
			$NombresTercero=array( );
			$NombresCuarto=array( );
			$NombresQuinto=array( );
			$NombresSexto=array( );

			$ColorPrimeroExtra='#515A5A';
			$ColorSegundoExtra='#515A5A';
			$ColorTerceroExtra='#515A5A';
			$ColorCuartoExtra='#515A5A';
			$ColorQuintoExtra='#515A5A';
			$ColorSextoExtra='#515A5A';

			$Nombre_Editado='';

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
					if ($num=1){
						if (in_array($Materia->Nombre,$NombresSegundo)){
							$color=$ColorSegundo;

							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
						elseif (in_array($Materia->Nombre,$NombresCuarto)){
							$color=$ColorCuarto;
							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
						elseif (in_array($Materia->Nombre,$NombresSexto)){
							$color=$ColorSexto;
							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
					}
					if ($num2=1){
						if (in_array($Materia->Nombre,$NombresPrimero)){
							$color=$ColorPrimero;
							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
						elseif (in_array($Materia->Nombre,$NombresTercero)){
							$color=$ColorTercero;
							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
						elseif (in_array($Materia->Nombre,$NombresQuinto)){
							$color=$ColorQuinto;
							if ($Grupo_M[$i]->Grupo=='A' or $Grupo_M[$i]->Grupo=='B'){
								$Nombre_Editado=$Materia->Nombre." ".$Grupo_M[$i]->Grupo;
							}
							else{
								$Nombre_Editado=$Materia->Nombre." - ".$Grupo_M[$i]->Grupo;
							}
						}
					}
				;?>

				<?php  $j=$j+1;?>
				<?php  $i=$i+1;?>
				<input class="cuadradito" style="background: {{ ($color) }};border: 2px solid #0000000; width: 200px;height: 30px; margin: 5px;" readonly id="arrastrable{{$j}}" draggable="true" ondragstart="start(event)" ondragend="end(event)" value='{{($Nombre_Editado)}}'>
			@endforeach
			
			<?php
			//echo "valor de num:".$num;
				if ($num==1){
					$ColorPrimeroExtra='#515A5A';
					$ColorSegundoExtra='#85C1E9';
					$ColorTerceroExtra='#515A5A';
					$ColorCuartoExtra='#F0B27A';
					$ColorQuintoExtra='#515A5A';
					$ColorSextoExtra='#7DCEA0';
				}
				else if ($num==0){
					$ColorPrimeroExtra='#85C1E9'; 
					$ColorSegundoExtra='#515A5A';
					$ColorTerceroExtra='#F0B27A';
					$ColorCuartoExtra='#515A5A';
					$ColorQuintoExtra='#7DCEA0';
					$ColorSextoExtra='#515A5A';
				}
			?>
			

	</section>



		<section style="{{-- background: #E74C3C; --}} width:67%; height: 53%; position: absolute; top: 52%; left: 28%">

			<?php $var=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14');;
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

								<td style="background: #aaa"><div  id="cuadro{{$var[$i]}}" ondragenter="return enter(event)" ondragover="return over(event)" ondragleave="return leave(event)" ondrop="return drop(event)"></div>
								</td>
								<?php  $i=$i+1;?>
							@endforeach
						</tbody>
					</table>
				</div>
				<?php $CadenaDocente=implode(",",$NombreDocente) ?>
				{!! Form::open(['route'=>['Asigna.store'],'method'=>'POST'])!!}
	<input type="hidden" value="" name="Arreglo" id="Arreglo" >
	<input type="hidden" value="{{$CadenaDocente}}" name="Arreglo2" id="Arreglo2" >
	<button type="submit" class="btn btn-primary" style="position: absolute;top: 104%;left:78%">Guardar</button>
	{!! Form::close()!!}
		</section>


	<div style=" position: absolute;top: 107%; left: 5%;">SEMESTRE:</div>
	<div style="background: {{ ($ColorPrimeroExtra) }}; position: absolute;top: 107%; left: 11.5%;">Primero</div>
	<div style="background:{{ ($ColorSegundoExtra) }}; position: absolute;top: 107%; left: 16%;">Segundo</div>
	<div style="background: {{ ($ColorTerceroExtra) }}; position: absolute;top: 107%; left: 21%;">Tercero</div>
	<div style="background:{{ ($ColorCuartoExtra) }}; position: absolute;top: 107%; left: 25%;">Cuarto</div>
	<div style="background: {{ ($ColorQuintoExtra) }}; position: absolute;top: 107%; left: 29%;">Quinto</div>
	<div style="background: {{ ($ColorSextoExtra) }}; position: absolute;top: 107%; left: 33%;">Sexto</div>

</body>


</html>

