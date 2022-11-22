@extends('Principal.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap border-0 pb-0">
                        <div class="me-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Crear Usuario</h4>
                        </div>
                        <button type="button" class="btn btn-rounded btn-md btn-primary me-3 me-3" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Crear Usuario</button>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear Usuario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="row g-3 text-dark text-center" action="" method="POST"
                                        class="m-auto  w-form">
                                        @csrf
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                            <input name="name" type="text" class="border-dark form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" required
                                                min="30">
                                            @error('name')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                            <input name="email" type="email" class="border-dark form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            @error('email')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                            <input name="password" type="password" class="border-dark form-control"
                                                id="exampleInputPassword1" required>
                                            @error('password')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Confirmar
                                                contraseña</label>
                                            <input name="password_confirmation" type="password"
                                                class="border-dark form-control" id="exampleInputPassword1">
                                            @error('password_confirmation')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Direccion</label>
                                            <input name="direccion" type="text" class="border-dark form-control"
                                                required>
                                            @error('direccion')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault04" class="form-label">Role</label>
                                            <select name="id_roles" class="form-select" id="validationDefault04" required>
                                                <option value="">Seleccione una Role</option>
                                                @foreach ($roles as $key => $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->nombre_rol }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Telefono</label>
                                            <input name="telefono" type="tel" pattern="[0-9]{4}-[0-9]{4}"
                                                class="border-dark form-control" required>
                                            <small class=" text-red">Formato: ****-****</small><br><br>
                                            @error('telefono')
                                                <small class="text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status</label>
                                            <input name="status" type="text" class="border-dark form-control" required>
                                            @error('status')
                                                <small class="border-dark text-danger mt-1">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button type="submit text-center" class="btn  btn-primary  "
                                                style="--bs-btn-opacity: .5;">REGISTRAR</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

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
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">status</th>
                                    <th scope="col">rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->direccion }}</td>
                                        <td>{{ $user->telefono }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->roles->nombre_rol }}</td>

                                        <td>
                                            <div class="row gx-3">
                                                <div class="col">
                                                    <a href="{{ route('user.edit', $user->id) }}" style="width: 100%"
                                                        class="btn btn-success  mb-3"><i class='bx bxs-edit-alt'></i></a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" class="formulario-eliminar"
                                                        action="{{ route('user.destroy', $user->id) }}">
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
    @if (session('agregado') == "SI")
        <script>
            Swal.fire(
                'Agregado',
                'Usuario Agregado correctamente.',
                'success'
            )
        </script>
    @elseif (session('agregado') == "NO")
    <script>
        Swal.fire(
            'Error',
            'Usuario No agregado',
            'error'
        )
    </script>
    @endif
    @if (session('eliminado') == "SI")
        <script>
            Swal.fire(
                'Eliminado',
                'Usuario eliminado correctamente.',
                'success'
            )
        </script>
    @elseif (session('eliminado') == "NO")
    <script>
        Swal.fire(
            'Error',
            'Usuario No pudo ser eliminado ',
            'error'
        )
    </script>
    @endif 

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "Este Usuario se eliminara definitivamente",
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
    <script src="{{ asset('vendor/global/global.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
