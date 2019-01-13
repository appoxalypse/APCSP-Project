<!DOCTYPE html>
<html>

  <head>
    <title>All | WN Updates</title>
		<link rel="stylesheet" type="text/css" href="../css/header.css">
		<link rel="stylesheet" type="text/css" href="../css/default.css">
  </head>

  <body>
    
    <!-- header -->
		<div class="header">
			<div id="leftChunk">
				<div id="leftLocation">
					<div class="button" id="rating">
						<button class="nav" onclick="location.href='ratingSearch.html'">Search by Rating</button>
					</div>
				</div>
				<div id="logoLocation">
					<div class="button" id="all">
			    		<button class="nav" onclick="location.href='../index.html'">Back to Home</button>
				    </div>
				</div>
			</div>
			<div id="rightLocation">
				<div class="button" id="title">
					<button class="nav" onclick="location.href='titleSearch.html'">Search by Title</button>
				</div>
			</div>
		</div>

    <?php

      //Connect to database
      $host = "127.0.0.1";
      $user = "appoxalypse";
      $pass = "";
      $db = "web_novel";
      $port = 3306;
      $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysqli_error());

      $query = "SELECT title, author, genre, rating FROM web_novel;";
      
      $result = @mysqli_query($connection, $query);
        
      echo '<table style="width:80%; border:1px solid black; margin:0 auto;"><tr>
            <td align="center"><b>Title</b></td>
            <td align="center"><b>Author</b></td>
            <td align="center"><b>Genre</b></td>
            <td align="center"><b>Rating</b></td>
            </tr>';

      while ($row = mysqli_fetch_array($result)) {
        echo '<tr><td align="left">' . $row[title] .
             '</td><td align="left">' . $row[author] .
             '</td><td align="left">' . $row[genre] .
             '</td><td align="left">' . $row[rating] .
             '</td></tr>';
      }

      echo "</table>";
      
     ?>

  </body>

</html>