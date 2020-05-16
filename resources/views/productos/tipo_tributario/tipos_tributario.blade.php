@extends('layouts.app')
@section('titulo')
Tipos tributarios
@endsection
@section('menu-open2')
menu-open
@endsection
@section('active15')
active
@endsection
@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fas fa-gavel"></i> Tipos tributarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Tipos tributarios</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <h1>Hola Tipos tributarios</h1>
</div>

@endsection
@section('script_ajax')
<script  type="text/javascript" src="/js/pais_ajax.js"></script>
@endsection