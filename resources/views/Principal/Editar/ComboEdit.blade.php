@extends('Principal.Editar.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card p-5">
                    <form class="row g-3 text-dark text-center was-validated"
                        action="{{ route('combos.update', $combo->id) }}" method="POST" enctype="multipart/form-data"
                        class="m-auto  w-form ">
                        @method('PUT')
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="validationText" class="form-label">Nombre de la categoria</label>
                            <input name="nombre" type="text" value="{{ @old('name') ?? $combo->nombre }}" class="border-dark form-control" id="validationText"
                                placeholder="Ingrese un nombre" required>
                            <div class="invalid-feedback">
                                por favor ingrese un nombre
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTextarea" class="form-label">descripcion de la
                                categoria</label>
                            <textarea name="descripcion" class="form-control" id="validationTextarea" placeholder="Required example textarea"
                                required>{{ $combo->descripcion }}</textarea>
                            <div class="invalid-feedback">
                                Por favor ingrese un mensaje en el área de texto.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault04" class="form-label">Categoria</label>
                            <select name="id_categories" class="form-select" id="validationDefault04" required>
                                <option value="">{{$combo->categories->nombre}}</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio</label>
                            <input id="validationText"  name="precio" value="{{ @old('name') ?? $combo->precio }}" type="number" min="0" max="10000"
                                class="border-dark form-control" required>
                            <div class="invalid-feedback">
                                Por favor ingrese un precio.
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Imagen</label>
                            <div class="input-group mb-3">
                                <input name="imagen" type="file" accept="image/*" class="form-control form-control-lg"
                                    id="inputGroupFile02"readonly disabled>
                                <label class="input-group-text" for="inputGroupFile02">Subir</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">status</label>
                            <select name="status" type="text"  class="border-dark form-control" id="validationText" required>
                                <option value="">{{ @old('name') ?? $combo->status }}</option>
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
                'combo Actualizado correctamente.',
                'success'
            )
        </script>
    @elseif (session('Actualizado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'combo no se pudo Actualizar',
                'error'
            )
        </script>
    @endif
@endsection
