<div class="container-fluid mb-5">
    <div class="row justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light" data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <a class="navbar-brand" href="{{ route('homepage') }}">
                        <img src="/images/Logo 1.png" alt="logo" width="200">
                    </a>

                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item"><a class="nav-link" href="">HOMEPAGE</a></li>
                        <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0 text-uppercase drop-custom">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 470px;">
                                    <div class="row px-2 align-items-center text-center">
                                        <div class="col-3 text-center p-1">
                                            <li><a class="dropdown-item" href="">Fish</a></li>
                                            <li><a class="dropdown-item" href="">Seafood</a></li>
                                            <li><a class="dropdown-item" href="">Meat</a></li>
                                            <li><a class="dropdown-item" href="">Chicken</a></li>
                                        </div>
                                        <div class="col-3 text-center  p-1">
                                            <li><a class="dropdown-item" href="">Pasta</a></li>
                                            <li><a class="dropdown-item" href="">Pizza</a></li>
                                            <li><a class="dropdown-item" href="">Pastries</a></li>
                                            <li><a class="dropdown-item" href="">Bread</a></li>
                                        </div>
                                        <div class="col-3 text-center p-1">
                                            <li><a class="dropdown-item" href="">Desserts</a></li>
                                            <li><a class="dropdown-item" href="">Smoothies</a></li>
                                            <li><a class="dropdown-item" href="">Breakfast</a></li>
                                            <li><a class="dropdown-item" href="">IceCream</a></li>
                                        </div>
                                        <div class="col-3 text-center  p-1">
                                            <li><a class="dropdown-item" href="">Salad</a></li>
                                            <li><a class="dropdown-item" href="">Vegan</a></li>
                                            <li><a class="dropdown-item" href="">Oriental</a></li>
                                            <li><a class="dropdown-item" href="">Dips</a></li>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                        <li class="nav-item"><a class="nav-link" href="">ABOUT</a></li>
                        <a class="nav-link" href="">BLOG</a>
                        <li class="nav-item"><a class="nav-link" href="">CONTACT</a></li>
                    </ul>

                    <ul class="navbar-nav d-flex align-items-center">
                        <!-- Right links -->
                        <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0 text-uppercase">
                            <li class="nav-item text-center mx-2 mx-lg-1">
                                <a class="nav-link" href="#!">
                                    <div>
                                        <i class="bi bi-search-heart fs-4"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-center d-flex flex-row align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person fs-3"></i><br>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown-item">
                                        @auth
                                        Hi, {{ Auth::user()->name }}
                                        @else
                                        Account
                                        @endauth
                                    </li>
                                    @guest
                                    <li><a class="dropdown-item" href="">Login</a></li>
                                    <li><a class="dropdown-item" href="">Register</a></li>
                                    @endguest

                                    @auth
                                    <li><a class="dropdown-item" href="">My Account</a></li>
                                    <li><a class="dropdown-item" href="#">Wishlist</a></li>
                                    <li><a class="dropdown-item" href="#">Orders</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="text-center">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark">Logout</button>
                                        </form>
                                    </li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>