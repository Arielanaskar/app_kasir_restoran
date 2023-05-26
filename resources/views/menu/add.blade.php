@extends('layouts.main')

@section('container')
    <h1 class="app-page-title mb-4">Add New Menu</h1>
    <div class="col-lg-8">
        <form action="/menu" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name-product" class="form-label">Name Product</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-product" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="modal" class="form-label">Modal</label>
                <input type="text" class="form-control @error('modal') is-invalid @enderror" id="modal" name="modal" value="{{ old('modal') }}" required>
                @error('modal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                    <option selected disabled hidden>- select category -</option>
                    <option value="food"  @if (old('category') == "food") {{ 'selected' }} @endif >Food</option>
                    <option value="drink"  @if (old('category') == "drink") {{ 'selected' }} @endif >Drink</option>
                    <option value="dessert"  @if (old('category') == "dessert") {{ 'selected' }} @endif >Dessert</option>
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                <trix-editor input="description"></trix-editor>
            </div>
            <div class="mb-3">
                <label class="form-label" for="img">Upload Image</label>
                @error('image')
                    <p class="small text-danger">{{ $message }}</p>
                @enderror
                <div class="img-area">
                    <img class="img-preview">
                    <input type="file" id="img" class="select-image" name="image">
                    <div class="view-path-img" data-path="false">
                        <h3>Upload Image</h3>
                        <p>Image size must be less than <span>2MB</span></p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button class="btn-submit btn btn-primary" type="submit">Add to Menu</button>
            </div>
        </form>
    </div>
    <script>
        const img = document.getElementById('img');
        const img_preview = document.querySelector('.img-preview');
        const view_path_img = document.querySelector('.view-path-img');
        const select_image = document.querySelector('.select-image');
        
        img.addEventListener('change', function() {
            const files = img.files[0];
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                img_preview.src = this.result;
                img_preview.style.opacity = '1';
                view_path_img.innerHTML = ` <h3>${files.name}</h3> <p>click to change</p>`;
                view_path_img.setAttribute('data-path','true');
            });
        })

    </script>
    <script src="/js/formatmoney.js"></script>
@endsection

