<fieldset>
    <legend>目前位置：首頁> 最新文章區</legend>
    <table style="width: 100%;">
        <tr>
            <th width="20%">標題</th>
            <th width="60%">內容</th>
            <th></th>
        </tr>
        <?php
        // $total 取得所有符合條件的新聞數量
        $total=$News->count();
        // $div 變數設置每頁顯示的新聞數量
        $div=5;
         // $pages 透過 ceil() 函數計算總頁數，總頁數 = 總新聞數 / 每頁顯示數量
        $pages=ceil($total/$div);
        // 獲取當前頁數，預設為第 1 頁
        $now=$_GET['p']??1;
        // 計算從哪一筆新聞開始顯示，根據當前頁數 ($now) 計算開始的索引值
        $start=($now-1)*$div;
        // 使用 all() 方法從資料庫查詢顯示的新聞列表，並加上 LIMIT 分頁條件
        $rows=$News->all(['sh'=>1]," Limit $start,$div");
        // 使用 foreach 循環列出每一筆新聞資料
        foreach($rows as $row):
        ?>
        <!-- 顯示每一筆新聞的標題與簡短內容 -->


        <tr>
            <!-- 顯示新聞標題 -->
            <td><?=$row['title'];?></td>
            <!-- 顯示新聞內容的前 25 個字元，並加上省略號 -->
            <td><?=mb_substr($row['news'],0,25);?>...</td>
            <td>
                <?php
                if (isset($_SESSION['user'])){
                    $chk=$Log->count(['news'=>$row['id'],'user'=>$_SESSION['user']]);
                    $like=($chk>0)?"收回讚":"讚";
                    echo "<a href='#' data-id='{$row['id']}' class='like'>$like</a>";
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!-- 分頁導航區 -->
    <div>
        <?php 
            // 如果當前頁數大於 1，顯示上一頁的連結
            // &lt;   =>less than 小於符號 <
            if(($now-1)>0){
                echo "<a href='?do=news&p=".($now-1)."'> &lt;</a>";
            }
            for($i=1;$i<=$pages;$i++){
            // 判斷當前頁數是否為當前頁面，若是則設置字體大小為 24px，否則為 16px
                $size=($i==$now)?"24px":"16px";
            // 顯示每一頁的頁數連結
                echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>";
            }
            // 如果當前頁數小於總頁數，顯示下一頁的連結
            if(($now+1)<=$pages){
            // &gt; =>greater than 是 大於符號 >
                echo "<a href='?do=news&p=".($now+1)."'> &gt;</a>";
            }
?>
    </div>


</fieldset>

<script>
$(".like").on("click", function() {
    let id = $(this).data('id');
    let like = $(this).text();

    $.post("./api/like.php", {
        id
    }, () => {
        switch (like) {
            case "讚":
                $(this).text("收回讚");
                break;
            case "收回讚":
                $(this).text("讚");
                break;
        }
    })
})
</script>