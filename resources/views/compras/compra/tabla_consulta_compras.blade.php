<!-- /.card -->
<div class="content">
  <div class="card">
    <div class="card-header ">
      <h3 class="card-title">Listado de artículos compra</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tablaCompras" class="table table-bordered table-striped w-100">
        <thead class="bg-info">
        <tr>
          <th>ID</th>
          <th>tipo compra</th>
          <th>Usuario</th>
          <th>Forma de pago</th>
          <th>Proveedor</th>
          <th>Anexo</th>
          <th>Total Compra</th>
          <th>descripcion</th>
          <th>Fecha de Compra</th>
          <th width="120px">Acciones</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($compras as $historialCompras)
            <tr>
              <td>{{$historialCompras->id}}</td>
              <td>{{$historialCompras->tipoCompra->nombre}}</td>
              <td>{{$historialCompras->usuario->name.' '.$historialCompras->usuario->apellido}}</td>
              <td>{{$historialCompras->formadepago->nombre}}</td>
              <td>{{$historialCompras->proveedor->nombre}}</td>
              <td>{{$historialCompras->escaner}}</td>
              <td>{{$historialCompras->total_compra}}</td>
              <td>{{$historialCompras->descripcion}}</td>
              <td>{{$historialCompras->created_at}}</td>
              <td>
                <button type="button" class="btn btn-info" id="vermascompra" title="Ver Detalle de Compra" OnClick="vermascompra('{{$historialCompras->id}}')">
                <i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-danger" id="vermascompra" title="Anular Compra" data-toggle="modal" data-target="#modal-anularcompra"
                OnClick="anularcompra('{{$historialCompras->id}}','{{$historialCompras->descripcion}}')">
                <i class="fas fa-ban"></i></button>
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
//iniciacion de tabla artículo compra
$(function () {
  $("#tablaCompras").DataTable({
    "responsive": true,
    "autoWidth": true,
    language: {
      search: "Buscar",
      "lengthMenu":"Filtrar _MENU_ número de filas",
       "info": "Página _PAGE_ de _PAGES_",
       "infoFiltered": "(Resultados encontrado de _MAX_ en total)",
       paginate: {
          first:      "Premier",
          previous:   "Anterior",
          next:       "Siguiente",
          last:       "Dernier"
      }
    },
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]

  });



  // Autoenfoque para los campos inputs de los modals
  $('#modal-crear, #modal-editar').on('shown.bs.modal', function (e) {
    $('.focus').focus();
    });
  });
</script>

