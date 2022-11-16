@extends('template')

@section('content')
    @include('resources.alerts')

    <div class="card bg-light">
        <div class="card-body">

            <!-- Búsqueda de transacciones -->
            <section>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-gray">Filtrar Búsqueda</h4>
                    </div>
            
                    <div class="card-body">
                        {!! Form::open(['route' => 'transactions.get_transactions']) !!}
                            <div class="form-group">
                                {!! Form::label('year', 'Seleccione Año', ['class' => 'form-label']) !!}
                                <select name="year" class="form-control" required>
                                    <option value="" disabled selected>Seleccione un año</option>
            
                                    @foreach ($years as $year)
                                        <option value="{{$year->year}}">{{$year->year}}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('month', 'Seleccione Mes', ['class' => 'form-label']) !!}
                                <select name="month" class="form-control" required>
                                    <option value="" disabled selected>Seleccione un mes</option>
            
                                    @foreach ($months as $month)
                                        <option value="{{$month}}">{{$month}}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div class="form-group mt-4">
                                {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>

            <!-- Resultados de la búsqueda -->
            <section>
                @if (session('transactions'))
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4 class="text-gray">Resultados de la búsqueda</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped responsiveTabl">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th colspan="2">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total  = 0;
                                    @endphp

                                    @foreach (session('transactions') as $transaction)
                                        @php
                                            $total  = $transaction->type == \App\Models\Transaction::INCOME ? $total + $transaction->amount : $total - $transaction->amount;
                                        @endphp

                                        <tr class="{{ $transaction->type == App\Models\Transaction::INCOME ? 'table-success' : 'table-danger'}}">
                                            <td>{{$transaction->id}}</td>
                                            <td>{{date("d/m/Y", strtotime($transaction->date))}}</td>
                                            <td>{{$transaction->type}}</td>
                                            <td>${{$transaction->amount}}</td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-warning" href="{{route('transactions.edit', $transaction)}}">Editar</a>
                                            </td>
                                            <td width="10px">
                                                {!! Form::open(['route' => ['transactions.destroy', $transaction], 'class' => 'deleteTransaction']) !!}
                                                    @method('delete')
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm',
                                                                                    'title' => 'Eliminar esta transacción']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div>
                                <p>Resumen de transacciones: ${{$total}}</p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <small>* NOTA: Los registros no se deberian editar ni eliminar, no obstante, se incluyeron ambas opciones para demostrar
                                la efectividad del controlador.
                            </small>
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/confirm_action.js')}}" defer></script>
    {{-- <script src="{{asset('js/auto_datatable.js')}}"></script> --}}
@endsection