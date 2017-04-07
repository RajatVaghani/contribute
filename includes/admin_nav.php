 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php"><img src="../images/textlogo.png" style="width:130px;"/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Contribute Main</a></li>
            <?php
            if(isset($_SESSION['loggedin'])){
             ?>
            <li><a href="logout.php">Logout</a></li>
            <?php
            }
             ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
