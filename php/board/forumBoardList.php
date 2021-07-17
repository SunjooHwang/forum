<?php
    // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';
    include '../session.php';
    include '../connection.php';
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
    <link rel="stylesheet" href="../../css/forumBoardListStyle.css" />
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
            // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/checkSignSession.php';
            include '../checkSignSession.php';

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
      <section class="forum-board-section">
        <div class="link-to-write">
          <a href="writePostForm.php">글 작성하기</a>
        </div>
        <table class="forum-board-list">
            <thead class="forum-board-list__header">
                <th class="board-list__header-item">No.</th>
                <th class="board-list__header-item">제목</th>
                <th class="board-list__header-item">작성자</th>
                <th class="board-list__header-item">작성일</th>
            </thead>
            <tbody class="forum-board-list__posts-section">
                <?php
                    if (isset($_GET['page'])) {
                        $page = (int) $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $numView = 20;

                    $firstLimitValue = ($numView * $page) - $numView;

                    $sql = "SELECT b.boardID, b.title, m.memberID, b.regTime FROM forumboard b ";
                    $sql .= "JOIN member m ON (b.memberID = m.memberID) ORDER BY boardID ";
                    $sql .= "DESC LIMIT {$firstLimitValue}, {$numView}";

                    $result = $dbConnect->query($sql);

                    if ($result) {
                        $dataCount = $result->num_rows;

                        if ($dataCount > 0) {
                            for ($i = 0; $i < $dataCount; $i++) {
                                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                echo "<tr>";
                                echo "<td class='boardID-col'>".$memberInfo['boardID']."<td>";
                                echo "<tdclass='title-col'><a href='/forum/php/board/forumView.php?boardID=";
                                echo "{$memberInfo['boardID']}'>";
                                echo $memberInfo['title'];
                                echo "</a></td>";
                                echo "<td class='userName-col'>{$memberInfo['memberID']}</td>";
                                echo "<td class='regTime-col'>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td>게시글이 없습니다.</td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php
            // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/board/forumBoardPagination.php';
            // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/board/forumBoardsearchForm.php';

            include './forumBoardPagination.php';
            include './forumBoardSearchForm.php';
    
        ?>
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
