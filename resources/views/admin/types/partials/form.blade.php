<div class="container">
    <form action=" {{ route($route, $type->id) }} " method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <h5 class="mb-3">
            Create a new type:
        </h5>
         
        <div class="container">
            <div class="row">
                <div class="mb-3 col-4 p-0">
                    <label class="form-label text-nowrap m-0 align-middle">Nome tipo:</label>
                    <input type="text" class="form-control" placeholder="add name" name="name" value="{{ old('name') ?? $type->name  }}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-1 d-flex p-0">
                    <label class="form-label">Colore:</label>
                    <input type="color" class="form-control p-1 ms-2" placeholder="add color" name="color" value="{{ old('color') ?? $type->color }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $route == 'admin.types.update' ? 'Modify type' : 'Create the new type'  }}</button>
    </form>
</div>