<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/checkSignSession.php';
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
    <link rel="stylesheet" href="../../css/writePostFormStyle.css" />
  </head>
  <body>
    <header>
      <nav class="nav-bar">
      <div class="nav-bar__menu-wrap-dt">
          <a href="../../index.php" class="nav-bar__menu-item">main</a>
          <a href="#" class="nav-bar__menu-item">about</a>
          <a href="forumBoardList.php" class="nav-bar__menu-item">forum</a>
        </div>
        <div class="nav-bar__ham-btn-mb">
          <i class="fas fa-bars" id="hamBtn"></i>
        </div>

        <div class="nav-bar__menu-wrap-mb">
          <div class="nav-bar__close-btn-mb">
            <i class="fas fa-times" id="closeBtn"></i>
          </div>
          <a href="../../index.php" class="nav-bar__menu-item">main</a>
          <a href="#" class="nav-bar__menu-item">about</a>
          <a href="forumBoardList.php" class="nav-bar__menu-item">forum</a>
        </div>
        <?php
            
            include $_SERVER['DOCUMENT_ROOT'].'/forum/php/checkSignSession.php';
            if (!isset($_SESSION['memberID'])) {
          ?>
        <ul class="nav-bar__message guest-message">
          <li class="nav-bar__meassage-item">
            <a href="../../signInForm.php">sign in</a>
          </li>
          <li class="nav-bar__meassage-item">환영합니다, 손님.</li>
        </ul>
        <?php
            } else {
        ?>
        <ul class="nav-bar__message member-message">
          <li class="nav-bar__message-item">
            <a href="../member/signOut.php">sign out</a>
          </li>
          <li class="nav-bar__message-item">
            환영합니다,
            <?php
                        echo $_SESSION['memberID'];
                    ?>
            님.

            <?php
                      }
                  ?>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <?php
          if(!isset($_SESSION['memberID'])) {
      ?>
        <section class="signin-needed-section">
          <h1 class="signin-needed__message">
            로그인이 필요한 메뉴입니다.
          </h1>
        </section>
      <?php
        } else {
      ?>
      <section class="writePost-section">
        <form name="writePost" id="writePost" method="POST" action="savePost.php">
          <div class="writePost-form__title-wrap">
            <label for="title">제목</label>  
            <input type="text" name="title" id="title" required/>
          </div>
          <textarea name="content" id="content" cols="80" rows="20" placeholder="여기에 내용을 입력하세요." required>
          </textarea>
          <input type="submit" value="작성" id="postSbmBtn"/>
        </form>
      </section>
      <?php
        }
      ?>
    </main>
    <footer>
    <ul class="footer__link-wrap">
        <h1 class="footer__link-warp-title">Links</h1>
        <li class="footer__link">
          <a class="footer__link__item" href="https://www.github.com">github</a>
        </li>
      </ul>
      <ul class="footer__sns-wrap">
        <h1 class="footer__sns-wrap-title">Social Network</h1>
        <li class="footer__sns">
          <a href="https://www.facebook.com" class="footer__sns__item"
            >facebook</a
          >
        </li>
        <li class="footer__sns">
          <a href="https://www.twitter.com" class="footer__sns__item"
            >twitter</a
          >
        </li>
        <li class="footer__sns">
          <a href="https://instagram.com" class="footer__sns__item"
            >instagram</a
          >
        </li>
      </ul>
      <ul class="footer__search-wrap">
        <form action="#" method="get" name="footer__search-form">
          <label for="footer__search-text">Search</label>
          <div class="footer__search-form__input-wrap">
            <input
              type="search"
              name="footer__search-text"
              id="footer__search-text"
            />
            <input type="submit" id="footerSrchSbmBtn" value="search" />
          </div>
        </form>
      </ul>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>
    <!-- custom -->
    <script src="../../js/index_scrolltrigger.js"></script>
    <script src="../../js/index.js"></script>
  </body>
</html>
