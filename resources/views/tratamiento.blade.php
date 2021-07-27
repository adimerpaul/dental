@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tratamientos
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus-circle"></i> Crear tratamiento
                        </button>
                    </div>
                    <div class="card-body">
                        <table border="1" style="width: 100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tratamientos as $tramiento)
                            <tr>
                                <td>{{$tramiento->id}}</td>
                                <td>{{$tramiento->nombre}}</td>
                                <td>{{$tramiento->precio}}</td>
                                <td>
                                    <div class="btn btn-group">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modificar"
                                                data-nombre="{{$tramiento->nombre}}"
                                                data-precio="{{$tramiento->precio}}"
                                                data-id="{{$tramiento->id}}"
                                        > <i class="fa fa-edit"></i> Modificar</button>
{{--                                        <button class="btn btn-warning btn-sm">Modificar</button>--}}
                                        <form action="tratamiento/{{$tramiento->id}}" method="post" style="margin: 0px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> Eliminar</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning ">
                                        <h5 class="modal-title" id="modificarLabel"> <i class="fa fa-edit"></i> Modificar tratamiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="formulario" action="/tratamiento">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="nombre2" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre2" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="precio2" class="col-sm-2 col-form-label">Precio</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="precio2" placeholder="Precio" name="precio">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-warning"> <i class="fa fa-plus-circle"></i> Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus-circle"></i> Crear tratamiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/tratamiento">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="precio" placeholder="Precio" name="precio">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Crear</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    window.onload=function (){
        $('#modificar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var nombre = button.data('nombre')
            var precio = button.data('precio')
            var id = button.data('id')
            $('#nombre2').val(nombre)
            $('#precio2').val(precio)
            $('#formulario').prop('action','/tratamiento/'+id)

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('  Tramiento ' + nombre)
            // modal.find('.modal-body input').val(recipient)
        })
    }
</script>
