<!DOCTYPE html>
<html>

  <head>
    <title>Title Search | Dramarama</title>
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
					<img src="../media/DRAMARAMA.jpg" width="100%" height="100%">
				</div>
			</div>
			<div id="rightLocation">
				<div class="button" id="title">
					<button class="nav" onclick="location.href='../index.html'">Back to Home</button>
				</div>
			</div>
		</div>

		<!-- main body -->
		<form action="titleSearch.php">
			First Letter of Title (uppercase): <input type="text" mame="alphabet"><br>
			<input type="submit" name="submit">
		</form>

    <?php

      //Connect to database
      $host = "127.0.0.1";
      $user = "appoxalypse";
      $pass = "";
      $db = "web_novel";
      $port = 3306;
      $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());

      //Call data from the database
      if (isset($_POST['submit'])) {

        echo "Web Novels with titles that start with the letter: " . $_POST['alphabet'];


        // key ID, title, author, genre, rating, alphabet
        $query = "SELECT title, author, genre, rating FROM students WHERE alphabet == " . $_POST['alphabet'];
        $response = mysqli_query($connection, $query);

        if ($response) {
          echo '<table align="left" cellspacing="5" cellpadding="8"><tr>
                <td align="left"><b>Title</b></td>
                <td align="left"><b>Author</b></td>
                <td align="left"><b>Genre</b></td>
                <td align="left"><b>Rating</b></td>
                </tr>';

          while ($row = mysqli_fetch_array($response)) {
            echo '<tr><td align="left">' . $row[title] .
                  '</td><td align="left">' . $row[author] .
                  '</td><td align="left">' . $row[genre] .
                  '</td><td align="left">' . $row[rating] .
                  '</td></tr>';
          }

          echo "</table>";

        } else {
          echo mysqli_error($dbc);
        }

      }

     ?>

  </body>

</html>
