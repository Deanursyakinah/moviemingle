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

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "<script>alert('Anda harus login terlebih dahulu'); window.location.href = 'signin2.php';</script>";
    exit;
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

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
    <style>
        th {
            color: white;
            font-size: 20px;
        }

        td {
            font-family: fontKetiga;
            src: url(His\ Heart\ is\ Mine.ttf);
            color: white;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Collection</h6>
                <h1 class="display-5 text-uppercase text-white mb-0">Your purchased Movies</h1>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- User Table Start -->
    <?php
    include "connectToSQL.php";

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $sql = "SELECT f.film_id, f.film_name, f.durasi, f.genre, f.production, f.tahun FROM beli b
    JOIN film f ON f.film_id = b.film_id
    WHERE user_id = $user_id";
    $result = $connectToSQL->query($sql);

    if ($result->num_rows > 0):
        ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="padding: 20px;">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Genre</th>
                        <th class="text-center">Production</th>
                        <th class="text-center">Year</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td>
                                <?= $row["film_name"] ?>
                            </td>
                            <td>
                                <?= $row["durasi"] ?>
                            </td>
                            <td>
                                <?= $row["genre"] ?>
                            </td>
                            <td>
                                <?= $row["production"] ?>
                            </td>
                            <td>
                                <?= $row["tahun"] ?>
                            </td>
                            <td class="text-center">
                                <a href="addfilm.php?id=<?= $row['film_id'] ?>">
                                    <button class="btn btn-danger py-2 px-3">
                                        Watch Movie
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>

        <?php
    else:
        ?>
        <div class="alert alert-warning" role="alert">
            You have not signed up any films yet.
        </div>
        <?php
    endif;
    ?>
    <!-- User Table End -->

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer End -->

    <script>
        function redirectToAddFilm(filmId) {
            window.location.href = "addfilm.php?id=" + filmId;
        }
    </script>


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