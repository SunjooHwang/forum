<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORUM</title>
    <!-- css -->
    <link rel="stylesheet" href="../../css/default.css" />
    <link rel="stylesheet" href="../../css/index.css" />
  </head>
  <body>
    <header>
      <nav class="nav-bar">
        <a href="../../index.php" class="nav-bar__menu">main</a>
        <a href="#" class="nav-bar__menu">about</a>
        <a href="../../board_list.php" class="nav-bar__menu">forum</a>
        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/forum/php/checkSignSession.php';
            if (!isset($_SESSION['memberID'])) {
          ?>
        <a href="../../signInForm.html" class="nav-bar__menu">sign in</a>
        <div class="nav-bar__guest-message">
          환영합니다, 손님. </div>
        <?php
            } else {
        ?>
        <a href="../member/signOut.php">sign out</a>
        <div class="nav-bar__member-message">환영합니다,
          <?php
              echo $_SESSION['memberID'];
          ?>
        님. </div>
        <?php
            }
        ?>
      </nav>
    </header>
    <main>
      <section class="writePost-section">
        <form name="writePost" id="writePost" method="POST" action="savePost.php">
          <div class="writePost-form__title-wrap">
          <label for="title">제목</label>  
          <input type="text" name="title" id="title" required/>
          </div>
          <textarea name="content" id="content" cols="80" rows="10" placeholder="여기에 내용을 입력하세요." required>
          </textarea>
          <input type="submit" value="작성" id="postSbmBtn"/>
        </form>
      </section>
    </main>
    <footer>
      <ul class="footer__link-wrap">
        <li class="footer__link">
          <a class="footer__link__item" href="https://www.github.com">github</a>
        </li>
      </ul>
      <ul class="footer__sns-wrap">
        <li class="footer__sns">
          <a href="https://www.facebook.com" class="footer__sns__item"
            >facebook</a
          >
          <a href="https://www.twitter.com" class="footer__sns__item"
            >twitter</a
          >
          <a href="https://instagram.com" class="footer__sns__item"
            >instagram</a
          >
        </li>
      </ul>
      <ul class="footer__search-wrap">
        <form action="#" method="get" name="footer__search-form"></form>
      </ul>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>
  </body>
</html>
