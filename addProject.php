<?php
// If there is no constant defined called __CONFIG__, do not load this
// Include the DB.php file;
include_once "DBconfig/DB.php";
$con = DB::getConnection();
    echo "Add a new Project";
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
      background-color: #7fdbff;
		}
      .flexbox{
        display: flex;
        width:100%;
        height: 500px;
        border: 1px solid grey;
      }
      .flexbox-item{
        margin: 10px;
        padding: 20px;
      }
		</style>
    <title>Add Project</title>
  </head>
  <body>
    <h1>Client XYZ</h1><br><br>
		<div class="container-flex">
        <div class="flexbox">

          <div class="flexbox-item">
            <form>
            <div class="form-group">
              <label for="topic_name">Enter Topic :</label>
              <input type="text" class="form-control" id="topic_name" aria-describedby="TopicName">
            </div>
            <div class="form-group">
              <label for="words_number">Enter Number of Words :</label>
              <input type="number" class="form-control" id="words_number">
            </div>
            <div class="form-group">
              <label for="instructions">Example textarea</label>
              <textarea class="form-control" id="instructions" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
            </form>
          </di>

        </div>

		</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
