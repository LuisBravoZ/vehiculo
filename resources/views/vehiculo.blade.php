<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Creacion y listado de vehiculos</title>
    <link rel="stylesheet" href="{{ asset('css/StyleVehiculo.css') }}">
</head>

<body>
    <h2>Vehiculos</h2>

    <!-- Formulario para Crear un vehiculo -->
    <div class="formcrear">
        <form action=""{{ route('store.vehiculo') }}"" method="post">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre_vehiculo" required>
            <label>Descripción:</label>
            <input type="text" name="descripcion" required>
            <button type="submit">Ingresar Vehiculo</button>
        </form>
    </div>
    <!-- tabla lista los vehiculos -->
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculo as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->nombre_vehiculo }}</td>
                    <td>{{ $vehiculo->descripcion }}</td>
                    <td>
                        <!-- Botón de Actualización -->
                        <button
                            onclick="editarVehiculo({{ $vehiculo->id }}, '{{ $vehiculo->nombre_vehiculo }}', '{{ $vehiculo->descripcion }}')">Editar</button>

                        <!-- Botón de Eliminación -->
                        <form method="POST" action="{{ route('destroy.vehiculo', $vehiculo->id) }}"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('¿Estás seguro de eliminar este vehiculo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Formulario Modal para Actualizar un vehiculo -->
    <div id="editFormContainer" style="display:none;">
        <h2>Editar vehiculo</h2>
        <form id="editForm" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <label>Nombre:</label>
            <input type="text" name="nombre_vehiculo" id="editNombre" required>
            <label>Descripción:</label>
            <input type="text" name="descripcion" id="editDescripcion" required>
            <button type="submit">Actualizar Vehiculo</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>

    </div>

    <script>
        // Función para editar un producto
        function editarVehiculo(id, nombre, descripcion) {
            document.getElementById('editFormContainer').style.display = 'block';
            const editForm = document.getElementById('editForm');

            // Configura la URL de acción con la ruta correcta
            editForm.action = `{{ url('/api/vehiculo') }}/${id}`;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editDescripcion').value = descripcion;
        }


        // Función para cancelar la edición y ocultar el formulario
        function cancelarEdicion() {
            document.getElementById('editFormContainer').style.display = 'none';
        }
    </script>
</body>

</html>
