@extends('Principal.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap border-0 pb-0">
                        <div class="me-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Crear role</h4>

                        </div>
                        <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Crear role</button>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear role</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 text-dark text-center was-validated" action="" method="POST"
                                        class="m-auto  w-form">
                                        @csrf
                                        <div class="col-md-6 mb-3">
                                            <label for="validationText" class="form-label">Nombre del role</label>
                                            <input name="nombre_rol" type="text" class="border-dark form-control"
                                                id="validationText" placeholder="Ingrese un nombre role" required>
                                            <div class="invalid-feedback">
                                                por favor ingrese un nombre
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">status</label>
                                            <input name="status" type="text" class="border-dark form-control"
                                                id="validationText" placeholder="Ingrese un status" required>
                                            <div class="invalid-feedback">
                                                Por favor ingrese un status.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationTextarea" class="form-label">descripcion del rol</label>
                                            <textarea name="descripcion_rol" class="form-control" id="validationTextarea" placeholder="Required example textarea"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Por favor ingrese un mensaje en el área de texto.
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button type="submit text-center" class="btn  btn-primary  "
                                                style="--bs-btn-opacity: .5;">REGISTRAR</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-5">
                        <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $role->nombre_rol }}</td>
                                        <td>{{ $role->descripcion_rol }}</td>
                                        <td>{{ $role->status }}</td>
                                        <td>
                                            <div class="row gx-3">
                                                <div class="col">
                                                    <a href="{{ route('role.edit', $role->id) }}" style="width: 100%"
                                                        class="btn btn-success  mb-3"><i class='bx bxs-edit-alt'></i></a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" class="formulario-eliminar"
                                                        action="{{ route('role.destroy', $role->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button style="width: 100%" class="btn btn-danger"><i
                                                                class='bx bxs-trash'></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('agregado') == 'SI')
        <script>
            Swal.fire(
                'Agregado',
                'Role Agregado correctamente.',
                'success'
            )
        </script>
    @elseif (session('agregado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Role no se pudo agregar',
                'error'
            )
        </script>
    @endif
    @if (session('eliminado') == 'SI')
        <script>
            Swal.fire(
                'Eliminado',
                'Role eliminado correctamente.',
                'success'
            )
        </script>
    @elseif (session('eliminado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Role No pudo ser eliminado ',
                'error'
            )
        </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "Este role se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                info: false,
                lengthChange: false,
                responsive: true,
                autoWidth: false,
                oLanguage: {
                    oPaginate: {
                        sNext: '<i class="fas fa-angle-double-right"></i>',
                        sPrevious: '<i class="fas fa-angle-double-left"></i>'
                    }
                },
                lengthChange: false,
                buttons: [{
                    extend: 'csv',
                    split: ['pdf', 'excel'],
                }],
                iDisplayLength: 10,
                pagingType: $(window).width() < 768 ? "simple" : "simple_numbers"
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="{{ asset('vendor/global/global.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
@endsection
