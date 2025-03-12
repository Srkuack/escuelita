<!DOCTYPE html>
<html>
<head>
    <title>Registrar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
    </body>
    <div class="container mt-4">
        <h1>Registrar Nuevo Alumno</h1>
        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" required>
                @error('correo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                @error('fecha_nacimiento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}" required>
                @error('ciudad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary mt-3">Inicio</a>
    </div>
</body>
</html>