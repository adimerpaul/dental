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
                                <th>cinit</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->cinit}}</td>
                                <td>
                                    <div class="btn btn-group">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modificar"
                                                data-nombre="{{$paciente->nombre}}"
                                                data-cinit="{{$paciente->cinit}}"
                                                data-id="{{$paciente->id}}"
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
                                        <form method="post" id="formulario" action="/paciente">
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
                                                    <input type="time" class="form-control" id="fechanac" placeholder="fechanac" name="fechanac">
                                                </div>
                                                
                                            </div>
                                            <div class="radio">
                                                <label>
                                                  <input type="radio" name="opciones" id="opciones_1" value="opcion_1" checked>
                                                  Masculino
                                                </label>
                                                <label>
                                                    <input type="radio" name="opciones" id="opciones_1" value="opcion_1" checked>
                                                    Femenino
                                                  </label>
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
                                                    <input type="number" class="form-control" id="telefono" placeholder="telefono" name="telefono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cinit" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="direccion" placeholder="direccion" name="direccion">
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