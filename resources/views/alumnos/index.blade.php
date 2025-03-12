<!DOCTYPE html>
<html>
<head>
    <title>Listado de alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"> 
</head>
<body class="bg-primary-subtle">
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('alumnos.index') }}" class="nav-link px-2 text-secondary">Inicio</a></li>
                    <li><a href="{{ route('alumnos.create') }}" class="nav-link px-2 text-white">Registrar</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container mt-4 p-4 bg-white rounded shadow">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="display-4 text-center text-dark fw-bold">Lista de Alumnos</h1>

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Ciudad</th>
                    <th colspan="3" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->correo }}</td>
                        <td>{{ $alumno->fecha_nacimiento }}</td>
                        <td>{{ $alumno->ciudad }}</td>
                        <td><button class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('alumnos.edit', $alumno) }}'">Editar</button></td>
                        <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
