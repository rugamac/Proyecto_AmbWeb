<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Usuarios</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Gestión de Usuarios</h1>
    <div class="btn-group">
      <button class="btn btn-primary" id="agregarUsuario">Agregar Usuario</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Nivel</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tablaUsuarios">
        <!-- Aquí se cargarán los usuarios dinámicamente -->
      </tbody>
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
          <form id="formUsuario">
            <input type="hidden" id="usuarioId">
            <div class="form-group">
              <label for="usuarioNombre">Nombre:</label>
              <input type="text" class="form-control" id="usuarioNombre" required>
            </div>
            <div class="form-group">
              <label for="usuarioApellido">Apellido:</label>
              <input type="text" class="form-control" id="usuarioApellido" required>
            </div>
            <div class="form-group">
              <label for="usuarioNivel">Nivel:</label>
              <select class="form-control" id="usuarioNivel" required>
                <option value="principiante">Principiante</option>
                <option value="intermedio">Intermedio</option>
                <option value="avanzado">Avanzado</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardarUsuario">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var usuarios = [
        { id: 1, nombre: 'Entrenadora', apellido: '1', nivel: 'principiante' },
        { id: 2, nombre: 'Cliente', apellido: '2', nivel: 'intermedio' }
      ];

      function cargarUsuarios() {
        var tablaUsuarios = $('#tablaUsuarios');
        tablaUsuarios.empty();
        usuarios.forEach(function(usuario) {
          tablaUsuarios.append('<tr><td>' + usuario.id + '</td><td>' + usuario.nombre + '</td><td>' + usuario.apellido + '</td><td>' + usuario.nivel + '</td><td><button class="btn btn-primary btn-sm editarUsuario" data-id="' + usuario.id + '">Editar</button> <button class="btn btn-danger btn-sm eliminarUsuario" data-id="' + usuario.id + '">Eliminar</button></td></tr>');
        });
      }
      cargarUsuarios();

      $('#agregarUsuario').click(function() {
        $('#modalUsuarioLabel').text('Agregar Usuario');
        $('#usuarioId').val('');
        $('#usuarioNombre').val('');
        $('#usuarioApellido').val('');
        $('#usuarioNivel').val('principiante');
        $('#modalUsuario').modal('show');
      });

      $(document).on('click', '.editarUsuario', function() {
        var id = $(this).data('id');
        var usuario = usuarios.find(function(u) { return u.id === id; });
        $('#modalUsuarioLabel').text('Editar Usuario');
        $('#usuarioId').val(usuario.id);
        $('#usuarioNombre').val(usuario.nombre);
        $('#usuarioApellido').val(usuario.apellido);
        $('#usuarioNivel').val(usuario.nivel);
        $('#modalUsuario').modal('show');
      });

      $('#guardarUsuario').click(function() {
        var id = $('#usuarioId').val();
        var nombre = $('#usuarioNombre').val().trim();
        var apellido = $('#usuarioApellido').val().trim();
        var nivel = $('#usuarioNivel').val();
        if (nombre === '' || apellido === '') {
          alert('Por favor, ingresa nombre y apellido para el Usuario.');
          return;
        }
        if (id === '') { 
          var nuevoUsuario = { id: usuarios.length + 1, nombre: nombre, apellido: apellido, nivel: nivel };
          usuarios.push(nuevoUsuario);
        } else { 
          var index = usuarios.findIndex(function(u) { return u.id === parseInt(id); });
          if (index !== -1) {
            usuarios[index].nombre = nombre;
            usuarios[index].apellido = apellido;
            usuarios[index].nivel = nivel;
          }
        }
        $('#modalUsuario').modal('hide');
        cargarUsuarios();
      });

      $(document).on('click', '.eliminarUsuario', function() {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
          var id = $(this).data('id');
          usuarios = usuarios.filter(function(u) { return u.id !== id; });
          cargarUsuarios();
        }
      });
    });
  </script>
</body>
</html>