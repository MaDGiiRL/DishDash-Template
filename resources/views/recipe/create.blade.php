<x-layout title="Write a Recipe - DishDash">
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center py-5 mb-5">
            <div class="col-9 shadow border rounded p-5">
                <h2 class="fw-bold pb-5 text-center">Write your new Recipe.</h2>
                <form method="POST" action="{{route('recipe.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="my-5">
                    <h5>Recipe Title</h5>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" placeholder="Recipe Title">
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                    <h5>Recipe Body</h5>
                        <textarea name="body" cols="10" rows="20" class="form-control" placeholder="Your Recipe">{{old('body')}}</textarea>
                        @error('body')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="my-5">
                        <h5>Choose Categories</h5>
                        <select name="categories[]" class="form-control mb-2" multiple>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple categories.</small>
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control" name="img">
                    </div>
                    <button type="submit" class="btn btn-custom w-100 mt-4">Submit Message</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>

