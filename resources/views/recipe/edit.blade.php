<x-layout title="Write a Recipe - DishDash">
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center py-5 mb-5">
            <div class="col-9 shadow border rounded p-5">
                <h2 class="fw-bold pb-5 text-center">Edit your Recipe.</h2>
                <form method="POST" action="{{route('recipe.update' , compact('recipe'))}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-5">
                        <h5>Recipe Title</h5>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$recipe->title}}" placeholder="Recipe Title">
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <h5>Recipe Body</h5>
                        <textarea name="body" cols="10" rows="20" class="form-control" placeholder="Your Recipe">{{$recipe->body}}</textarea>
                        @error('body')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="my-5">
                        <h5>Choose Categories</h5>
                        <select name="categories[]" class="form-control mb-2" multiple>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($recipe->categories->contains($category)) selected @endif>{{$category->name}}></option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple categories.</small>
                    </div>

                    <div class="mb-3">
                        <label for="">Uploaded Image</label>
                        <img src="{{Storage::url($recipe->img)}}" class="img-fluid" width="400px">
                        <input type="file" class="form-control mt-5" name="img">
                    </div>
                    <button type="submit" class="btn btn-custom w-100 mt-4">Submit Message</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>