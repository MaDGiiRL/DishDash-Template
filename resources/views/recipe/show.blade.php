<x-layout title="{{$recipe->title}} - DishDash">
    <!-- Super Delicius -->
    <div class="container mb-5 pb-5">
        <div class="row pt-1">
            <div class="col-12 mb-3">
                <h2>Super Delicius</h2>
            </div>
            <div class="col-12 my-3">
                <div class="card border position-relative">
                    <div class="card-body p-0">
                        <img src="{{Storage::url($recipe->img)}}" class="card-img-top img-fluid">
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

                            <ul class=" pt-3">
                                @foreach ($recipe->categories as $category)
                                <li><a href="#" class="link-red">{{$category->name}}</li>
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
        </div>
    </div>
</x-layout>