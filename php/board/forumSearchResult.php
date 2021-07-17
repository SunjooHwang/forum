<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';

    

    $searchKeyword = $dbConnect->real_escape_string($_POST['footer__search-text']);
    $searchOption = $dbConnect->real_escape_string($_POST['searchOption']);

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
    <link rel="stylesheet" href="../../css/forumSearchResultStyle.css" />
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
    <?php

        function showAlert($alert) {
            echo '<script type=text/javascript> alert("'.$alert.'")</script>';
        }

        if ($searchKeyword == '' || $searchKeyword == null) {
            showAlert("검색어를 입력해 주세요.");
            // Header("Location:../../index.php");
            exit;
        }

        switch ($searchOption) {
            case 'title':
                case 'content':
                case 'tAndC':
                case 'tOrC':
                    break;
                default :
                    showAlert("검색 옵션을 선택하세요.");
                    // Header("Location:../../index.php");
                    exit;
                    break;
        }

        $sql = "SELECT b.boardID, b.title, m.memberID, b.regTime FROM forumboard b ";
        $sql .= "JOIN member m ON (b.memberID = m.memberID)";

        switch ($searchOption) {
            case 'title':
                $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
                break;
            case 'content':
                $sql .= "WHERE b.content LIKE '%{$searchKeyword}'";
                break;
            case 'tAndC':
                $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
                $sql .= " AND ";
                $sql .= "b.content LIKE '%{$searchKeyword}'";
                break;
            case 'tOrC':
                $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
                $sql .= " OR ";
                $sql .= "b.content LIKE '%{$searchKeyword}'";
                break;
            }

        $result = $dbConnect -> query($sql);

        if ($result) {
            $dataCount = $result ->num_rows;
        } else {
            echo "ERROR!!!!";
            exit;
        }
    ?>
      <section class="search-result">
        <table class="search-result__table">
        <thead class="search-result__table__header">
                <th class="search-result__table__header-item">No.</th>
                <th class="search-result__table__header-item">제목</th>
                <th class="search-result__table__header-item">작성자</th>
                <th class="search-result__table__header-item">작성일</th>
            </thead>
            <tbody class="search-result__table__posts-section">
                <?php
                    if ($dataCount > 0) {
                        for ($i = 0; $i < $dataCount; $i ++) {
                            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

                            echo "<tr>";
                            echo "<td>".$memberInfo['boardID']."</td>";
                            echo "<td class='col_title'><a href='./185-view.php?boardID={$memberInfo['boardID']}'>";
                            echo "{$memberInfo['title']}</a></td>";
                            echo "<td>".$memberInfo['userName']."</td>";
                            echo "<td>".date('Y-m-d H:1', $memberInfo['regTime'])."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>{$searchKeyword}를 포함하는 게시글이 없습니다. </td></tr>";
                    }
                ?>
            </tbody>
        </table>
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
