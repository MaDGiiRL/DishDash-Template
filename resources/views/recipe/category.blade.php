<x-layout title="Recipes in {{$category->name}}">
    <div class="container index">
        <h1 class="my-4 link-red">Recipes in {{$category->name}}</h1>
        <div class="row">
            @foreach($recipes as $recipe)
            <div class="col-4 my-3">
                <div class="card border position-relative">
                    <div class="card-body p-0">
                        <a href="{{route('recipe.show', compact('recipe'))}}">
                            <div class="image-container position-relative">
                                <img src="{{Storage::url($recipe->img)}}" class="card-img-top img-fluid">
                                <div class="recipe-icon">
                                    <h5 class="link-light">Go to the Recipe <i class="bi bi-arrow-right-circle"></i></h5>
                                </div>
                            </div>
                            <h5 class="text-start pt-3">{{$recipe->title}}</h5>
                        </a>
                        <div class="d-flex flex-row align-items-center justify-content-between px-3">
                            <ul class="rating">
                                <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                                <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                                <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                                <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                                <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                            </ul>
                            <p class="small text-muted pt-3">Created by {{$recipe->user->name}} </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>