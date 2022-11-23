@extends('Principal.Editar.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card p-5">
                    <form class="row g-3 text-dark text-center was-validated" action="{{ route('user.update', $user->id) }}"
                        method="POST" enctype="multipart/form-data" class="m-auto  w-form ">
                        @method('PUT')
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input name="name" type="text" class="border-dark form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ @old('name') ?? $user->name }}" required>
                            @error('name')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                            <input name="email" type="email" class="border-dark form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ @old('name') ?? $user->email }}" required>
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
                            <input name="password_confirmation" type="password" class="border-dark form-control"
                                id="exampleInputPassword1">
                            @error('password_confirmation')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Direccion</label>
                            <input name="direccion" type="text" class="border-dark form-control"
                                value="{{ @old('name') ?? $user->direccion }}" required>
                            @error('direccion')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault04" class="form-label">Role</label>
                            <select name="id_roles" class="form-select" id="validationDefault04" required>
                                <option value="">{{ $user->roles->nombre_rol }}</option>
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->nombre_rol }}</option>
                                @endforeach
                            </select>
                            @error('telefono')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telefono</label>
                            <input name="telefono" type="tel" pattern="[0-9]{4}-[0-9]{4}"
                                class="border-dark form-control" value="{{ @old('name') ?? $user->telefono }}" required>
                            <small class=" text-red">Formato: ****-****</small><br><br>
                            @error('status')
                                <small class="border-dark text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">status</label>
                            <select name="status" type="text" class="border-dark form-control" id="validationText"
                                required>
                                <option value="">{{ @old('name') ?? $user->status }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor ingrese un status.
                            </div>
                        </div>


                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit text-center" class="btn  btn-primary  "
                                style="--bs-btn-opacity: .5;">Actualizar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Actualizado') == 'SI')
        <script>
            Swal.fire(
                'Agregado',
                'Usuario Actualizado correctamente.',
                'success'
            )
        </script>
    @elseif (session('Actualizado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Usuario no se pudo Actualizar',
                'error'
            )
        </script>
    @endif
@endsection
