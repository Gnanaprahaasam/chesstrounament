<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header('Location: admin.php');
    exit;
}

require_once('connection.php');

?>



<!DOCTYPE html>
<html>
<head>
  <title>Score Board</title>
</head>
<br>

<style>

  body{
		background-image: url("chessicon.jpg");
    background-size: cover;    	
	}
   
  table{
  background:transparent;
  width: 70%;
  left:30%;
  border-radius: 12px;
  border-collapse: collapse;        
  color: midnightblue;
  font-family: "Times New Roman",Serif;
  text-align: center;
  font-size: 16px;
  }
  th, td {      
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #DDD;
  }

  tr:hover {background-color: #D6EEEE;}

  input[type='submit'] {
  background-color:#0097a7 ;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  }
  input[type='submit']:hover {
    background-color: lightblue; 
    color: white;
  }
  footer{        
    font-family: "Georgia",Serif;	
  }
  </style>
  <center>
  <body>
    <div class="container">
      <img src="chess2.jpg" alt="Notebook" style="width:30%;">
      <div class="content">
        <h3> CHESSTROUNAMENT POINTS SCORE TABLE - 2021 (LASTEST UPDATES)</h3>
      </div>
      <hr>
    <div style="text-align:right">    
      <p><a href="Home.html" class="home"><input  type="submit" name="submit" class ="home" value="Home"></a>
      <a href="About.html" class="about"><input  type="submit" name="submit" class ="about" value="About"></a>
      <a href="Schedule.php" class="schedule"><input  type="submit" name="submit" class ="schedule" value="Schedule"></a>
      <a href="score.php" class="score"><input  type="submit" name="submit" class ="score" value="Score"></a>
      <a href="Contact.html" class="contact"><input  type="submit" name="submit" class ="contact" value="Contact"></a>
      <a href="logout.php" class="logout"><input  type="submit" name="submit" class ="logout" value="Logout"></a></p>
    </div>
    <table class="styled-table"> 
        <tr>
          <th>RANK</th>  
          <th>PLAYER</th>
          <th>PLAYED</th>
          <th>WON</th>
          <th>LOST</th>
          <th>NET RR</th>
          <th>POINTS</th>
        </tr>
        <tr class="active-row">
          <td>1</td> 
          <td>Mani</td> 
          <td>06</td>
          <td>5</td>
          <td>1</td>
          <td>+1.475</td>
          <td>10</td>
        </tr>
        <tr>
          <td>2</td> 
          <td>Devi</td>          
          <td>07</td>
          <td>5</td>
          <td>2</td>
          <td>+0.466</td>
          <td>10</td>
        </tr>
        <tr>
          <td>3</td> 
          <td>Parthiban</td> 
          <td>07</td>
          <td>5</td>
          <td>2</td>
          <td>-0.171</td>
          <td>10</td>
        </tr>
        <tr>
          <td>4</td> 
          <td>Raghul</td> 
          <td>06</td>
          <td>3</td>
          <td>3</td>
          <td>+0.071</td>
          <td>6</td>
        </tr>
        <tr>
          <td>5</td> 
          <td>pragathi</td>  
          <td>07</td>
          <td>03</td>
          <td>04</td>
          <td>-0.264</td>
          <td>6</td>
        </tr>
        <tr>
          <td>6</td> 
          <td>Abarna</td>  
          <td>07</td>
          <td>2</td>
          <td>5</td>
          <td>-0.494</td>
          <td>4</td>
        </tr>
        <tr>
          <td>7</td>
          <td>Abudhul</td> 
          <td>06</td>
          <td>2</td>
          <td>4</td>
          <td>-0.690</td>
          <td>4</td>
        </tr>
        <tr>
          <td>8</td> 
          <td>Hrithik</td> 
          <td>06</td>
          <td>1</td>
          <td>5</td>
          <td>-0.264</td>
          <td>2</td>
        </tr>
      </tbody>
    </table>
</div>  
</center>            
  </body>
  <br>
</html>