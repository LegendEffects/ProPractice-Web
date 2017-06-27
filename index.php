<?php
include 'config.php';
if($debug = 0) {
    error_reporting(0);
}
$con = mysqli_connect($ip, $user, $password, $database);
if(!$con) {
    die("Connection Failed! Is the server down?");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $servername." | Stats";?></title>

    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'navbar.php';?>

<div class="container top-player">
    <div class="row">
        <div class="col-md-9">
            <div class="well text-center">
                <h1>Top <?php echo $topplayers?> Players</h1>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th> </th>
                        <th>Name</th>
                        <th>Ranked Wins</th>
                        <th>Unranked Wins</th>
                        <th>Global Elo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['sort']) || (!empty($_GET['sort']))) {
                        $sortby = $_GET['sort'];
                        if($sortby == "rWins") {
                            $query = "SELECT * FROM ".$table." ORDER BY ranked_wins DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $uuid = $row['player_uuid'];
                                    $rWins = $row['ranked_wins'];
                                    $uWins = $row['unranked_wins'];
                                    $gElo = $row['global_rating'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/<?php echo $uuid;?>" class="img-responsive"></a></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $rWins;?></td>
                                        <td><?php echo $uWins;?></td>
                                        <td><?php echo $gElo;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td>NONE</td>
                                    <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/f84c6a79-0a4e-45e0-879b-cd49ebd4c4e2" class="img-responsive"></a></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                        else if($sortby == "uWins") {
                            $query = "SELECT * FROM ".$table." ORDER BY unranked_wins DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $uuid = $row['player_uuid'];
                                    $rWins = $row['ranked_wins'];
                                    $uWins = $row['unranked_wins'];
                                    $gElo = $row['global_rating'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/<?php echo $uuid;?>" class="img-responsive"></a></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $rWins;?></td>
                                        <td><?php echo $uWins;?></td>
                                        <td><?php echo $gElo;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/f84c6a79-0a4e-45e0-879b-cd49ebd4c4e2" class="img-responsive"></a></td>
                                    <td>NONE</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                        else if($sortby == "gElo") {
                            $query = "SELECT * FROM ".$table." ORDER BY global_rating DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $uuid = $row['player_uuid'];
                                    $rWins = $row['ranked_wins'];
                                    $uWins = $row['unranked_wins'];
                                    $gElo = $row['global_rating'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/<?php echo $uuid;?>" class="img-responsive"></a></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $rWins;?></td>
                                        <td><?php echo $uWins;?></td>
                                        <td><?php echo $gElo;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td><img src="https://crafatar.com/renders/head/f84c6a79-0a4e-45e0-879b-cd49ebd4c4e2" class="img-responsive"></td>
                                    <td>NONE</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $query = "SELECT * FROM ".$table." ORDER BY global_rating DESC LIMIT ".$topplayers;
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $num = 0;
                                while($row = mysqli_fetch_array($result)) {
                                    $name = $row['player_name'];
                                    $uuid = $row['player_uuid'];
                                    $rWins = $row['ranked_wins'];
                                    $uWins = $row['unranked_wins'];
                                    $gElo = $row['global_rating'];
                                    $num++;?>
                                    <tr>
                                        <td><?php echo $num;?>.</td>
                                        <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/<?php echo $uuid;?>" class="img-responsive"></a></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $rWins;?></td>
                                        <td><?php echo $uWins;?></td>
                                        <td><?php echo $gElo;?></td>
                                    </tr>
                                    <?php
                                }
                            } else {?>
                                <tr>
                                    <td>NONE</td>
                                    <td><a href="/players.php?u=<?php echo $name;?>"><img src="https://crafatar.com/renders/head/f84c6a79-0a4e-45e0-879b-cd49ebd4c4e2" class="img-responsive"></a></td>
                                    <td>NONE</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            <?php
                            }
                    }

                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well text-center">
              <h1 class="text-center">Sort By:</h1>
            </div>
            <div class="list-group">
                <a href="?sort=gElo" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Global ELO</a>
                <a href="?sort=rWins" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Ranked Wins</a>
                <a href="?sort=uWins" class="list-group-item"><i class="fa fa-arrow-right" aria-hidden="true"></i> Unranked Wins</a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>

</body>
</html>
