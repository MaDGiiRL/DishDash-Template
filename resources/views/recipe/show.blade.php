<x-layout title="{{$recipe->title}} - DishDash">
    <div class="container mb-5 pb-5 recipe-show">
        <div class="row pt-1">

            <div class="col-12">
                <h1 class="text-start pt-3">🔪 {{$recipe->title}}</h1>

            </div>
            <div class="col-md-8 d-flex flex-row align-items-center justify-content-between">
                <ul class="rating ps-5 ms-2">
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                    <li><a href="#" class="link-red"><i class="bi bi-suit-heart-fill fa-sm fas active"></i></a></li>
                </ul>

                <p class="small text-muted ">Created by {{$recipe->user->name}} </p>

                @if (Auth::check() && Auth::user()->id == $recipe->user->id)
                <div>
                    <a class="btn mb-3" href="{{route('recipe.edit' , compact('recipe'))}}"><i class="bi bi-pencil-square"></i> Edit Recipe</a>
                </div>

                <div>
                    <form action="{{route('recipe.destroy' , compact('recipe'))}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>
                @endif

            </div>


            <div class="row">
                <div class="col-md-6">
                    <img src="{{Storage::url($recipe->img)}}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <livewire:counter :originalServings="$recipe->servings" :ingredients="$recipe->ingredients" />
                        </div>
                        <div class="col-md-4">
                            <div class="row text-center">
                                <div class="col-12 pt-3">
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
                    </div>
                </div>

            </div>

            <div class="col-12">
                <ul class="pt-3 d-flex flex-row gap-3">
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

        <div class="row mt-5 mt-md-0">
            <div class="col-12 mt-5 mt-md-0">
                <div class="card-text text-start">
                    {!! $recipe->body !!}
                </div>
            </div>
        </div>
    </div>

</x-layout>