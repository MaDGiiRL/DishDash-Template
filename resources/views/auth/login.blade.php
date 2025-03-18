<x-layout title="Login - DishDash">
    <div class="container my-5 pt-5">
        <div class="row justify-content-center">
            <h3>Login</h3>
            <div class="col-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="login-email" class="form-label">Email</label>
                        <input type="email" id="login-email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password</label>
                        <input type="password" id="login-password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Accedi</button>
                    <p class="text-center mt-4 back-to-log">Forgot you password? <a href="{{ route('password.request') }}">Recover Password</a></p>
                </form>

            </div>
        </div>
    </div>
</x-layout>