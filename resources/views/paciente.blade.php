@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pacientes
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus-circle"></i> Paciente
                        </button>
                    </div>
                    <div class="card-body">
                        <table border="1" style="width: 100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Ci nit</th>
                                <th>Fechanacimiento</th>
                                <th>Genero</th>
                                <th>Telefono</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->cinit}}</td>
                                <td>{{$paciente->fechanac}}</td>
                                <td>{{$paciente->genero}}</td>
                                <td>{{$paciente->telefono}}</td>
                                <td>
                                    <div class="btn btn-group">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modificar"
                                                data-id="{{$paciente->id}}"
                                                data-nombre="{{$paciente->nombre}}"
                                                data-cinit="{{$paciente->cinit}}"
                                                data-fechanac="{{$paciente->fechanac}}"
                                                data-genero="{{$paciente->genero}}"
                                                data-telefono="{{$paciente->telefono}}"
                                                data-ocupacion="{{$paciente->ocupacion}}"
                                                data-direccion="{{$paciente->direccion}}"
                                        > <i class="fa fa-edit"></i> Modificar</button>
{{--                                        <button class="btn btn-warning btn-sm">Modificar</button>--}}
                                        <form action="paciente/{{$paciente->id}}" method="post" style="margin: 0px">
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
                                        <h5 class="modal-title" id="modificarLabel"> <i class="fa fa-edit"></i> Actualizar Datos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formulario" method="post" action="/paciente">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="nombre2" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre2" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cinit2" class="col-sm-2 col-form-label">ci o nit</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="cinit2" placeholder="cinit" name="cinit">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fechanac2" class="col-sm-2 col-form-label">fecha Nacimiento</label>
                                                <div class="col-sm-10">
                                                    <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="fechanac2" placeholder="fechanac" name="fechanac">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="genero2" class="col-sm-2 col-form-label">Genero</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="genero" id="genero2" value="Masculino" >
                                                    Masculino
                                                    <input type="radio" name="genero" id="genero3" value="Femenino" >
                                                    Femenino
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ocupacion2" class="col-sm-2 col-form-label">Ocupacion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="ocupacion2" placeholder="Ocupacion" name="ocupacion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telefono2" class="col-sm-2 col-form-label">Telefono</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telefono2" placeholder="telefono" name="telefono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="direccion2" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="direccion2" placeholder="direccion" name="direccion">
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


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus-circle"></i> Registrar Paciente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/paciente">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cinit" class="col-sm-2 col-form-label">ci o nit</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="cinit" placeholder="cinit" name="cinit">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fechanac" class="col-sm-2 col-form-label">fecha Nacimiento</label>
                                                <div class="col-sm-10">
                                                    <input type="date" value="{{date('Y-m-d')}}" class="form-control" id="fechanac" placeholder="fechanac" name="fechanac">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="genero" id="opciones_1" value="Masculino" checked>
                                                    Masculino
                                                    <input type="radio" name="genero" id="opciones_2" value="Femenino" >
                                                    Femenino
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-2 col-form-label">Ocupacion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" placeholder="Ocupacion" name="ocupacion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cinit" class="col-sm-2 col-form-label">Telefono</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telefono" placeholder="telefono" name="telefono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cinit" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="direccion" placeholder="direccion" name="direccion">
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
            // var precio = button.data('precio')
            var id = button.data('id')
            // $('#nombre2').val(nombre)
            $('#nombre2').val(nombre)
            $('#cinit2').val(button.data('cinit'))
            $('#fechanac2').val(button.data('fechanac'))
            $('#telefono2').val(button.data('telefono'))
            $('#ocupacion2').val(button.data('ocupacion'))
            $('#direccion2').val(button.data('direccion'))

            if (button.data('genero')=='Masculino'){
                $('#genero2').attr('checked',true)
            }else {
                $('#genero3').attr('checked',true)
            }

            {{--data-nombre="{{$paciente->nombre}}"--}}
            {{--data-cinit="{{$paciente->cinit}}"--}}
            {{--data-fechanac="{{$paciente->fechanac}}"--}}
            {{--data-genero="{{$paciente->genero}}"--}}
            {{--data-telefono="{{$paciente->telefono}}"--}}
            {{--data-ocupacion="{{$paciente->ocupacion}}"--}}
            {{--data-direccion="{{$paciente->direccion}}"--}}

            $('#formulario').prop('action','/paciente/'+id)

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('  Paciente ' + nombre)
            // modal.find('.modal-body input').val(recipient)
        })
    }
</script>
