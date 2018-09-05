@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                  </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Nombre de la comida</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">

                            </div>
                        </div>
                         <div class="form-group">
                            <label for="task-descripcion" class="col-sm-3 control-label">Descripcion de la comida</label>

                            <div class="col-sm-6">
                                <input type="text" name="descripcion" id="task-descripcion" class="form-control" value="{{ old('task') }}">

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="task-descripcion" class="col-sm-3 control-label">Calorias</label>

                            <div class="col-sm-6">
                                <input type="number" name="calorias" id="task-calorias" class="form-control" value="{{ old('task') }}">

                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="task-descripcion" class="col-sm-3 control-label">Fecha(000-00-00) y Hora(00:00:00)</label>

                            <div class="col-sm-6">
                                <input type="datetime" name="fecha" id="task-fecha" class="form-control" value="{{ old('task') }}">

                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Comidas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Nombre</th>
                                 <th>Dia y Hora</th>
                                <th>Comida</th>
                                <th>Numero de calorias</th>
                                <th>Hora de creacion</th>



                                <th>&nbsp;</th>
                               
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->fecha }}</div></td>
                                        <td class="table-text"><div>{{ $task->descripcion }}</div></td>
                                        <td class="table-text"><div>{{ $task->calorias }}</div></td>
                                        <td class="table-text"><div>{{ $task->created_at }}</div></td>
                                        









                                        <!-- Task Delete Button -->
                                        <td>
                                            
                                            
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Borrar
                                                </button>
                                            </form>
                                            
                                            <td>
                                            
                                                
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection