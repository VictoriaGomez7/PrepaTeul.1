@extends('layouts.app')

@section('title','Materia')

@section('content')

		@include('MateriaC.form',compact('CMateria'))

@endsection()