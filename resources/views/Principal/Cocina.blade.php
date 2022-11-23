@extends('Principal.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row invoice-card-row">

                @foreach ($pedidos as $pedido)
                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <a href="{{ route('pedido.show', $pedido->id) }}">
                            <div class="card bg-warning invoice-card">
                                <div class="card-body d-flex">
                                    <div class="icon me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                            <path
                                                d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zm-5.45 8.16a1 1 0 0 0-.55.9V20H9v-.94a1 1 0 0 0-.55-.9A8 8 0 0 1 4.06 12h15.88a8 8 0 0 1-4.39 6.16zM9 9V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.53 4.53 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.53 4.53 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.53 4.53 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z">
                                            </path>
                                        </svg>

                                    </div>
                                    <div>
                                        <h2 class="text-white invoice-num">PEDIDO: {{ $pedido->id }}</h2>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Enviado') == 'SI')
        <script>
            Swal.fire(
                'Enviado',
                'Pedido Enviado correctamente.',
                'success'
            )
        </script>
    @elseif (session('Enviado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Pedido No pudo ser Enviado ',
                'error'
            )
        </script>
    @endif
@endsection
