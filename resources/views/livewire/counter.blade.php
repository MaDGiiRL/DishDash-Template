<div class="row text-center">
    <div class="col-12 mt-2">
        <h5 class="text-start">Ingredients</h5>
        <ul>
            @foreach($updatedIngredients as $ingredient)
            <li class="lead"><i class="bi bi-check-circle"></i> {{ $ingredient['quantity'] }} {{ $ingredient['unit'] }} di {{ $ingredient['name'] }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-5 d-flex flex-row justify-content-between align-items-center">
        <p style="font-size: 18px;" class="pt-4 px-2"><strong>Guests</strong> {{$counter}}</p>

        <button class="btn btn-outline-dark mt-4 p-1 me-3" wire:click="increment"><i class="bi bi-plus-lg"></i></button>
        <button class="btn btn-outline-dark mt-4 p-1" wire:click="decrement"><i class="bi bi-dash-lg"></i></button>

    </div>
</div>