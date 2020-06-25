// Listar compra
$(document).ready(function() {
  listarCompra();

  // Selectores de busqueda
  $('.select-compra').select2({
    theme: 'bootstrap4',
  });
});
// Poner nombre del archivoi en el campo input
$('.custom-file-input').on('change', function(event) {
  var inputFile = event.currentTarget;
  $(inputFile).parent()
      .find('.custom-file-label')
      .html(inputFile.files[0].name);
});

function listarCompra(){
  $.ajax({
    type:'get',
    url:('listar_compra'),
    success: function(data){
      $('#listarCompra').empty().html(data);
    }
  });
};

// Insertar compra
$('#crearCompra').click(function(e) {
  e.preventDefault();
  const url = 'compra_crear';
  const params = new FormData($('#frmCrearCompra')[0]);
  proccessFunction(url, 'POST', params, callbackStoreCompra, false, false, false);
});

// Llamar el formulario editar compra
function Editar(idCompra){
  $.ajax({
    type:'get',
    url:('editar_compra/'+idCompra),
    success: function(data){
      $('#formulario').empty().html(data);
    }
  });
}

$('#editarElCompra').click(function(e) {
  e.preventDefault();
  var idCompra = $("#idCompra").val();
  var nombre = $("#editarCompra").val();
  var descripcion = $("#descripcionCompraEditar").val();
  const url = 'compra_editar/'+idCompra;
  const params = {'nombre':nombre,'descripcion':descripcion};
  proccessFunction(url, 'PUT', params, callbackStoreCompra);
});

// Eliminar compra
function Eliminar(idCompra, nombreCompra) {
  $("#idCompraEliminar").val(idCompra);
  document.getElementById("idDeCompra").innerHTML = idCompra;
  document.getElementById("nombreDeCompra").innerHTML = nombreCompra;
}

$('#eliminarCompra').click(function(e) {
  e.preventDefault();
  var idCompra = $("#idCompraEliminar").val();
  const url = 'compra_eliminar/'+idCompra;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreCompra);
});


function callbackStoreCompra(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreCompra").val('');
  $("#descripcionCompra").val('');
  $(".close").click();
  listarCompra();
}