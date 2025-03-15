<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <title>Detalle de Alumno</title>
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
    <h1 class="display-4 text-center text-dark fw-bold">Alumno #{{ $alumno->id }} {{ $alumno->nombre }}</h1>
<div class="container mt-4 p-4 bg-white rounded shadow">    
     <ul>
         <li>Nombre: {{ $alumno->nombre }}</li>
         <li>Correo: {{ $alumno->correo }}</li>
         <li>Fecha:  {{ $alumno->fecha_nacimiento }}</li>
         <li>Correo: {{ $alumno->ciudad }}</li>
     </ul>
     <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger" >Eliminar</button>
     </form>
</div>
 </body>
 </html>
 </body>