<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <a href="{{ route('dashboard') }}">
        <button class="btn btn-success mt-3 mb-3">Volver al crud</button>
    </a>
    <h1 class="text-center">Crear usuario</h1>

    <form action="{{ route('admin.registro.user') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label mt-3 mb-3">Nombre</label>
            <input type="text" name="name" class="form-control mt-3 mb-3">
        </div>

        <div class="form-group">
            <label for="email" class="form-label mt-3 mb-3">Correo</label>
            <input type="email" name="email" class="form-control mt-3 mb-3">
        </div>

        <div class="form-group">
            <label for="password" class="form-label mt-3 mb-3">Contraseña</label>
            <input type="password" name="password" class="form-control mt-3 mb-3">
        </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3 mb-3">Ingresar usuario</button>
        </div>
    </form>  
</body>

</html>