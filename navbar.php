<?php include 'config.php';?>


<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navcol">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navcol">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo $homelink?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="index.php"><i class="fa fa-server" aria-hidden="true"></i> Stats</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<form class="form-inline search-bar" action="players.php" method="get">
					<div class="form-group">
						<input type="text" name="u" autocomplete="off" class="form-control" placeholder="Search Players..">
						<span class="form-group-btn">
							<button class="btn btn-primary" type="submit">Search</button>
						</span>
					</div>
	      </form>
			</ul>
		</div>
	</div>
</nav>
