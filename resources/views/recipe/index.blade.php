<x-layout title="Recipes - DishDash">
    <!-- Super Delicius -->
    <div class="container my-5 pt-5">
        <div class="row pt-1">
            <div class="col-12 mb-3">
                <h2>Super Delicius</h2>
            </div>

            @foreach ($recipes as $recipe)
            <div class="col-4 my-3">
                <div class="card border position-relative">
                    <div class="card-body p-0">
                        <img src="{{Storage::url($recipe->img)}}" class="card-img-top img-fluid">
                        <h5 class="text-start pt-3">{{$recipe->title}}</h5>
                        <div class="card-text text-start">
                            {!! Str::limit(strip_tags($recipe->body), 60, '...') !!}
                        </div>
                        <div class=" d-flex flex-row align-items-center justify-content-between px-3">
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

