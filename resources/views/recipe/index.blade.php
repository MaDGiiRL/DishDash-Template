<x-layout title="Recipes - DishDash">
    <!-- categories -->
    <div class="container categories my-5">
        <div class="row justify-content-around align-items-center">
            <div class="col-12 mb-5 pt-5">
                <h2>Popular Categories</h2>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/pasta.png" alt="pasta" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Pasta</h4>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/pizza.png" alt="pizza" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Pizza</h4>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/green.png" alt="vegan" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Vegan</h4>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/cake.png" alt="desserts" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Desserts</h4>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/smoothie.png" alt="smoothie" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Smoothie</h4>
            </div>
            <div class="col-6 col-md-2 col-lg-2 text-center">
                <img src="/images/popular-cat/toast.png" alt="breakfast" class="img-fluid rounded-circle p-2 mb-3">
                <h4>Breakfast</h4>
            </div>
        </div>
    </div>


    <!-- Super Delicius -->
    <div class="container my-5 pt-5 index">
        <div class="row pt-1">
            <div class="col-12 mb-3">
                <h2>Super Delicius</h2>
            </div>

            @foreach ($recipes as $recipe)
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


        <div class="row">
            <div class="col-12">
                {{ $recipes->links() }}
            </div>
        </div>

    </div>
</x-layout>