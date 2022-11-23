@extends('Principal.Editar.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="d-grid gap-2 d-md-block">
                    <a href="{{ route('envio') }}" class="btn btn-primary" type="button">Volver</a>
                </div>
                <div class="card p-5 m-5">
                    <div class="app-title">
                        <div>
                            <h1><i class="fa fa-file-text-o"></i> </h1>
                        </div>

                    </div>
                    <?php   $subtotal = 0; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">

                                <section id="sPedido" class="invoice">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <h2 class="page-header"></h2>
                                            <h2 class="page-header"><img
                                                    src="https://scontent.fsal1-1.fna.fbcdn.net/v/t39.30808-6/291977101_446205304181726_6982755098257372885_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=7oiHNf7jzhQAX8yIzsQ&_nc_ht=scontent.fsal1-1.fna&oh=00_AfDUEtiUY-gViBC2DyNSWX-r047GsUPA-65cjL7DlWfo8g&oe=6383318C"
                                                    width="200px" height="200px"></h2>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="text-right">Fecha: {{ $pedido->fecha }}</h5>
                                        </div>
                                    </div>
                                    <div class="row invoice-info">
                                        <div class="col-4">
                                            <address><strong>COCHE EL NEGRO</strong><br>
                                                DIRECCION: 2Av sur Usulutan <br>
                                                TELEMPRESA: 4649-4512 <br>
                                                EMAIL_EMPRESA: CocheELNegro@gmail.com <br>
                                                WEB_EMPRESA: www.CocheELNegro.com <br>
                                            </address>
                                        </div>
                                        <div class="col-4">
                                            <address><strong>{{ $pedido->id_usuario }}</strong><br>
                                                Envío: {{ $pedido->direccion_envio }}<br>
                                                Tel: <br>
                                                Email:
                                            </address>
                                        </div>
                                        <div class="col-4"><b>Orden #{{ $pedido->id }}</b>

                                            <b>Transacción: {{ $pedido->tipopagos->tipopago }} <br>
                                                <b>Estado:</b> cancelado <br>
                                                <b>Monto:</b> {{ $pedido->monto }}
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <th class="text-right">Precio</th>
                                                        <th class="text-center">Cantidad</th>
                                                        <th class="text-right">Importe</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detalles as $detalle)
                                                        <?php  $subtotal += $detalle->cantidad * $detalle->precio ?>
                                                        <tr>
                                                            <td>{{ $detalle->combos->nombre }}</td>
                                                            <td class="text-right">{{ $detalle->precio }}</td>
                                                            <td class="text-center">{{ $detalle->cantidad }}</td>
                                                            <td class="text-right">{{ $detalle->cantidad * $detalle->precio }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Sub-Total:</th>
                                                        <td class="text-right">{{($subtotal )}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Envío:</th>
                                                        <td class="text-right">{{($pedido->costo_envio)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Total: </th>
                                                        <td class="text-right">{{$pedido->monto}}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right"><a class="btn btn-primary"
                                                href="javascript:window.print('#sPedido');"><i class="fa fa-print"></i>
                                                Imprimir</a></div>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('Enviado') }}" method="POST" class="m-auto row g-3 formulario-eliminar">
                    @csrf
                    <div class="col-md-12">

                        <input name="pedido" value="{{ @old('name') ?? $pedido->id }}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" type="hidden" required>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto mt-3">
                        <button type="submit text-center" class="btn  btn-primary  "
                            style="--bs-btn-opacity: .5;">Finalizar</button>
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
                title: '¿Orden Finalizada?',
                text: "Finalizar pedido",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Finalizar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
