<x-layout title="Recipes in {{$category->name}}">
    <div class="container">
        <h2 class="my-4">Recipes in {{$category->name}}</h2>
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ Storage::url($recipe->img) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->title }}</h5>
                            <p class="card-text">{!! Str::limit($recipe->body, 100) !!}</p>
                            <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>