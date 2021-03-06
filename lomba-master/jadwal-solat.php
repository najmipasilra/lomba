<!DOCTYPE html>
<html>

<head>
    <title>Ramadhan</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="description" content="Ramadhan">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <!--GOOGLE FONTS-->
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.svg">
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.ttf">
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.woff">
    <link rel="stylesheet" type="text/css" href="fonts/glyphicons-halflings-regular.woff2">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.2.min.js"></script>
    <?php 
        include_once('include.php');
        $data = new Jadwal_Solat();
    ?>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
            </div>
            <div class="col-sm-8 text-left">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Imsak</td>
                            <td>Subuh</td>
                            <td>Zuhur</td>
                            <td>Asar</td>
                            <td>Magrib</td>
                            <td>Isya</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 0;
                                WHILE ($d = $data::Baca()) {
                            ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $d['tgl'] ?></td>
                                <td><?php echo $d['i'] ?></td>
                                <td><?php echo $d['s'] ?></td>
                                <td><?php echo $d['z'] ?></td>
                                <td><?php echo $d['a'] ?></td>
                                <td><?php echo $d['m'] ?></td>
                                <td><?php echo $d['y'] ?></td>
                            </tr>
                            <?php 
                                }
                            ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer>
</body>

</html>
