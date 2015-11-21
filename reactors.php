<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reactor Database">
    <meta name="author" content="Piotr Ptak">

    <title>Baza danych reaktorów</title>

    <!-- Bootstrap Core CSS -->
    <link href="Stylesheets/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">

    <!-- Custom css -->
    <link rel="stylesheet type=text/css" href="Stylesheets/stylesheet.css"
</head>

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
            <a class="navbar-brand" href="reactors.php">Reactor Database</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="reactors.php">Home page</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    session_start();
                    if(strlen($_SESSION['user']) > 0)
                    {
                        echo "<li><a>Hello, " . $_SESSION['user'] .'</a></li><li><a href="php/logout.php">Log-out <span class="glyphicon glyphicon-log-out"></span></a></li>';
                    }
                    else
                    {
                        echo "<li><a href='login.php'>Log in</a></li>";
                    }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <?php
    session_start();
    if(strlen($_SESSION['user']) > 0)
    {
        echo '<h2 style="text-align: center"><a href="create.php">Add new</a></h2>';
    }
    ?>
    <table id="reactors" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Facility</th>
            <th>Location</th>
            <th>Process</th>
            <th>Capacity</th>
            <th>Current status</th>
            <th>Start year</th>
            <th>Owner</th>
            <th>Show</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>Facility</th>
            <th>Location</th>
            <th>Process</th>
            <th>Capacity</th>
            <th>Current status</th>
            <th>Start year</th>
            <th>Owner</th>
            <th id="dont"></th>
        </tr>
        </tfoot>
    </table>
</div>

<div id="footer">
    <div class="container">
        <p class="text-muted credit">Copyright © Piotr Ptak 2015</p>
    </div>
</div>

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

    <!-- Script for ajax call to the DataTable.scripts  -->
    <script src="scripts/script.js"></script>
</body>
</html>