<?php

    if(array_key_exists('topic',$_POST) OR array_key_exists('wordsNumber',$_POST))
    {
    // Include the DB Connection file
    include_once "DBconfig/connection.php";
    echo "Connected <br>";
	

	/*a function to calculate the expected 
	delivery date based on the company's restrictions*/
	
	
   function deliveryDate($numberOfWords){
            
			include "DBconfig/connection.php";
            echo "Total Number of Words: $numberOfWords <br>";
			
			
			$query = "SELECT `wordsNumber` FROM `projects`";
			$result = mysqli_query($con	, $query);
			if (mysqli_query($con, $query)) {
                                echo "<br>Number of words Updated <br>";
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($con);
                              }
			$row ="";
            if (mysqli_num_rows($result) > 0) {
				
                while($row = mysqli_fetch_assoc($result)) {
                      $numberOfWords += $row['wordsNumber'];
                }
              }
                echo "Total Number of Words after DB: $numberOfWords <br>";
            if ($numberOfWords > 1000)
            {
              /*If total number of words for the client is more than 1000 then
              the delivery date is scheduled for the next day*/
              $date1 = date("j")+1;
              $date = $date1."".date("S \of F Y");
            }
            else {
              /*If total number of words for the client is less than 1000 then
              the delivery date is scheduled for the same day*/
              $date1 = date("j");
              $date = $date1."".date("S \of F Y");
            }

            return $date;
        }
		
		
		
		/*If the user enters a topic which is already there 
		then it is updated in the database
		or else it is entered in the database 
		along with the calculated Delivery Date*/
		
		$numberOfWords = $_POST['wordsNumber'];
					$date = deliveryDate($numberOfWords);
					echo "Date : $date";
					$query = "SELECT id FROM `projects` WHERE topic='".mysqli_real_escape_string($con,$_POST['topic'])."'";
                    $result= mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                     /* $query = "UPDATE `projects` SET wordsNumber='$numberOfWords' WHERE topic='".mysqli_real_escape_string($con,$_POST['topic'])."'";
						if (mysqli_query($con, $query)) {
                                echo "<br>Number of words Updated <br>";
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($con);
                              }
						$query = "UPDATE `projects` SET instructions='".mysqli_real_escape_string($con, $_POST['instructions'])."' WHERE topic='".mysqli_real_escape_string($con,$_POST['topic'])."'";
						if (mysqli_query($con, $query)) {
                                echo "Instructions Updated<br>";
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($con);
                              }
						$query = "UPDATE `projects` SET date='$date' WHERE topic='".mysqli_real_escape_string($con,$_POST['topic'])."'";
						
						if (mysqli_query($con, $query)) {
                                echo "Date Updated<br>";
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($con);
                              }*/
							  echo "<br>Project with this topic name exists<br>";
                    }
                    else {

                            $query = "INSERT INTO `projects` (`topic`, `wordsNumber`,`instructions`,`date`) VALUES
                                      ('".mysqli_real_escape_string($con, $_POST['topic'])."', '$numberOfWords','".mysqli_real_escape_string($con, $_POST['instructions'])."','$date')";
                            if (mysqli_query($con, $query)) {
                                echo "New Project added successfully";
                              } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($con);
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
              <label  for="wordsNumber">Enter Number of Words :</label>
              <input type="number" name="wordsNumber" class="form-control" id="words_number" placeholder="Eg: 1-1000" min="1" max="1000" required>
            </div>
            <div class="form-group">
              <label  for="instructions">Additional Information/Instructions :</label>
              <textarea name="instructions" class="form-control" id="instructions" rows="3"></textarea>
            </div>
            <input type="submit" name="submit" value="Add Project"class="btn btn-primary">
            </form>
              <br>
          </div>

        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
