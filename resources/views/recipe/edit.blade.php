<x-layout title="Edit Recipe - DishDash">
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center py-5 mb-5">
            <div class="col-9 shadow border rounded p-5">
                <h2 class="fw-bold pb-5 text-center">Edit your Recipe.</h2>
                <form method="POST" action="{{ route('recipe.update', $recipe) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="my-5">
                        <h5>Recipe Title</h5>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ $recipe->title }}" placeholder="Recipe Title">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Corpo della ricetta -->
                    <div class="my-3">
                        <h5>Recipe Body</h5>
                        <textarea name="body" cols="10" rows="20" class="form-control" placeholder="Your Recipe">{{ $recipe->body }}</textarea>
                        @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tempo di preparazione -->
                    <div class="my-5">
                        <h5>Preparation Time</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="prep_time_hours" class="form-control" placeholder="Hours" min="0" value="{{ intdiv($recipe->prep_time, 60) }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="prep_time_minutes" class="form-control" placeholder="Minutes" min="0" max="59" value="{{ $recipe->prep_time % 60 }}">
                            </div>
                        </div>
                    </div>

                    <!-- Tempo di cottura -->
                    <div class="my-5">
                        <h5>Cooking Time</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="cook_time_hours" class="form-control" placeholder="Hours" min="0" value="{{ intdiv($recipe->cook_time, 60) }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="cook_time_minutes" class="form-control" placeholder="Minutes" min="0" max="59" value="{{ $recipe->cook_time % 60 }}">
                            </div>
                        </div>
                    </div>

                    <!-- Sezione Ingredienti -->
                    <div class="my-5">
                        <h5>Ingredients</h5>
                        <div id="ingredients-list">
                            @php
                            $ingredients = is_array($recipe->ingredients) ? $recipe->ingredients : json_decode($recipe->ingredients, true);
                            @endphp

                            @foreach ($ingredients as $index => $ingredient)
                            <div class="ingredient-item mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="ingredients[{{ $index }}][name]" class="form-control" placeholder="Ingredient Name" value="{{ $ingredient['name'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" step="0.01" name="ingredients[{{ $index }}][quantity]" class="form-control" placeholder="Quantity" value="{{ $ingredient['quantity'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="ingredients[{{ $index }}][unit]" class="form-control" placeholder="Unit" value="{{ $ingredient['unit'] }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-ingredient" class="btn btn-secondary mt-2">Add Ingredient</button>
                    </div>

                    <!-- Selezione delle categorie -->
                    <div class="my-5">
                        <h5>Choose Categories</h5>
                        <select name="categories[]" class="form-control mb-2" multiple>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($recipe->categories->contains($category)) selected @endif>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple categories.</small>
                    </div>

                    <!-- Immagine -->
                    <div class="mb-3">
                        <label>Uploaded Image</label>
                        <img src="{{ Storage::url($recipe->img) }}" class="img-fluid" width="400px">
                        <input type="file" class="form-control mt-5" name="img">
                    </div>

                    <button type="submit" class="btn btn-custom w-100 mt-4">Update Recipe</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

<script>
    document.getElementById('add-ingredient').addEventListener('click', function() {
        let index = document.querySelectorAll('.ingredient-item').length;
        let newIngredient = `
        <div class="ingredient-item mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="ingredients[${index}][name]" class="form-control" placeholder="Ingredient Name">
                </div>
                <div class="col-md-4">
                    <input type="number" step="0.01" name="ingredients[${index}][quantity]" class="form-control" placeholder="Quantity">
                </div>
                <div class="col-md-4">
                    <input type="text" name="ingredients[${index}][unit]" class="form-control" placeholder="Unit">
                </div>
            </div>
        </div>`;
        document.getElementById('ingredients-list').insertAdjacentHTML('beforeend', newIngredient);
    });
</script>