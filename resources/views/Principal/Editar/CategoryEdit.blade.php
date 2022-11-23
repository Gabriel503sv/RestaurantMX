@extends('Principal.Editar.Plantilla.index')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12">
                <div class="card p-5">
                    <form class="row g-3 text-dark text-center was-validated"
                        action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                        class="m-auto  w-form ">
                        @method('PUT')
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label for="validationText" class="form-label">Nombre de la categoria</label>
                            <input name="nombre" type="text" class="border-dark form-control" id="validationText"
                                placeholder="Ingrese un nombre role" value="{{ @old('name') ?? $category->nombre }}"
                                required>
                            <div class="invalid-feedback">
                                por favor ingrese un nombre
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTextarea" class="form-label">descripcion de la
                                categoria</label>
                            <textarea name="descripcion" class="form-control" id="validationTextarea" placeholder="Required example textarea"
                                required>{{ @old('name') ?? $category->descripcion }}</textarea>
                            <div class="invalid-feedback">
                                Por favor ingrese un mensaje en el área de texto.
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Imagen</label>
                            <div class="input-group mb-3">
                                <input name="portada" type="file" accept="image/*" class="form-control"
                                    id="inputGroupFile02" readonly disabled >
                                <label class="input-group-text" for="inputGroupFile02">Subir</label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">status</label>
                            <select name="status" type="text" class="border-dark form-control" id="validationText" required>
                                <option value="{{ @old('name') ?? $category->status }}">{{ @old('name') ?? $category->status }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor ingrese un status.
                            </div>
                        </div>


                        <div class="d-grid gap-2 col-4 mx-auto">
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
                'Categoria Actualizado correctamente.',
                'success'
            )
        </script>
    @elseif (session('Actualizado') == 'NO')
        <script>
            Swal.fire(
                'Error',
                'Categoria no se pudo Actualizar',
                'error'
            )
        </script>
    @endif
  
   
@endsection
