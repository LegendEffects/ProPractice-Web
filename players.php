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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $servername." Stats";?></title>

    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<?php include 'navbar.php';?>

<div class="container players">
  <?php
  if(!isset($_GET['u']) || empty($_GET['u'])) {
    ?>
    <div class="well text-center">
      <h1>Search for a player</h1>
      <form class="form-inline search-bar" action="players.php" method="get">
        <div class="input-group">
          <input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
          </span>
        </div>
      </form>
    </div>
  <?php
  } else {

    $username = htmlspecialchars($_GET['u']);
    $query = "SELECT * FROM ".$table." WHERE player_name=?";
    $statement = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        $p_name = $row['player_name'];
        $p_uuid = $row['player_uuid'];
        $p_rWin = $row['ranked_wins'];
        $p_rLoss = $row['ranked_losses'];
        $p_uWin = $row['unranked_wins'];
        $p_uLoss = $row['unranked_losses'];
        $p_gElo = $row['global_rating'];

        ?>

        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <form class="form-inline search-bar" action="players.php" method="get">
    					<div class="input-group">
    						<input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players..">
    						<span class="input-group-btn">
    							<button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
    						</span>
    					</div>
    	      </form>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-5">
                <div class="well well-inside">
                  <img src="https://crafatar.com/renders/body/<?php echo $p_uuid;?>" class="img-responsive">
                </div>
              </div>
              <div class="col-md-7">
                <div class="well well-inside">
                  <h1><?php echo $p_name;?>'s Stats</h1>
                  <span class="info"><strong>Name:</strong></span> <?php echo $p_name;?><br>
                  <?php if($showuuid == 1) {?>
                  <span class="info"><strong>UUID:</strong></span> <?php echo $p_uuid."<br>";

                }?>
                  <span class="info">Ranked Wins:</span> <?php echo $p_rWin;?><br>
                  <span class="info">Ranked Losses:</span> <?php echo $p_rLoss;?><br>
                  <br />
                  <span class="info">Unranked Wins:</span> <?php echo $p_uWin;?><br>
                  <span class="info">Unranked Losses:</span> <?php echo $p_uLoss;?><br>
                  <br />
                  <span class="info">Global ELO:</span> <?php echo $p_gElo;?><br>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
    } else {
      ?>
      <div class="well text-center">
        <h1>Player Not Found!</h1>
        <p>Find another player</p>
        <form class="form-inline" action="players.php" method="get">
          <div class="form-group">
            <input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players">
            <button class="btn btn-info" type="submit"><span class="fa fa-search"></span></button>
          </div>
        </form>
      </div>
      <?php
    }
  }

  mysqli_close($con);
  ?>
<?php include 'footer.php';?>
</div>

</body>
</html>
