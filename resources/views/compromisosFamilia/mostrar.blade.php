<!DOCTYPE html>
<html>
<head>
	<title></title>
	@extends('layouts.app')

</head>
<body>
	<form>

		<center>
		&nbsp 	<table border="1" width="70%" align="center">
			<tr>
				<td width="1%" align="center">Número</td>

				<td align="center">Compromiso</td>
			</tr>
			@if(isset($compromisos))
			<?php
				$cont=1;
			?>
			@foreach($compromisos as $r)
				<tr>
					<td align="center">{{ $cont }}</td>
					<td width="25%" align="justify">{{ $r->compromiso }}</td>



					<?php
					$cont=$cont+1;
					?>
				<tr>
				@endforeach
				@endif
		</table>
		</center>
	</form>
</body>
</html>

