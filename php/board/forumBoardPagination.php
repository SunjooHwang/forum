<?php
    $sql = "SELECT count(boardID) FROM forumboard";
    $result = $dbConnect->query($sql);

    $boardTotalCount = $result->fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

    $totalPage = ceil($boardTotalCount / $numView);

    // 처음 page로 이동
    echo "<ul class='forum-board__pagination'>";
    echo "<li class='forum-board__pagination__first'>";
    echo "<a href='./forumBoardList.php?page=1'>〈처음</a></li>";

    // 이전 page로 이동
    if($page != 1) {
        $previousPage = $page -1;
        echo "<li class='forum-board__paination__prev'>";
        echo "<a href='./forumBoardList.php?page={$previousPage}'>이전</a></li>";
    }
        
    $pageTerm = 5;

    $startPage = $page - $pageTerm;
    if ($startPage < 1) {
        $startPage = 1;
    }
    $endPage = $page + $pageTerm;

    if ($endPage >= $totalPage) {
        $endPage = $totalPage;
    }

    for ($i = $startPage; $i <= $endPage; $i++) {
        
        echo "<li class='forum-board__pagination__no'>";
        echo "<a href='./forumBoardList.php?page={$i}'>{$i}</a></li>";
    }

    if($page != $totalPage) {
        $nextPage = $page + 1;
        echo "<li class='forum-board__pagination__next'>";
        echo "<a href='./forumBoardList.php?page={$nextPage}'>다음</a></li>";
    }

    echo "<li class='forum-board__pagination__last'>";
    echo "<a href='./forumBoardList.php?page={$totalPage}'>끝〉</a></li>";
    

?>