@extends('Principal.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    
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