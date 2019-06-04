@extends('layouts.app')

@section('title','Docente')

@section('content')

		@include('DocenteC.formC',compact('CDocente'))
@endsection()