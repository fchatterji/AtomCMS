<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $title = mysqli_real_escape_string($connection, $_POST['title']);
  $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
  $slug = mysqli_real_escape_string($connection, $_POST['slug']);
  $label = mysqli_real_escape_string($connection, $_POST['label']);
  $header = mysqli_real_escape_string($connection, $_POST['header']);
  $body = mysqli_real_escape_string($connection, $_POST['body']);

  if($_POST['id'] != '') {
    $action = 'updated';
    $query = "UPDATE pages 
              SET title = '$title', slug= '$slug', user_id= '$user_id', label= '$label', header= '$header', body= '$body'
              WHERE id='$_GET[id]'
              ";
  } else {
    $action = 'added';
    $query = "INSERT INTO pages (title, slug, user_id, label, header, body) 
              VALUES ('$title', '$slug', '$user_id', '$label', '$header', '$body')
              ";        
  }



  $result = mysqli_query($connection, $query);

  if ($result) {
    $message =  '<p>Page was '.$action.'!</p>';

  } else {
    $message = '<p>Pages could not be '.$action.'because: '.mysqli_error($connection).'</p>';
    $message .= '<p>'.$query.'</p>';
  }
}
?>