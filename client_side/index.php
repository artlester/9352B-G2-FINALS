<?php
include('functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Audirentur</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Audirentur</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link " href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification
            <!--For the Notification drop-down-->
                
              <?php 
                $query= "SELECT * from notifications where status = 'unread' order by date DESC;";
                if(count(fetchAll($query))>0){
                ?>
              <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
                <?php
                }
                ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <?php 
                $query= "SELECT * from notifications order by date DESC;";
                if (count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $i){
                ?>
                
                <!--For viewing the notification-->
               <a style="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                        ?>
                        " class= "dropdown-item" href="view.php? id= <?php echo $i['id']?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?><br></i></small>
                   <?php echo $i['message'] ?>
                </a>
                <div class='dropdown-divider'></div>
                <?php   
                }
                }else{
                    echo "No notifications.";
                }
                ?>
            </div>
          </li>
        </ul>
          
         
        <form action = "search.php" method = "GET">
         <input type = "text" name = "query">
		 <input type = "submit" value = "Search" >
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
          <br>
        <p class="lead">Under Construction.</p>
      </div>

    </main><!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
