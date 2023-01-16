@extends('layouts.main')

@section('container')
<h1 class="app-page-title">Edit Menu</h1>
<form class="settings-form" action="/menu/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3 settings-section">
        <div class="col-12 col-md-4 picture-container" style="display: flex; flex-direction: column; justify-content: center;">
            <img src="{{ asset('storage/'.$menu->picture) }}" alt="" class="img-fluid picture-preview">
            <input type="file" id="select-picture">
            <div class="black-screen">{{ $menu->picture }} <p> click to change </p></div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings p-4">
                <div class="app-card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Product</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $menu->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ old('price', number_format($menu->price,0,',','.') )}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="catgory" id="category">
                            @if ( old('category', $menu->category) == 'food' )
                                <option value="food" selected >Food</option>
                                <option value="drink">Drink</option>
                            @else
                                <option value="food">Food</option>
                                <option value="drink" selected>Drink</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            @if ( old('status', $menu->status) == 'ready' )
                                <option value="ready" selected >Ready</option>
                                <option value="sold">Sold</option>
                            @else
                                <option value="ready">Ready</option>
                                <option value="sold" selected>Sold</option>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn app-btn-info" >Save Changes</button>
                    <a href="/menu/" class="btn app-btn-warning" role="button">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    const select_picture = document.getElementById('select-picture');
    const input_picture = document.getElementById('input-picture');
    const picture_preview = document.querySelector('.picture-preview');
    const black_screen = document.querySelector('.black-screen');
    const price = document.getElementById('price');

    select_picture.addEventListener('change', function () {
        const files = select_picture.files[0];
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            picture_preview.src = this.result;
            black_screen.innerHTML = `${files.name} <p> click to change </p>`
        });
    })
    
</script>
<script src="/js/formatmoney.js"></script>
@endsection