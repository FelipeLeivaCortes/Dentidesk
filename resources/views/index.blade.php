@extends('template')

@section('content')
    @include('resources.alerts')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <h4 class="text-gray">Resumen</h4>
                </div>

                <div class="col d-flex justify-content-end">
                    <div class="mt-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" title="Registrar un ingreso o un egreso">
                            <i class="fas fa-plus-circle"></i> Registrar Movimiento
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Total Ingresos</h5>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-success"><strong>${{$incomes}}</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Total Egresos</h5>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center text-danger"><strong>${{$expenses}}</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Total</h5>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center {{$incomes - $expenses < 0 ? 'text-danger' : 'text-success'}}">
                                <strong>${{$incomes - $expenses}}</strong>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: -10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div> --}}
        
        
        </div>
    </div>


    <!-- MODAL TO REGISTER A MOVEMENT -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Movimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {!! Form::open(['route' => ['transactions.store']]) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('type', 'Tipo', ['class' => 'form-label']) !!}
                            <select name="type" class="form-control" required>
                                <option value="" disabled selected>Seleccione un tipo de movimiento</option>
                                @foreach ($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Monto', ['class' => 'form-label']) !!}
                            {!! Form::text('amount', null, ['class' => 'form-control',
                                                            'placeholder' => 'Ingrese el monto de la transacción',
                                                            'required' => 'required']) !!}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection