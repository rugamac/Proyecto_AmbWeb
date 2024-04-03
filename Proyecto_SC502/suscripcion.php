<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Usaurios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Gestión de Usaurios</h1>
    <div class="btn-group">
      <button class="btn btn-primary" id="agregarRol">Agregar Rol</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Acciones</th>
        </tr>
      </thead>
    </table>
  </div>

  <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUsuarioLabel">Agregar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formusuario">
            <input type="hidden" id="usuarioId">
            <div class="form-group">
              <label for="rolNombre">Nombre del usaurio:</label>
              <input type="text" class="form-control" id="usuarioNombre" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarUsaurio">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var usaurios = [
        { id: 1, nombre: 'Entrenadora' },
        { id: 2, nombre: 'Cliente' }
      ];

      function cargarRoles() {
        var tablaUsuarios = $('#tablaUsaurio');
        tablaUsuarios.empty();
        usaurios.forEach(function(usuario) {
          tablaUsuarios.append('<tr><td>' + usuario.id + '</td><td>' + usuario.nombre + '</td><td><button class="btn btn-primary btn-sm editarUsaurio" data-id="' + usaurio.id + '">Editar</button> <button class="btn btn-danger btn-sm eliminarUsuario" data-id="' + usaurio.id + '">Eliminar</button></td></tr>');
        });
      }
      cargarUsuario();

      $('#agregarUsuario').click(function() {
        $('#modalUsuarioLabel').text('Agregar Usuario');
        $('#usaurioId').val('');
        $('#uasuarioNombre').val('');
        $('#modalUsuario').modal('show');
      });

      $(document).on('click', '.editarUsuario', function() {
        var id = $(this).data('id');
        var usaurio = usaurio.find(function(r) { return r.id === id; });
        $('#modalUsuarioLabel').text('Editar Usaurio');
        $('#usuarioId').val(usuario.id);
        $('#usuarioNombre').val(usuario.nombre);
        $('#modalUsuario').modal('show');
      });

      $('#guardarUsaurio').click(function() {
        var id = $('#usuarioId').val();
        var nombre = $('#usuarioNombre').val().trim();
        if (nombre === '') {
          alert('Por favor, ingresa un nombre para el Usuario.');
          return;
        }
        if (id === '') { 
          var nuevoUsuario = { id: Usuario.length + 1, nombre: nombre };
          usuario.push(nuevoUsuario);
        } else { 
          var index = usuario.findIndex(function(usuario) { return usuario.id === parseInt(id); });
          if (index !== -1) {
            usuario[index].nombre = nombre;
          }
        }
        $('#modalUsuario').modal('hide');
        cargarUsuario();
      });

      $(document).on('click', '.eliminarUsaurio', function() {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
          var id = $(this).data('id');
          usuario = usuario.filter(function(usaurio) { return usaurio.id !== id; });
          cargarUsuario();
        }
      });
    });
  </script>
</body>
</html>