
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>
		body {
			margin: auto;
      text-align: center;
      color: #034970;
      background: #87e0fd;
      background: -moz-linear-gradient(left,  #87e0fd 0%, #53cbf1 40%, #05abe0 100%);
      background: -webkit-linear-gradient(left,  #87e0fd 0%,#53cbf1 40%,#05abe0 100%);
      background: linear-gradient(to right,  #87e0fd 0%,#53cbf1 40%,#05abe0 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#87e0fd', endColorstr='#05abe0',GradientType=1 );
		}
    h1{
      margin-top: 20px;
    }

      .flexbox{

        display: flex;
        justify-content: center;
        width:100%;
        height: 500px;

      }
      .flexbox-item{
        text-align: center;
        width: 90%;
        margin: 10px;
        padding: 20px;
      }
	  table {
		text-align : center;
	  }
		</style>
    <title>View On Going Projects</title>
  </head>
  <body>
    <h1>Client XYZ</h1><br><br>
	<h4>View On Going Projects</h4><br><br>

        <div class="flexbox">

          <div class="flexbox-item">
				
              <table style="width:100%">
				  <tr>
					<th>Topic</th>
					<th>Number of Words</th> 
					<th>Instructions</th>
					<th>Scheduled Delivery Date</th>
				  </tr>
				  <?php 
					// Include the DB.php file;
					include_once "DBconfig/connection.php";
						//$con = DB::getConnection();
					//echo "Connected On going Projects <br>";
					
						$query = "SELECT * FROM `projects`";
						$result = mysqli_query($con	, $query);
						if (mysqli_query($con, $query)) {
											
										  } else {
											echo "Error: " . $query . "<br>" . mysqli_error($con);
										  }
						$row =""; 
						/*Displaying the table directly from the database*/
						if (mysqli_num_rows($result) > 0) {

							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>" .$row['topic'] ."</td>";
								echo "<td>". $row['wordsNumber'] ."</td>";
								echo "<td>". $row['instructions'] ."</td>";
								echo "<td>". $row['date'] ."</td>";
								echo "</tr>";
							}
							
						}
					
				  ?>
				  
				</table>

          </div>

        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


