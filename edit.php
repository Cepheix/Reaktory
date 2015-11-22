<?php
    session_start();
    if((strlen($_SESSION['user']) <= 0) || ($_SESSION['permission'] != 'admin'))
?>
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
    mysql_connect("mysql.agh.edu.pl", "cephei","3QaCHyZQ") or die(mysql_error()); //Connect to server
    mysql_select_db("cephei") or die("Cannot connect to database"); //connect to database
    $query = mysql_query("Select * from reactors Where id='$id'"); // SQL Query
    $count = mysql_num_rows($query);

    while($row = mysql_fetch_array($query))
    {
        echo '<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
    <form id="createform" class="form-horizontal" role="form" action="../php/modify.php/?id=' . $id . '" method="post">
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">facility</span>
            <input id="facility" name="facility" required="required" value="' . $row['facility'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">location</span>
            <input id="location" name="location" required="required" value="' . $row['location'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">process</span>
            <input id="process" name="process" required="required" value="' . $row['process'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">capacity</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['capacity'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">moderator</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['moderator'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">coolant</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['coolant'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">fuel</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['fuel'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">enrichment</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['enrichment'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">model</span>
            <input id="capacity" name="capacity" required="required" value="' . $row['loops'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">current status</span>
            <input id="current_status" name="current_status" required="required" value="' . $row['current_status'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">start year</span>
           <input id="start_year" name="start_year" required="required" value="' . $row['start_year'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">owner</span>
            <input id="owner" name="owner" required="required" value="' . $row['owner'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>
        <div class="input-group field">
            <span class="input-group-addon" id="basic-addon3">image</span>
            <input id="img" name="img" value="' . $row['img'] . '" type="text" class="form-control" aria-describedby="basic-addon3">
        </div>

        <div style="margin-top:10px" class="form-group text-center">
            <!-- Button -->
            <div class="col-sm-6 controls">
                <button type="submit" value="Create" class="btn btn-primary">Save</button>
            </div>
            <div class="col-sm-6 controls">
                <a href="../show.php/?id=' . $id. '"><button type="button" class="btn btn-primary">Cancel</button></a>
            </div>
        </div>

        <div class="col-md-2"></div>
        </div>
    </form>
    </div>
</div>';
    }
    ?>
</div>
</body>
</html>