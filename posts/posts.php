<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="posts.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

  <div class="body">
    <div class="container custom-padding">
      <div class="row justify-content-center">
        <div class="col">
          <h1>SoundScape</h1>
        </div>
        <div class="col">
          <a href="music.php">Музыка</a>
        </div>
        <div class="col">
          <a href="posts.php">Посты</a>
        </div>
        <div class="col">
          <a href="main.php">О проекте</a>
        </div>
      </div>
    </div>
    <div class="logo">
      <span>
        <h1>SoundScape</h1>
        <h3>Your Life. Your Sounds</h3>
        <a href="addposts.php">Добавить свой пост +</a>
      </span>
    </div>
    <div class="oproekte">

      <h3 id="info">Посты</h3>
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 'on');

      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'blog';
      session_start();
      // Подключение к базе данных
      $conn = mysqli_connect($host, $user, $pass, $db);

      // Проверка соединения
      if (!$conn) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
      }

      // Выполнение SQL-запроса для выборки постов из базы данных
      $sql = "SELECT * FROM posts";
      $result = mysqli_query($conn, $sql);

      // Вывод постов на странице
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<h2>" . $row["name"] . "</h2>";
          echo "<p>" . $row["text"] . "</p>";
        }
      } else {
        echo "Нет постов для отображения";
      }

      // Закрытие соединения с базой данных
      mysqli_close($conn);
      ?>

    </div>
    <br>
    <div class="footer">
      <p>©
        <?php
        $current_year = date('Y');
        echo $current_year;
        ?> М. Пивненко
      </p>
    </div>
  </div>
</body>

</html>