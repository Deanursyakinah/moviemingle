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
    <title>MOVIE MINGGLE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    <?php
    include "connectToSQL.php";
    session_start();
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        header("Location: signin2.php");
        exit;
    }
    mysqli_close($connectToSQL);
    ?>

    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->


    <!-- SIgn Up Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <?php
            include "connectToSQL.php";

            if (isset($_GET['id'])) {
                $param1 = $_GET['id'];
            } else {
                echo "<p>Can't load the data</p>";
            }

            $query = "SELECT * FROM film WHERE film_id = ?";
            $statement = mysqli_prepare($connectToSQL, $query);

            if ($statement) {
                mysqli_stmt_bind_param($statement, 'i', $param1);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $film_id, $film_name, $sinopsis, $durasi, $genre, $actor, $production, $tahun, $pic_film, $price, $path_film, $video);
                mysqli_stmt_fetch($statement);

                mysqli_stmt_close($statement);

                // Check if the film_id and user_id exist in the 'jual' table
                $jual_query = "SELECT beli.film_id FROM beli WHERE beli.film_id = ? AND beli.user_id = ?";
                $jual_statement = mysqli_prepare($connectToSQL, $jual_query);
                mysqli_stmt_bind_param($jual_statement, 'ii', $film_id, $user_id);
                mysqli_stmt_execute($jual_statement);
                mysqli_stmt_store_result($jual_statement);

                echo '
        <div id="w-info">
            <div class="binfo">';
                // If the record exists in the 'jual' table, show different content
                if (mysqli_stmt_num_rows($jual_statement) > 0) {
                    echo '
                <iframe width="70%" height="500vh" src="' . $video . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="info" style="h1discuss">
                    <div class="div-buy">
                    <div class="cover"><img class="img-fluid img-buy w-80" src=' . $path_film . '></div>
                        <div class="synopsis mb-3">
                            <h1 itemprop="name" class="text-white title d-title">' . $film_name . '</h1>
                            <div class="shorting">
                                <div class="content">' . $sinopsis . '</div>
                            </div>
                            <div class="bmeta">
                                <div class="meta">
                                    <div>Year: <span><a href="tv">' . $tahun . '</a></span> </div>
                                    <div>Production: <span> <a href="/country/japan">' . $production . '</a> </span>
                                    </div>
                                    <div>Duration: <span> <a href="filter?season=spring&amp;year=2024">' . $durasi .
                        '</a> </span>
                                    </div>
                                    <div> Genre: <span itemprop="dateCreated">' . $genre . '</span></div>
                                    <div> Actor: <span>' . $actor . '</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                } else {
                    echo '
                <img class="img-trend img-fluid w-80" src=' . $pic_film . '>
                <div class="info" style="h1discuss">
                    <div class="div-buy">
                    <div class="cover"><img class="img-fluid img-buy w-80" src=' . $path_film . '></div>
                        <div class="synopsis mb-3">
                            <h1 itemprop="name" class="text-white title d-title">' . $film_name . '</h1>
                            <div class="shorting">
                                <div class="content">' . $sinopsis . '</div>
                            </div>
                            <div class="bmeta">
                                <div class="meta">
                                    <div>Year: <span><a href="tv">' . $tahun . '</a></span> </div>
                                    <div>Production: <span> <a href="/country/japan">' . $production . '</a> </span>
                                    </div>
                                    <div>Duration: <span> <a href="filter?season=spring&amp;year=2024">' . $durasi . '</a> </span>
                                    </div>
                                    <div> Genre: <span itemprop="dateCreated">' . $genre . '</span></div>
                                    <div> Actor: <span>' . $actor . '</span> </div>
                                    <div> Price: <span>' . $price . '</span> </div>
                                </div>
                                <form method="post">
                                    <input type="submit" class="btn btn-primary"
                                        style="width: 150px; margin-bottom: 10px; color: #FFF; margin-top: 30px; padding: 14px 6px; text-align: center; font-family:Roboto, sans-serif; font-size: 18px; text-align: center;"
                                        name="buy" value="Buy Now">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
                }

                echo '
            </div>
        </div>';


                mysqli_stmt_close($jual_statement);
            }
            mysqli_close($connectToSQL);

            // Check if the form is submitted
            if (isset($_POST['buy'])) {
                include "connectToSQL.php";

                // Insert into the database
                $query = "INSERT INTO beli (film_id, user_id, tanggal_beli) VALUES (?, ?, CURDATE())";
                $statement = mysqli_prepare($connectToSQL, $query);

                if ($statement) {
                    mysqli_stmt_bind_param($statement, 'ii', $param1, $user_id);
                    if (mysqli_stmt_execute($statement)) {
                        echo "
            <script>alert('Berhasil Membeli Film'); window.location.href = 'collection.php';</script>";
                    } else {
                        echo '
            <script>alert("Error inserting record: ' . mysqli_error($connectToSQL) . '");</script>';
                    }
                    mysqli_stmt_close($statement);
                } else {
                    echo '
            <script>alert("Error in preparing statement: ' . mysqli_error($connectToSQL) . '");</script>';
                }

                mysqli_close($connectToSQL);
            }
            ?>
        </div>
    </div>
    <!-- SIgn Up End -->

    <div id="ContainerTable">
        <div id="leftbar">
            <div id="titleToC">
                <h3>Trending</h3>
            </div>
            <nav class="tableText">
                <a href="addfilm.php?id=2">
                    <div class="div-trend">
                        <div class="cover"><img style="max-width: 80%" src='imgMov/Kaijuno8.jpg'></div>
                        <h1 itemprop="name" class="text-white title d-title">Kaiju No 8</h1>
                    </div>
                </a>
                <a href="addfilm.php?id=5">
                    <div class="div-trend">
                        <div class="cover"><img style="max-width: 80%" src='imgMov/exhuma_potrait.jpg'></div>
                        <h1 itemprop="name" class="text-white title d-title">Exhuma</h1>
                    </div>
                </a>
            </nav>
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
    <script src="js/main.js"></script>
</body>

</html>