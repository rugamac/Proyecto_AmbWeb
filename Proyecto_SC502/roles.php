<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Roles - Entrenadora Física</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Gestión de Roles</h1>
    <div class="btn-group">
      <button class="btn btn-primary" id="agregarRol">Agregar Rol</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class="modal fade" id="modalRol" tabindex="-1" role="dialog" aria-labelledby="modalRolLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRolLabel">Agregar Rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formRol">
            <input type="hidden" id="rolId">
            <div class="form-group">
              <label for="rolNombre">Nombre del Rol:</label>
              <input type="text" class="form-control" id="rolNombre" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarRol">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var roles = [
        { id: 1, nombre: 'Entrenadora' },
        { id: 2, nombre: 'Cliente' }
      ];

      function cargarRoles() {
        var tablaRoles = $('#tablaRoles');
        tablaRoles.empty();
        roles.forEach(function(rol) {
          tablaRoles.append('<tr><td>' + rol.id + '</td><td>' + rol.nombre + '</td><td><button class="btn btn-primary btn-sm editarRol" data-id="' + rol.id + '">Editar</button> <button class="btn btn-danger btn-sm eliminarRol" data-id="' + rol.id + '">Eliminar</button></td></tr>');
        });
      }
      cargarRoles();

      $('#agregarRol').click(function() {
        $('#modalRolLabel').text('Agregar Rol');
        $('#rolId').val('');
        $('#rolNombre').val('');
        $('#modalRol').modal('show');
      });

      $(document).on('click', '.editarRol', function() {
        var id = $(this).data('id');
        var rol = roles.find(function(r) { return r.id === id; });
        $('#modalRolLabel').text('Editar Rol');
        $('#rolId').val(rol.id);
        $('#rolNombre').val(rol.nombre);
        $('#modalRol').modal('show');
      });

      $('#guardarRol').click(function() {
        var id = $('#rolId').val();
        var nombre = $('#rolNombre').val().trim();
        if (nombre === '') {
          alert('Por favor, ingresa un nombre para el rol.');
          return;
        }
        if (id === '') { 
          var nuevoRol = { id: roles.length + 1, nombre: nombre };
          roles.push(nuevoRol);
        } else { 
          var index = roles.findIndex(function(rol) { return rol.id === parseInt(id); });
          if (index !== -1) {
            roles[index].nombre = nombre;
          }
        }
        $('#modalRol').modal('hide');
        cargarRoles();
      });

      $(document).on('click', '.eliminarRol', function() {
        if (confirm('¿Estás seguro de que deseas eliminar este rol?')) {
          var id = $(this).data('id');
          roles = roles.filter(function(rol) { return rol.id !== id; });
          cargarRoles();
        }
      });
    });
  </script>
</body>
</html>