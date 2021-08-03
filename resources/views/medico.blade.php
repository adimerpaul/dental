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
                            @foreach($medicos as $medico)
                                <tr>
                                    <td>{{$medico->id}}</td>
                                    <td>{{$medico->nombre}}</td>
                                    <td>{{$medico->ci}}</td>
                                    <td>{{$medico->fechanac}}</td>
                                    <td>{{$medico->genero}}</td>
                                    <td>{{$medico->telefono}}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modificar"
                                                    data-id="{{$medico->id}}"
                                                    data-nombre="{{$medico->nombre}}"
                                                    data-ci="{{$medico->ci}}"
                                                    data-fechanac="{{$medico->fechanac}}"
                                                    data-genero="{{$medico->genero}}"
                                                    data-telefono="{{$medico->telefono}}"
                                                    data-especialidad="{{$medico->especialidad}}"
                                                    data-direccion="{{$medico->direccion}}"
                                                    data-turno="{{$medico->turno}}"
                                            > <i class="fa fa-edit"></i> Modificar</button>
                                            {{--                                        <button class="btn btn-warning btn-sm">Modificar</button>--}}
                                            <form action="medico/{{$medico->id}}" method="post" style="margin: 0px">
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
                                        <form id="formulario" method="post" action="/medico">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="nombre2" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre2" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ci2" class="col-sm-2 col-form-label">ci o nit</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="ci2" placeholder="ci" name="ci">
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
                                                <label for="especialidad2" class="col-sm-2 col-form-label">Ocupacion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="especialidad2" placeholder="Ocupacion" name="especialidad">
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
                                            <div class="form-group row">
                                                <label for="turno2" class="col-sm-2 col-form-label">Genero</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="turno" id="turno2" value="Mañana" >
                                                    Mañana
                                                    <input type="radio" name="turno" id="turno3" value="Tarde" >
                                                    Tarde
                                                    <input type="radio" name="turno" id="turno4" value="Noche" >
                                                    Noche
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
                                        <form method="post" action="/medico">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ci" class="col-sm-2 col-form-label">ci o nit</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="ci" placeholder="ci" name="ci">
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
                                                <label for="especialidad" class="col-sm-2 col-form-label">especialidad</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="especialidad" placeholder="especialidad" name="especialidad">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telefono" placeholder="telefono" name="telefono">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="direccion" placeholder="direccion" name="direccion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="turno" class="col-sm-2 col-form-label">Turno</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="turno" id="opciones_1" value="Mañana" checked>
                                                    Mañana
                                                    <input type="radio" name="turno" id="opciones_2" value="Tarde" >
                                                    Tarde
                                                    <input type="radio" name="turno" id="opciones_3" value="Noche" >
                                                    Noche
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
            $('#ci2').val(button.data('ci'))
            $('#fechanac2').val(button.data('fechanac'))
            $('#telefono2').val(button.data('telefono'))
            $('#especialidad2').val(button.data('especialidad'))
            $('#direccion2').val(button.data('direccion'))

            if (button.data('genero')=='Masculino'){
                $('#genero2').attr('checked',true)
            }else {
                $('#genero3').attr('checked',true)
            }
            if(button.data('turno')=='Mañana'){
                $('#turno2').attr('checked',true)
            }else if(button.data('turno')=='Tarde'){
                $('#turno3').attr('checked',true)
            }else{
                $('#turno4').attr('checked',true)
            }

            {{--data-nombre="{{$medico->nombre}}"--}}
            {{--data-cinit="{{$medico->cinit}}"--}}
            {{--data-fechanac="{{$medico->fechanac}}"--}}
            {{--data-genero="{{$medico->genero}}"--}}
            {{--data-telefono="{{$medico->telefono}}"--}}
            {{--data-ocupacion="{{$medico->ocupacion}}"--}}
            {{--data-direccion="{{$medico->direccion}}"--}}

            $('#formulario').prop('action','/medico/'+id)

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('  Paciente ' + nombre)
            // modal.find('.modal-body input').val(recipient)
        })
    }
</script>
