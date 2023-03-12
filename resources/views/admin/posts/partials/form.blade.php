<div class="container">
    <form action=" {{ route($route, $post->id) }} " method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <h5 class="mb-3">
        Author: <span class="fw-semibold">{{ Auth::user()->name }} </span>
        </h5>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-control" id="post_category" name="type_id" >
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ old('type_id', $post->type_id) ==  $type->id ? 'selected' : '' }}>
                        <span >
                            {{ $type->name }}
                        </span>
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 tags d-flex align-items-center justify-content-between">
            @foreach ($technologies as $tech)
            <div class="single-tag d-flex align-items-center">
                <input type="checkbox" class="form-check-input" name="technologies[]" value="{{ $tech->id }}"
                @if ($errors->any())
                    @checked(in_array($tech->id, old('technologies',[])))
                @else
                    @checked($post->technologies->contains($tech->id))
                @endif>
                <label class="form-check-label ms-2">{{ $tech->name }}</label>
            </div>
            @endforeach
        </div>
        
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control" placeholder="add title" name="title" value="{{ old('title') ?? $post->title  }}">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Testo</label>
            <textarea class="form-control" placeholder="Leave a content here" name="content">{{ $post->content ?? old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" class="form-control" placeholder="add date" name="post_date" value="{{ old('post_date') ?? $post->post_date }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Carica una foto</label>
            <input class="form-control" type="file" id="formFile" name="image_path" value="{{ old('image_path') ?? $post->image_path }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ $route == 'admin.posts.update' ? 'Modifica post' : 'Crea un nuovo post'  }}</button>
    </form>
</div>