<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $song = $_POST['song'];

  // Set up email parameters
  $to = 'sda20a@fsu.edu';
  $subject = 'New Song Recommendation';
  $message = "Someone recommended the following song:\n\n$song";

  // Validate the input
  if(empty($song)){
    echo "please enter a song recommendation";
  } else {
    // Store the song recommendation in a text file
    $file = fopen("song_recommendations.txt", "a") or die("Unable to open file!");
    fwrite($file, $song . "\n");
    fclose($file);
  }

  // Send email
  if (mail($to, $subject, $message)) {
    echo '<p>Thank you for your song recommendation!</p>';
  } else {
    echo '<p>Sorry, there was an error submitting your recommendation. Please try again later.</p>';
  }

}
?>

