<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div>

        <form action="{{Route('admin.user.crear')}}">
            <button class="btn btn-success mb-3 mt-3" type="submit" rel="tooltip">
                <i class="material-icons">Agregar usuario</i></button>
        </form>

        <table class="table table-bordered table-striped table-hover mx-auto ">
            <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">nombre</th>
                    <th class="text-center">correo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>

                            <form action="{{Route('admin.user.edit',$user->id)}}">
                                <button class="btn btn-warning mb-3" type="submit" rel="tooltip">
                                    <i class="material-icons">Editar</i></button>
                            </form>

                            <form action="{{Route('admin.user.show',$user->id)}}">
                                <button class="btn btn-primary mb-3" type="submit" rel="tooltip">
                                    <i class="material-icons">Ver</i></button>
                            </form>

                            <button type="button" class="btn btn-primary btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $user->id }}">
                                Eliminar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"">
                                    <div class=" modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de eliminar el usuario?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form id="deleteForm" action="{{ route('admin.user.delete', $user->id)}}" method="POST">
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
        {{ $users->links() }}
    </div>
</body>

</html>