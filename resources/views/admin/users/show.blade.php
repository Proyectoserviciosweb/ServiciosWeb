<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="{{ route('dashboard') }}">
            <button class="btn btn-success">Volver al crud</button>
        </a>
    </header>
    <ul class="list-group list-group-flush mx-auto" style="max-width: 400px;">
        <li class="list-group-item"><strong>Nombre del usuario: </strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email del usuario: </strong> {{ $user->email }}</li>
    </ul>
    @if ($user->posts->isNotEmpty())
    <table class="table table-bordered table-striped table-hover mx-auto">
        <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">texto</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
            <tr>
                <td class="text-center">{{ $post->id }}</td>
                <td class="text-center">{{ $post->titulo }}</td>
                <td class="text-center">{{ $post->texto }}</td>
                <td class="text-center">

                    <button type="button" class="btn btn-primary btn-danger mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $post->id }}">
                        Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"">
                                <div class=" modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de eliminar el post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <form id="deleteForm" action="{{ route('admin.post.delete', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>


                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    @else
    <p>El usuario no tiene post</p>
    @endif
</body>

</html>