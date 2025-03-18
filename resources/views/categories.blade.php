<x-layout title="All Categories">
    <div class="container categories my-5">
        <div class="row justify-content-around align-items-center">
            <div class="col-12 mb-5">
                <h2>Popular Categories</h2>
            </div>

            @foreach ($categories as $category)
            <div class="col-6 col-md-3 col-lg-3 text-center my-3">
                <a href="{{ route('category.recipes', ['category' => $category->id]) }}">
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" alt="{{ $category->name }}" class="img-fluid rounded-circle p-1">
                    <h3>{{ $category->name }}</h3>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>