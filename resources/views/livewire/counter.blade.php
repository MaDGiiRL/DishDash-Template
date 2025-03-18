<div class="col-6 text-center">
    <p><strong>Porzioni:</strong> {{$counter}}</p>
    <p>
        <button class="btn btn-light-custom" wire:click="increment"><i class="bi bi-plus-lg"></i></button>
        <button class="btn btn-light-custom" wire:click="decrement"><i class="bi bi-dash-lg"></i></button>
    </p>

    <h5>Ingredienti aggiornati:</h5>
    <ul>
        @foreach($updatedIngredients as $ingredient)
        <li>{{ $ingredient['quantity'] }} {{ $ingredient['unit'] }} di {{ $ingredient['name'] }}</li>
        @endforeach
    </ul>
</div>