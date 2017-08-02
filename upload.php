<?php 
// Pick a file extension 
if (preg_match('/^image/p?jpeg$/i', $_FILES['upload']['type'])) 
{ 
  $ext = '.jpg'; 
} 
else if (preg_match('/^image/gif$/i', $_FILES['upload']['type'])) 
{ 
  $ext = '.gif'; 
} 
else if (preg_match('/^image/(x-)?png$/i', 
    $_FILES['upload']['type'])) 
{ 
  $ext = '.png'; 
} 
else 
{ 
  $ext = '.unknown'; 
} 
 
// The complete path/filename 
$filename = 'C:/uploads/' . time() . $_SERVER['REMOTE_ADDR'] . $ext; 
 
// Copy the file (if it is deemed safe) 
if (!is_uploaded_file($_FILES['upload']['tmp_name']) or 
    !copy($_FILES['upload']['tmp_name'], $filename)) 
{ 
  $error = "Could not  save file as $filename!"; 
  include $_SERVER['DOCUMENT_ROOT'] . '/includes/error.html.php'; 
  exit(); 
}
?>