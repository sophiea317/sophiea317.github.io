<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  // Retrieve the submitted song recommendation
  $song = $_POST["song"];

  // Validate the input
  if(empty($song)){
    echo "Please enter a song recommendation";
  } else {
    // Store the song recommendation in a text file
    $file = fopen("song_recommendations.txt", "a") or die("Unable to open file!");
    fwrite($file, $song . "\n");
    fclose($file);
    
    echo "Thank you for your song recommendation!";
  }
}

?>
