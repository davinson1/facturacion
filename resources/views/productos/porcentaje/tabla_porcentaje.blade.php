 <!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de porcentajes</h3>
      <!--modal de boton registar rol-->
      <button id="modal" type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-crear">
        <i class="fas fa-plus"></i>
        Crear porcentaje
      </button>
     <!--fin modal de boton registar rol-->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tabla-porcentaje" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Porcentaje</th>
          <th>Fecha de Creación</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($porcentaje as $porcentajes)
            <tr>
              <td>{{$porcentajes->id}}</td>
              <td>{{$porcentajes->nombre}}</td>
              <td>{{$porcentajes->descripcion}}</td>
              <td>{{$porcentajes->porcentaje}} %</td>
              <td>{{$porcentajes->created_at}}</td>
              <td class="text-center">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-editar" onclick="Editar('{{$porcentajes->id}}','{{$porcentajes->nombre}}','{{$porcentajes->descripcion}}','{{$porcentajes->porcentaje}}')">
                  <i class="fa fa-pen"></i> Editar
                </button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-eliminar" onclick="Eliminar('{{$porcentajes->id}}','{{$porcentajes->nombre}}')">
                  <i class="fa fa-times"></i> Eliminar
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.card -->
<script type="text/javascript">
//iniciacion de tablas de pais
$(function () {
   $("#tabla-porcentaje").DataTable({
    "responsive": true,
    "autoWidth": true,
    language: {
        search: "Buscar",
        "lengthMenu":"Filtrar _MENU_ numero de filas",
         "info": "pagina _PAGE_ de _PAGES_",
         "infoFiltered": "(resultados encontrado de _MAX_ en total)",
         paginate: {
            first:      "Premier",
            previous:   "anterior",
            next:       "Siguiente",
            last:       "Dernier"
        }
    }

    });

   // Autoenfoque para los campos inputs de los modals
   $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>