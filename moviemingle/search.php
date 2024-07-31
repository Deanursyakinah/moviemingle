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
</head>

<body>
    <!-- Navbar Start -->
    <?php include "navbar.php" ?>
    <!-- Navbar End -->

    <!-- Blog Start -->
    <div class="container py-5">
        <div style="display:flex;">
            <form method="POST" class="input-group">
                <input type="text" name="keyword" class="form-control p-3" placeholder="Keyword"
                    style="margin-bottom: 10px; ">
                <input type="submit" class="btn btn-primary"
                    style="margin-bottom: 10px; color: #FFF; margin: 0px 5px 10px 0px; padding: 14px 6px; text-align: center; font-family:Roboto, sans-serif; font-size: 18px; text-align: center;"
                    name="search" value="Find">
                <select name="dropdown" class="btn btn-primary"
                    style="margin-bottom: 10px; color: #FFF; margin: 0px 5px 10px 0px; padding: 14px 6px; text-align: center; font-family:Roboto, sans-serif; font-size: 18px; text-align: center;">
                    <option value="" disabled selected>Genre</option>
                    <?php
                    include "connectToSQL.php";

                    $getGenre = "SELECT genre FROM film f";
                    $result = mysqli_query($connectToSQL, $getGenre);

                    $uniqueGenres = array();

                    // If there are results, loop through them and collect unique genres
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $genres = explode(',', $row["genre"]);
                            foreach ($genres as $genre) {
                                $uniqueGenres[$genre] = $genre;
                            }
                        }
                    }

                    // Create options for unique genres
                    foreach ($uniqueGenres as $genre) {
                        echo "<option value='" . $genre . "'>" . $genre . "</option>";
                    }

                    mysqli_close($connectToSQL);
                    ?>
                </select>
                <input type="submit" name="reset" class="btn btn-primary"
                    style="margin-bottom: 10px; color: #FFF; margin: 0px 10px 10px 0px;  text-align: center; font-family:Roboto, sans-serif; font-size: 18px; text-align: center;"
                    value="Reset">
            </form>
        </div>

        <?php
        include "connectToSQL.php"; // Include your database connection file
        
        // Initialize variables to store query conditions
        $whereClause = "";
        $parameters = array();

        // Check if the form was submitted
        if (isset($_POST['search'])) {
            // Check if keyword is provided
            if (!empty($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                $whereClause .= "film.film_name LIKE ?";
                $parameters[] = "%$keyword%";
            }

            // Check if genre is selected
            if (!empty($_POST['dropdown'])) {
                $genre = $_POST['dropdown'];
                if (!empty($whereClause)) {
                    $whereClause .= " AND ";
                }
                $whereClause .= "film.genre LIKE ?";
                $parameters[] = "%$genre%";
            }

            // Prepare and execute the query
            $query = "SELECT film.film_id as id, film.film_name as title, film.path_film as image, film.production as production FROM film";
            if (!empty($whereClause)) {
                $query .= " WHERE " . $whereClause;
            }
            $statement = mysqli_prepare($connectToSQL, $query);
            if ($statement) {
                // Bind parameters
                if (!empty($parameters)) {
                    $types = str_repeat('s', count($parameters));
                    mysqli_stmt_bind_param($statement, $types, ...$parameters);
                }
                // Execute query
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="container-fluid">
                    <div class="container">
                    <div class="d-flex parentContainer">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output movie details in the desired format
                        echo "
                        <div class='resultContainer'>
                            <div class='result'>
                                <div class='containerAfter'>
                                    <div class='position-relative'>
                                        <div class='img-search team-item'>
                                            <div class='position-relative overflow-hidden'>
                                                <img class='img-recomend img-fluid w-80' src='{$row['image']}' alt=''>
                                                <div class='team-overlay'>
                                                    <div class='d-flex'>
                                                        <a href='addfilm.php?id={$row['id']}'><p onclick='clickHandler()' class='text-uppercase' style='color:white;'>Buy Now<i class='bi bi-chevron-right'></i></p></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='bg-light text-center p-4'>
                                                <h5 class='text-uppercase' style='font-family: Arial, sans-serif;'>{$row['title']}</h5>
                                                <p class='m-0'>{$row['production']}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    echo '</div>
                </div>
            </div>';
                } else {
                    echo "<p>No results found.</p>";
                }
                mysqli_stmt_close($statement);
            }
        }

        // Close database connection
        mysqli_close($connectToSQL);
        ?>
        <!-- tag cloud -->
    </div>
    <!-- Blog End -->


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