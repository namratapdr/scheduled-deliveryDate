<?php

    if(array_key_exists('topic',$_POST) OR array_key_exists('words_number',$_POST))
    {
    // Include the DB.php file;
    include_once "DBconfig/DB.php";
    $con = DB::getConnection();
    echo "Connected";
      if($_POST['topic'] == "")
  			echo "<p>Topic name is required</p>";
  		else if($_POST['words_number'] == "")
  			echo "<p>Number of words is required</p>";
  		else
  		{
        $query = "SELECT `id` FROM `projects` WHERE `topic`='".mysqli_real_escape_string($con,$_POST['topic'])."'";
  			$result= mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0)
  			{
  				echo "<p>That topic already exists!</p>";

  			}
        else {

                $query = "INSERT INTO `projects` (`topic`, `words_number`,`instructions`) VALUES ('".mysqli_real_escape_string($con, $_POST['topic'])."', '".mysqli_real_escape_string($con, $_POST['words_number'])."','".mysqli_real_escape_string($con, $_POST['instructions'])."')";
              }
      }
    }
    ?>


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
        text-align: left;
        width: 50%;
        margin: 10px;
        padding: 20px;
      }
		</style>
    <title>Add Project</title>
  </head>
  <body>
    <h1>Client XYZ</h1><br><br>

        <div class="flexbox">

          <div class="flexbox-item">
            <form method="post">
            <div class="form-group">
              <label for="topic_name">Enter Topic :</label>
              <input name="topic" type="text" class="form-control" id="topic_name" placeholder="An understandable name for the topic" aria-describedby="TopicName" required>
            </div>
            <div class="form-group">
              <label name="words_number" for="words_number">Enter Number of Words :</label>
              <input type="number" class="form-control" id="words_number" placeholder="Eg: 50-1500" required>
            </div>
            <div class="form-group">
              <label name="instructions" for="instructions">Additional Information/Instructions :</label>
              <textarea class="form-control" id="instructions" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
            </form>
          </div>

        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
