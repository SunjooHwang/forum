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
              echo $_SESSION['userName'];
          ?>
        님. </div>
        <?php
            }
        ?>
      </nav>
    </header>
    <main>
      <section class="forum-board-section">
        <table class="forum-board-list">
            <thead class="forum-board-list__header-row">
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

                    $sql = "SELECT b.boardID b.title m.userName b.regTime FROM forumboard b ";
                    $sql .= "JOIN member m ON (b.memberID = m.memberID) ORDER BY boardID ";
                    $sql .= "DESC LIMIT {$firstLimitValue}, {$numView}";

                    $result = $dbConnect->query($sql);

                    if ($result) {
                        $dataCount = $result->num_rows;

                        if ($dataCount > 0) {
                            for ($i = 0; $i < $dataCount; $i++) {
                                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                echo "<tr>";
                                echo "<td>".$memberInfo['boardID']."<td>";
                                echo "<td><a href='/forum/php/board/forumView.php?boardID=";
                                echo "{$memberInfo['boardID']}'>";
                                echo $memberInfo['title'];
                                echo "</a></td>";
                                echo "<td>{$memberInfo['userName']}</td>";
                                echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
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
            include $_SERVER['DOCUMENT_ROOT'].'/forum/php/board/forumBoardPagination.php';
            include $_SERVER['DOCUMENT_ROOT'].'/forum/php/board/forumBoardsearchForm.php';
        ?>
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
