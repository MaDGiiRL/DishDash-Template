<div class="follow-us-instagram">
    <div class="insta-feeds d-flex flex-wrap">
        <div class="single-insta-feeds">
            <img src="/images/insta1.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta2.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta3.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta4.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta5.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta6.jpg" alt="">
            <div class="insta-icon">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="single-insta-feeds">
            <img src="/images/insta7.jpg" alt="">
            <div class="insta-icon d-flex justify-content-center flex-row">
                <a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>


@unless(request()->routeIs('recipe.show'))
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 d-flex flex-column">
                <img src="/images/Logo 1.png" alt="logo" class="img-fluid" width="200px">
                <p class="text-justify pt-1 small">
                    "On the other hand, we denounce with righteous<br>
                    indignation and dislike men who are so beguiled and<br>
                    demoralized by the charms of pleasure of the moment."
                </p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>DishDash</h6>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Legal</h6>
                <ul class="footer-links">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Conditions</a></li>
                    <li><a href="#">Cookies</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Copyright</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2025 Developed with ♡ by Sofia Vidotto.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook pt-2 link-light" href="#"><i class="bi bi-facebook fs-4"></i></a></li>
                    <li><a class="twitter pt-2 link-light" href="#"><i class="bi bi-twitter fs-4"></i></a></li>
                    <li><a class="dribbble pt-2 link-light" href="#"><i class="bi bi-dribbble fs-4"></i></a></li>
                    <li><a class="linkedin pt-2 link-light" href="#"><i class="bi bi-linkedin fs-4"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endunless