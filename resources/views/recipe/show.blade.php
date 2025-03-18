<x-layout title="{{$recipe->title}} - DishDash">


    <div class="container mb-5 pb-5 recipe-show">
        <div class="row pt-1">
            <div class="min-vh-100">
            <section class="recipe mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{Storage::url($recipe->img)}}" class="img-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <ul class="pt-3">
                                        @foreach ($recipe->categories as $category)
                                        <li>
                                            <a href="{{ route('category.recipes', ['category' => $category->id]) }}" class="recipe-badge px-3 fs-3 rounded-pill">
                                                {{$category->name}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-start pt-3">{{$recipe->title}}</h1>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="row mt-3 text-center flex-column">
                                    <div class="col-12 mt-5">
                                        <h5>Preparation Time:</h5>
                                        <p>
                                            {{ intdiv($recipe->prep_time, 60) }} hrs {{ $recipe->prep_time % 60 }} min
                                        </p>
                                    </div>
                                    <div class="col-12 mt-5 pt-5">
                                        <h5>Cooking Time:</h5>
                                        <p>
                                            {{ intdiv($recipe->cook_time, 60) }} hrs {{ $recipe->cook_time % 60 }} min
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <livewire:counter :originalServings="$recipe->servings" :ingredients="$recipe->ingredients" />
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-center justify-content-around px-3 mt-5 mt-md-0">

                                @if (Auth::check() && Auth::user()->id == $recipe->user->id)
                                <a class="btn btn-outline-dark mb-3" href="{{route('recipe.edit' , compact('recipe'))}}">Edit Recipe</a>

                                <form action="{{route('recipe.destroy' , compact('recipe'))}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark">Delete</button>
                                </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>

            <div class="row mt-5 mt-md-0">
                <div class="col-12 mt-5 mt-md-0">
                    <div class="card-text text-start">
                        {!! $recipe->body !!}
                    </div>
                </div>
            </div>
            <div class=" d-flex flex-row align-items-center justify-content-around px-3">
                <ul class="rating pt-3">
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                </ul>
                <p class="small text-muted pt-4">Created by {{$recipe->user->name}} </p>
            </div>
        </div>
    </div>

</x-layout>