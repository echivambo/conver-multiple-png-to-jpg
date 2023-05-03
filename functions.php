<?php
if (!function_exists($_POST['png_converter']))
  redirectUser();

  // Get the name of the function to run
  $functionName = $_POST['png_converter'];

  // Call the function using call_user_func
  if (function_exists($functionName)) {
    call_user_func($functionName);
  } else {
    echo "Function not found: $functionName";
  }

  // Define the function to be called
function pngConerter() {
   $directoryName = createDirectory("treated");

   foreach (getAllPNGInThisFolder() as $file) {
    // Path to PNG file
    $pngFile = "../".$file;

    // Load PNG file
    $im = imagecreatefrompng($pngFile);

    // Path to save JPG file
    $jpgFile = $directoryName.'/'.pathinfo($file, PATHINFO_FILENAME).'.jpg';

    // Save JPG file with 75% quality
    imagejpeg($im, $jpgFile, 75);

    // Free up memory
    imagedestroy($im);

    // Output success message
    echo "Image converted successfully! ".$file."<br>";
    //print_r(getAllPNGInThisFolder()[0]);
    
   }
    echo "<br>";
    echo '<a href="./index.php">Go back</a>';
}

// Redirect the user to a new page
  function redirectUser(){
    header("Location: index.php");
    exit;
  }

  function createDirectory($directoryName){
    // Check if the directory exists
    if (!file_exists($directoryName)) {
      // Create the directory
      mkdir($directoryName);
    }
    return $directoryName;
  }
  function getAllPNGInThisFolder(){
    // Define the directory path to search for PNG files
    $directory = "../";

    // Get a list of all files in the directory
    $fileList = scandir($directory);

    // Initialize an array to store the PNG file names
    $pngFiles = array();

    // Loop through each file in the directory
    foreach ($fileList as $file) {
      // Check if the file is a PNG file
      if (pathinfo($file, PATHINFO_EXTENSION) == "png") {
        // Add the file name to the PNG file array
        $pngFiles[] = $file;
      }
    }

    // Output the PNG file names
    return($pngFiles);
  }
?>