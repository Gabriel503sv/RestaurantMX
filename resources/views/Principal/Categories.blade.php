@extends('Principal.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap border-0 pb-0">
                        <div class="me-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Crear Categorias</h4>

                        </div>
                        <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Crear Categorias</button>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Categorias</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 text-dark text-center was-validated"
                                        action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"
                                        class="m-auto  w-form">
                                        @csrf
                                        <div class="col-md-6 mb-3">
                                            <label for="validationText" class="form-label">Nombre de la categoria</label>
                                            <input name="nombre" type="text" class="border-dark form-control"
                                                id="validationText" placeholder="Ingrese un nombre role" required>
                                            <div class="invalid-feedback">
                                                por favor ingrese un nombre
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationTextarea" class="form-label">descripcion de la
                                                categoria</label>
                                            <textarea name="descripcion" class="form-control" id="validationTextarea" placeholder="Required example textarea"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Por favor ingrese un mensaje en el área de texto.
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label">Imagen</label>
                                            <div class="input-group mb-3">
                                                <input name="portada" type="file" accept="image/*" class="form-control"
                                                    id="inputGroupFile02" required>
                                                <label class="input-group-text" for="inputGroupFile02">Subir</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">status</label>
                                            <input name="status" type="text" class="border-dark form-control"
                                                id="validationText" placeholder="Ingrese un status" required>
                                            <div class="invalid-feedback">
                                                Por favor ingrese un status.
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
                                    <th scope="col">nombre</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">status</th>
                                    <th scope="col">portada</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $category->nombre }}</td>
                                        <td>{{ $category->descripcion }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td><img src="https://restauntemx-bucket-s3.s3.amazonaws.com/{{ $category->portada }}"
                                                style="width: 100px; height: 100px;"></td>
                                        <td>
                                            <div class="row gx-3">
                                                <div class="col">
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        style="width: 100%" class="btn btn-success  mb-3"><i
                                                            class='bx bxs-edit-alt'></i></a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" class="formulario-eliminar"
                                                        action="{{ route('category.destroy', $category->id) }}">
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
                'Categoria Agregado correctamente.',
                'success'
            )
        </script>
    @elseif (session('agregado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Categoria no se pudo agregar',
                'error'
            )
        </script>
    @endif
    @if (session('eliminado') == 'SI')
        <script>
            Swal.fire(
                'Eliminado',
                'Categoria eliminado correctamente.',
                'success'
            )
        </script>
    @elseif (session('eliminado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Categoria No pudo ser eliminado ',
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
                confirmButtonText: 'Si, Eliminar!'
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
