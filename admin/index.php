<?php

# Start the session
session_start();

if(!isset($_SESSION['email'])) {
  header('location: login.php');
}
?>

<?php include('config/setup.php'); ?>


<!DOCTYPE html>
<html>

<head>
  <title><?php echo $site_title.' | '.$page['title'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include('config/css.php'); ?>
  <?php include('config/js.php'); ?>
</head>

<body>

  <!-- Main navigation-->
  <?php include(DEFAULT_TEMPLATE_PATH.'/navigation.php'); ?>

  <h1>Admin dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">

              <a href="index.php" class="list-group-item">
                <h4 class="list-group-item-heading"><i class="fa fa-plus"></i>New page</h4>
              </a>
  
              <?php
                $query = "SELECT * FROM pages ORDER BY title ASC";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($result)) { 

                  $extract = strip_tags(substr($row['body'], 0, 140));
                  ?>

                  <a 
                    href="index.php?id=<?php echo $row['id']; ?>" 
                    class="list-group-item
                    <?php
                      if (isset($opened_page)) {
                        if ($row['id'] == $opened_page['id']) { echo 'active'; }   
                      }
                    ?> 
                    "
                    
                  >
                    <h4 class="list-group-item-heading"><?php echo $row['title']; ?></h4>
                      <p class="list-group-item-text"><?php echo $extract ?></p>
                  </a>
                <?php } ?>

            </div>
        </div>


        <div class="col-md-9">
          
          <?php  if (isset($message)) { echo $message; } ?>
          


          <form action="index.php?id=<?php if (isset($opened_page)) { echo $opened_page['id']; } ?>" method="post">

            <div class="form-group">
              <label for="title">Title:</label>
              <input 
                type="text" 
                class="form-control" 
                name="title" 
                id="title" 
                placeholder="Title" 
                value="<?php if (isset($opened_page)) { echo $opened_page['title']; } ?>">
            </div>

            <div class="form-group">

              <label for="user">user:</label>
              <select class="form-control" name="user_id" id="user">
                <option value="0">No user</option>
                <?php 
                  $query = "SELECT * FROM users ORDER BY first_name ASC";
                  $result = mysqli_query($connection, $query);

                  while($user_list = mysqli_fetch_assoc($result)) { 

                    $user_data = data_get_user_data($connection, $user_list['email']);
                    ?>

                    <option 
                      value="<?php echo $user_data['id']?>" 
                      <?php 
                        if (isset($opened_page)) {
                          if ($user_data['id'] == $opened_page['user_id']) { echo 'selected'; }   
                        } else {
                          if ($user_data['id'] == $user['id']) { echo 'selected'; }   
                        }
                      ?>
                    >
                        <?php echo $user_data['full_name'] ?>        
                    </option>
                  <?php } ?>
              
              </select>

            </div>


            <div class="form-group">
              <label for="slug">Slug:</label>
              <input 
                type="text" 
                class="form-control" 
                name="slug" 
                id="slug" 
                placeholder="Slug" 
                value="<?php if (isset($opened_page)) { echo $opened_page['slug']; } ?>"
              >
            </div>


            <div class="form-group">
              <label for="label">Label:</label>
              <input 
                type="text" 
                class="form-control" 
                name="label" 
                id="label" 
                placeholder="Label" 
                value="<?php if (isset($opened_page)) { echo $opened_page['label']; } ?>"
              >
            </div>


            <div class="form-group">
              <label for="header">Header:</label>
              <input 
                type="text" 
                class="form-control" 
                name="header" 
                id="header" 
                placeholder="Header" 
                value="<?php if (isset($opened_page)) { echo $opened_page['header']; } ?>"
              >
            </div>


            <div class="form-group">
              <label for="body">Body:</label>
              <textarea 
                class="form-control tinymce_textarea" 
                name="body" 
                id="body" 
                placeholder="Body" 
                rows="8"
              >
                <?php if (isset($opened_page)) { echo $opened_page['body']; } ?>
              </textarea>
            </div>

            <button 
              type="submit" 
              class="btn btn-default">
                Submit
            </button>

            <input 
              type="hidden" 
              name="id" 
              value="<?php if (isset($opened_page)) { echo $opened_page['id']; } ?>"
            >

          </form>
        </div>
    </div>


  <!-- Footer -->
  <?php include(DEFAULT_TEMPLATE_PATH.'/footer.php'); ?>

  <!-- Debug button and console -->
  <?php if ($debug_status=='active') { include('widgets/debug_console.php'); } ?>

</body>

</html>

