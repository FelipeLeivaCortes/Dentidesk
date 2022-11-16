@extends('template')

@section('content')
    @include('resources.alerts')

    <div class="card bg-light">
        <div class="card-header">
            <h4 class="text-gray">Editar Transacción #{{$transaction->id}}</h4>
        </div>
        
        <div class="card-body">
            {!! Form::model($transaction, ['route' => ['transactions.update', $transaction], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('type', 'Tipo') !!}
                    <select name="type" class="form-control" required>
                        @foreach ($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('date', 'Fecha') !!}
                    {!! Form::date('date', null, ['class' => 'form-control',
                                                    'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('amount', 'Cantidad') !!}
                    {!! Form::text('amount', $transaction->amount, ['class' => 'form-control',
                                                                    'required' => 'required']) !!}
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" title="Actualizar datos de la transacción" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('transactions.index')}}" title="Volver al inicio" class="btn btn-danger">Volver</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection