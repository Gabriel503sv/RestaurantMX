@extends('Principal.Editar.Plantilla.index')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row invoice-card-row">
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('pedido.index') }}" class="btn btn-primary" type="button">Volver</a>
            </div>
            <h1> PEDIDO: {{ $pedido->id }} </h1>
            @foreach ($detalles as $detalle)
                <div class="col-xl-12 col-xxl-12 col-sm-6">
                    
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
                                    <h5 class="text-white invoice-num">Combo: {{$detalle->combos->nombre}} </h5>
                                    <h4 class="card-title mb-2">Cantidad: {{$detalle->cantidad }}</h4>
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
            <form action="{{ route('pedido.store') }}" method="POST" class="m-auto row g-3 formulario-eliminar">
                @csrf
                <div class="col-md-12">
                    
                    <input name="pedido"  value="{{ @old('name') ?? $pedido->id }}"  class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" type="hidden" required>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto mt-3">
                    <button type="submit text-center" class="btn  btn-primary  "
                        style="--bs-btn-opacity: .5;">Enviar</button>
                </div>
            </form>
            

        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Orden lista?',
                text: "Enviar pedido",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Enviar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection