<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORUM</title>
    <!-- css -->
    <link rel="stylesheet" href="css/default.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/signInStyle.css?after" />
    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/1165ec50ee.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <nav class="nav-bar">
        <div class="nav-bar__menu-wrap-dt">
          <a href="index.php" class="nav-bar__menu-item">main</a>
          <a href="#" class="nav-bar__menu-item">about</a>
          <a href="./php/board/forumBoardList.php" class="nav-bar__menu-item"
            >forum</a
          >
        </div>
        <div class="nav-bar__ham-btn-mb">
          <i class="fas fa-bars" id="hamBtn"></i>
        </div>

        <div class="nav-bar__menu-wrap-mb">
          <div class="nav-bar__close-btn-mb">
            <i class="fas fa-times" id="closeBtn"></i>
          </div>
          <a href="index.php" class="nav-bar__menu-item">main</a>
          <a href="#" class="nav-bar__menu-item">about</a>
          <a href="./php/board/forumBoardList.php" class="nav-bar__menu-item"
            >forum</a
          >
        </div>
        <?php
            
            include './php/session.php';
            include './php/checkSignSession.php';
            if (!isset($_SESSION['memberID'])) {
          ?>
        <ul class="nav-bar__message guest-message">
          <li class="nav-bar__meassage-item">
          <a href="signInForm.php">sign in</a>
          </li>
          <li class="nav-bar__meassage-item">환영합니다, 손님.</li>
        </ul>
        <?php
            } else {
        ?>
        <ul class="nav-bar__message member-message">
          <li class="nav-bar__message-item">
            <a href="php/member/signOut.php">sign out</a>
          </li>
          <li class="nnav-bar__message-item">
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
      <section class="signin-section">
        <form
          name="signIn"
          id="signIn"
          action="php/member/signInProcessing.php"
          method="POST"
        >
          <h1 class="signin__title">Sign In</h1>
          <input
            type="email"
            name="userEmail"
            id="userEmail"
            placeholder="Email"
            required
          />
          <input
            type="password"
            name="userPw"
            id="userPw"
            placeholder="Password"
            required
          />
          <input
            type="submit"
            value="Submit"
            name="signInSbmBtn"
            id="signInSbmBtn"
          />
          <div class="link-to-signUp">
            처음 방문하셨나요?
            <a href="signUpForm.php">회원가입하기</a>
          </div>
        </form>
      </section>
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
        <form
          action="php/board/forumSearchResult.php"
          method="POST"
          name="footer__search-form"
        >
          <label for="footer__search-text">Search</label>
          <div class="footer__search-form__input-wrap">
            <select name="searchOption" id="searchOption">
              <option value="title">제목</option>
              <option value="content">내용</option>
              <option value="tAndC">제목과 내용</option>
              <option value="tOrC">제목 또는 내용</option>
            </select>
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
