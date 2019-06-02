@extends('layouts.app')

@section('title','Docente')

@section('content')

		@include('DocenteC.form',compact('CDocente'))
@endsection()