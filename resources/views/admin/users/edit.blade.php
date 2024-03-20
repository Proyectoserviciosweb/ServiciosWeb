<!-- resources/views/admin/users/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <!--
    <link rel="preload" href="/resources/css/vista.css" as="style">
    <link rel="stylesheet" href="/resources/css/vista.css">
-->
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
    <h1 class="text-center">Editar Usuario</h1>
    {!! Form::model($user, ['route'=>['admin.user.update', $user->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nombre', ['class' =>"form-label mt-3 mb-3"]) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control mt-3 mb-3']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Correo', ['class' =>"form-label mt-3 mb-3"]) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control mt-3 mb-3']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Contraseña', ['class' =>"form-label mt-3 mb-3"]) !!}
        {!! Form::password('password', ['class' => 'form-control mt-3 mb-3']) !!}
    </div>

    <div class="text-center">
        {!! Form::submit('Actualizar Usuario' , ['class' => 'btn btn-primary mt-3 mb-3 ']) !!}
        {!! Form::close() !!}
    </div>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

</html>