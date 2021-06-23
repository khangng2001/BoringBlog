<?php
include_once './path.php';
include_once(ROOT_PATH . "/app/controllers/posts.php");

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$posts = selectAll('posts', ['published' => 1]);
$topics = selectAll('topics');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title><?php echo $post['title']; ?></title>
</head>

<body>


  <?php include_once 'app/include/header.php'; ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <img style="display:block; margin-left: auto; margin-right: auto; width: 60%;" src="<?php echo "./assets/images/{$post['image']}"; ?>" alt=""> <br>
          <h1 class="post-title"><?php echo $post['title']; ?></h1>
          <div class="post-content">
            <p><?php echo html_entity_decode($post['body']); ?></p>
          </div>

        </div>
      </div>
      <!-- // Main Content -->

      <!-- Sidebar -->
      <div class="sidebar single">
        <div class="section popular">
          <h2 class="section-title">Popular</h2>
          <?php foreach ($posts as $key => $value) : ?>
            <div class="post clearfix">
              <img src="<?php echo "./assets/images/{$value['image']}"; ?>" alt="">
              <a href="" class="title">
                <h4><?php echo $value['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
          
        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $key => $topic) : ?>
              <li><a href="<?php echo './index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <!-- footer -->
  <?php include_once 'app/include/footer.php' ?>
  <!-- // footer -->


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>