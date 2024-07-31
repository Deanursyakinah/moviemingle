<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    setcookie("profpict", "", 1, "");
    setcookie("username", "", 1, "");
    header('Location: signin2.php');
}
?>

<head>
    <meta charset="utf-8">
    <title>MOVIE MINGLE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet"> -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>

    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Info Start -->
    <div class="highlight">
        <div class="section">
            <div class="container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="people__card">
                                <img src="https://awsimages.detik.net.id/community/media/visual/2022/05/25/film-interstellar.png?w=1200"
                                    class="people__card__image" />
                                <div class="people__card__content">
                                    <div class="slide__number">01</div>
                                    <div class="slide__title">Intersellar</div>
                                    <div class="slide__subtitle">When Earth becomes uninhabitable in the future, a
                                        farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along
                                        with a team of researchers, to find a new planet for humans.</div>
                                    <a href="addfilm.php?id=6" class="slide__btn">
                                        <span class="slide__btn__text">Buy Now</span>
                                        <span class="slide__btn__icon">
                                            <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="slide__gradient"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="people__card">
                                <img src="https://www.viv.co.id/uploads/large/9df052421d923fed70f2e9a006b134d1.jpeg"
                                    class="people__card__image" />
                                <div class="people__card__content">
                                    <div class="slide__number">02</div>
                                    <div class="slide__title">Exhuma</div>
                                    <div class="slide__subtitle">The process of excavating an ominous grave unleashes
                                        dreadful consequences buried underneath.</div>
                                    <a href="addfilm.php?id=5" class="slide__btn">
                                        <span class="slide__btn__text">Buy Now</span>
                                        <span class="slide__btn__icon">
                                            <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="slide__gradient"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="people__card">
                                <img src="https://cdn1-production-images-kly.akamaized.net/XK2mCOIdXMc3CutPE9VdZ5aHLMY=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/2038615/original/058403300_1522238553-ready_player_1.jpg"
                                    class="people__card__image" />
                                <div class="people__card__content">
                                    <div class="slide__number">03</div>
                                    <div class="slide__title">Ready Player One</div>
                                    <div class="slide__subtitle">When the creator of a virtual reality called the OASIS
                                        dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg,
                                        which will give the finder his fortune and control of his world
                                    </div>
                                    <a href="addfilm.php?id=1" class="slide__btn">
                                        <span class="slide__btn__text">Buy Now</span>
                                        <span class="slide__btn__icon">
                                            <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="slide__gradient"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="people__card">
                                <img src="https://cdn.oneesports.id/cdn-data/sites/2/2024/03/Anime_KaijuNo8_KafkaHibino_CharacterVisual-1024x576-1.jpg"
                                    class="people__card__image" />
                                <div class="people__card__content">
                                    <div class="slide__number">04</div>
                                    <div class="slide__title">Kaiju no.8</div>
                                    <div class="slide__subtitle">Kafka Hibino, a 32-year-old man, is unsatisfied with
                                        his job as a sweeper. From a young age, he has aspired to join the Defense Corps
                                        and kill kaijuus for a living. After a few failed attempts, however, he gave up
                                        on his dreams and resigned himself to the mediocrity....
                                    </div>
                                    <a href="addfilm.php?id=2" class="slide__btn">
                                        <span class="slide__btn__text">Buy Now</span>
                                        <span class="slide__btn__icon">
                                            <svg width="100%" height="100%" viewBox="0 0 17 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.22218 15.2222C2.79261 15.6518 2.79261 16.3482 3.22218 16.7778C3.65176 17.2074 4.34824 17.2074 4.77782 16.7778L3.22218 15.2222ZM16.1 5C16.1 4.39249 15.6075 3.9 15 3.9L5.1 3.9C4.49249 3.9 4 4.39249 4 5C4 5.60751 4.49249 6.1 5.1 6.1L13.9 6.1L13.9 14.9C13.9 15.5075 14.3925 16 15 16C15.6075 16 16.1 15.5075 16.1 14.9L16.1 5ZM4.77782 16.7778L15.7778 5.77782L14.2222 4.22218L3.22218 15.2222L4.77782 16.7778Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="slide__gradient"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Info End -->

    <!-- Recomen Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h3 class="text-primary text-uppercase">Recomendation</h3>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-left: 2rem; padding-right: 2rem;">
                <?php
                $xml = simplexml_load_file("infoMov.xml");

                foreach ($xml->movie as $movie) {
                    echo "
                        <div class='team-item'>
                        <div class='position-relative overflow-hidden'>
                            <img class='img-recomend img-fluid w-80' src='$movie->image' alt=''>

                            <div class='team-overlay'>
                                <div class='d-flex align-items-center justify-content-start'>
                                <a href='addfilm.php?id=" . $movie->id . "'><p onclick='clickHandler(\"" . $movie->production . "\")' class='text-uppercase' style='color:white;'>Buy Now<i class='bi bi-chevron-right'></i></p></a>
                                </div>
                            </div>
                        </div>
                        <div class='bg-light text-center p-4'>
                            <h5 class='text-uppercase' style='font-family: Arial, sans-serif;'>{$movie->name}</h5>
                            <p class='m-0'>{$movie->production}</p>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
            <div id="data-pet"></div>
        </div>
    </div>
    <!-- Info End -->


    <!-- Buy film Start -->
    <div class="container py-5">
        <div class="row gx-5 justify-content-start">
            <div class="col-lg-7">
                <div class="border-start border-5 border-dark ps-5 mb-5">
                    <h6 class="text-dark text-uppercase">Let's Gaurrr </h6>
                    <h1 class="display-5 text-uppercase text-white mb-0">Wanna watch your favorite movies?</h1>
                </div>
                <p class="text-white mb-4">Click the button to watch or save in your wishlist ❤️ </p>
                <a href="search.php" class="btn btn-light py-md-3 px-md-5 me-3">Search Now</a>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script>
        function clickHandler(typeFilm) {
            var xmlhttp = new XMLHttpRequest(); //get file xml, kyk simplexml_load_file mirip
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    xmlHandler(this, typeFilm); //this -> var xmlhttp
                }
            };
            xmlhttp.open("GET", "infoMov.xml", true);
            xmlhttp.send();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script id="rendered-js">
        const swiper = new Swiper(".swiper", {
            direction: "horizontal",
            grabCursor: true,
            slidesPerView: 1,
            slidesPerGroup: 1,
            centeredSlides: false,
            loop: true,
            spaceBetween: 10,
            mousewheel: {
                forceToAxis: true
            },
            breakpoints: {
                767: {
                    slidesPerView: 2,
                    spaceBetween: 24
                },
                1699: {
                    slidesPerView: 3,
                    spaceBetween: 24
                }
            },
            speed: 700,
            slideActiveClass: "is-active",
            slideDuplicateActiveClass: "is-active",
            autoplay: {
                delay: 5000, // 5 seconds delay between slides
                disableOnInteraction: false // Prevent autoplay from stopping on user interaction
            }
        });
    </script>
    <script src="js/main.js"></script>
</body>

</html>