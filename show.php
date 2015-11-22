<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reactor Database">
    <meta name="author" content="Piotr Ptak">

    <title>Baza danych reaktorów</title>

    <!-- Bootstrap Core CSS -->
    <link href="../Stylesheets/bootstrap.min.css" rel="stylesheet">
    <link href="../Stylesheets/stylesheet.css" rel="stylesheet">
    <?php echo '<script>
        function confirmDelete() {
            var result = confirm("Are you sure you want to delete entry");
            if (result == true) {
                window.location.replace("../php/delete.php/?id=' . $_GET['id'] . '");
            }
        }
        </script>'; ?>
</head>

<body>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../reactors.php">Reactor Database</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="../reactors.php">Home page</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if(strlen($_SESSION['user']) > 0)
                {
                    echo "<li><a>Hello, " . $_SESSION['user'] .'</a></li><li><a href="../php/logout.php">Log-out <span class="glyphicon glyphicon-log-out"></span></a></li>';
                }
                else
                {
                    echo "<li><a href='../login.php'>Log in</a></li>";
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<div class="container details">
        <?php
        session_start();
        $id = $_GET['id'];
        if((strlen($_SESSION['user']) > 0) && ($_SESSION['permission'] == 'admin'))
        {
            echo '<div class="row" style="text-align: center">';
            echo '<div class="col-md-6"><a href="../edit.php/?id=' . $id . '"><btn class="btn btn-primary">Edit</btn></a></div>';
            echo '<div class="col-md-6"><btn class="btn btn-primary" onclick="confirmDelete()">Delete</btn></div>';
            echo '</div>';
        }
        mysql_connect("mysql.agh.edu.pl", "cephei","3QaCHyZQ") or die(mysql_error()); //Connect to server
        mysql_select_db("cephei") or die("Cannot connect to database"); //connect to database
        $query = mysql_query("Select * from reactors Where id='$id'"); // SQL Query
        $count = mysql_num_rows($query);

        if($count <= 0)
            header("location: ../reactors.php");

        while($row = mysql_fetch_array($query))
        {
            echo '<div class="row">';
            echo '<div class=col-md-6>';

            echo '<label>facility: </label>';
            echo '<p>' . $row['facility'] . '</p>';
            echo '<label>location: </label>';
            echo '<p>' . $row['location'] . '</p>';
            echo '<label>process: </label>';
            echo '<p>' . $row['process'] . '</p>';
            echo '<label>capacity: </label>';
            echo '<p>' . $row['capacity'] . '</p>';
            echo '<label>moderator: </label>';
            echo '<p>' . $row['moderator'] . '</p>';
            echo '<label>coolant: </label>';
            echo '<p>' . $row['coolant'] . '</p>';
            echo '<label>fuel: </label>';
            echo '<p>' . $row['fuel'] . '</p>';
            echo '<label>enrichment: </label>';
            echo '<p>' . $row['enrichment'] . '</p>';
            echo '<label>model: </label>';
            echo '<p>' . $row['loops'] . '</p>';
            echo '<label>current status: </label>';
            echo '<p>' . $row['current_status'] . '</p>';
            echo '<label>start year: </label>';
            echo '<p>' . $row['start_year'] . '</p>';
            echo '<label>owner: </label>';
            echo '<p>' . $row['owner'] . '</p>';

            echo '</div>';
            echo '<div class="col-md-6">';
            if($row['img'] != null)
            {
                $link =  $row['img'];
                echo '<img src="' . $link . '">';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
</div>
</body>
</html>