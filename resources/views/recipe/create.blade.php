<x-layout title="Write a Recipe - DishDash">
    <style>
        body {
            background-color:rgba(253, 93, 104, 0.75);
        }
    </style>
    <div class="container">
        <div class="row justify-content-center py-5 mb-5">
            <div class="col-9 bg-white shadow border rounded p-5">
                <h2 class="fw-bold pb-5 text-center">Write your new Recipe.</h2>
                <form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Titolo e Body -->
                    <div class="my-5">
                        <h5>Recipe Title</h5>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Recipe Title">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <h5>Recipe Body</h5>
                        <textarea name="body" cols="10" rows="20" class="form-control" placeholder="Your Recipe">{{ old('body') }}</textarea>
                        @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sezione Ingredienti -->
                    <div class="my-5">
                        <h5>Ingredients</h5>
                        <div id="ingredients-list">
                            <div class="ingredient-item mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="ingredients[0][name]" placeholder="Ingredient Name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" step="0.01" name="ingredients[0][quantity]" placeholder="Quantity" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="ingredients[0][unit]" placeholder="Unit" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-ingredient" class="btn btn-secondary">Add Ingredient</button>
                    </div>

                    <!-- Sezione Tempo di preparazione e cottura -->
                    <div class="my-5">
                        <h5>Preparation Time</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="prep_hours" class="form-control" placeholder="Hours" min="0" value="{{ old('prep_hours') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="prep_minutes" class="form-control" placeholder="Minutes" min="0" max="59" value="{{ old('prep_minutes') }}">
                            </div>
                        </div>
                    </div>

                    <div class="my-5">
                        <h5>Cooking Time</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="cook_hours" class="form-control" placeholder="Hours" min="0" value="{{ old('cook_hours') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="cook_minutes" class="form-control" placeholder="Minutes" min="0" max="59" value="{{ old('cook_minutes') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Selezione delle categorie -->
                    <div class="my-5">
                        <h5>Choose Categories</h5>
                        <select name="categories[]" class="form-control mb-2" multiple>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple categories.</small>
                    </div>

                    <!-- Immagine -->
                    <div class="mb-3">
                        <input type="file" class="form-control" name="img">
                    </div>
                    <button type="submit" class="btn btn-custom w-100 mt-4">Submit Recipe</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let ingredientIndex = 1;

        document.getElementById("add-ingredient").addEventListener("click", function() {
            const ingredientList = document.getElementById("ingredients-list");

            const ingredientItem = document.createElement("div");
            ingredientItem.classList.add("ingredient-item", "mb-3");

            ingredientItem.innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="ingredients[${ingredientIndex}][name]" placeholder="Ingredient Name" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="number" step="0.01" name="ingredients[${ingredientIndex}][quantity]" placeholder="Quantity" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="ingredients[${ingredientIndex}][unit]" placeholder="Unit" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-ingredient">X</button>
                    </div>
                </div>
            `;

            ingredientList.appendChild(ingredientItem);
            ingredientIndex++;


            ingredientItem.querySelector(".remove-ingredient").addEventListener("click", function() {
                ingredientItem.remove();
            });
        });
    });
</script>