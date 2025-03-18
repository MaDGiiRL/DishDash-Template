<x-layout title="{{$recipe->title}} - DishDash">
    <!-- Super Delicius -->
    <div class="container mb-5 pb-5">
        <div class="row pt-1">
            <div class="col-12 my-3">
                <img src="{{Storage::url($recipe->img)}}" class="card-img-top img-fluid">

                <div class="mt-5">
                    <h4>Calcola le dosi per le porzioni</h4>
                    <livewire:counter :originalServings="$recipe->servings" :ingredients="$recipe->ingredients" />

                </div>
                <div class="mt-3">
                    <h5>Preparation Time:</h5>
                    <p>
                        {{ intdiv($recipe->prep_time, 60) }} hrs {{ $recipe->prep_time % 60 }} min
                    </p>
                </div>

                <div class="mt-3">
                    <h5>Cooking Time:</h5>
                    <p>
                        {{ intdiv($recipe->cook_time, 60) }} hrs {{ $recipe->cook_time % 60 }} min
                    </p>
                </div>
                <h5 class="text-start pt-3">{{$recipe->title}}</h5>
                <div class="card-text text-start">
                    {!! $recipe->body !!}
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

                    <ul class="pt-3">
                        @foreach ($recipe->categories as $category)
                        <li>
                            <a href="{{ route('category.recipes', ['category' => $category->id]) }}" class="link-red">
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                </div>

                <div>
                    @if (Auth::check() && Auth::user()->id == $recipe->user->id)
                    <a href="{{route('recipe.edit' , compact('recipe'))}}">Edit Recipe</a>


                    <form action="{{route('recipe.destroy' , compact('recipe'))}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>