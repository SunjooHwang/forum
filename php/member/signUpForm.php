<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FORUM</title>
    <!-- css -->
    <link rel="stylesheet" href="../../css/default.css" />
    <link rel="stylesheet" href="../../css/index.css" />
    <link rel="stylesheet" href="../../css/signUpStyle.css" />
  </head>
  <body>
    <header>
      <nav class="nav-bar">
        <a href="index.html" class="nav-bar__menu">main</a>
        <a href="#" class="nav-bar__menu">about</a>
        <a href="board_list.php" class="nav-bar__menu">forum</a>
        <a href="#" class="nav-bar__menu">sign in</a>
      </nav>
    </header>
    <main>
        <section class="signup-section">
            <form name="signUp" id="signUp" method="POST" action="./signUpSave.php" class="signup-form">
                <div class="signup-form__name-wrap">
                    <input type="text" name="firstName" id="firstName" placeholder="Firstname" required />
                    <input type="text" name="lastName" id="lastName" placeholder="Lastname" required />
                </div>
                <input type="email" name="userEmail" id="userEmail" placeholder="Email" required />
                <input type="password" name="userPw" id="userPw" placeholder="Password" required />
                <input type="password" name="userPwChk" id="userPwChk "placeholder="Confirm password" required />
                <input type="submit" value="SIGN UP" id="signUpSbmBtn">
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
