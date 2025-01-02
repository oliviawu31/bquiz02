<fieldset style='width:85%;margin:auto'>
    <legend>最新文章管理</legend>
    <!-- table.ct>(tr>th*4)+(tr>td*4) -->
    <table class="ct" style="width:100%">
        <tr>
            <th>編號</th>
            <th width="50%">標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <?php
          // 確定總共有多少條新聞資料
        $total=$News->count();
        // 每頁顯示的新聞數量
        $div=3;
        // 計算總頁數，四捨五入後得到
        $pages=ceil($total/$div);
        // 取得目前頁數，若沒有指定則預設為第 1 頁
        $now=$_GET['p']??1;
        // 計算起始的資料索引，基於目前頁數
        $start=($now-1)*$div;
        // 根據當前頁數取得對應的新聞資料
        $rows=$News->all(" Limit $start,$div");
        foreach($rows as $idx=> $row):

        ?>

        <tr>
            <!-- 顯示編號：起始索引加上目前的索引值再加1 -->
            <td><?=$start+$idx+1;?></td>
            <td><?=$row['title'];?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">

        <?php endforeach; ?>
    </table>


    <div class="ct">
        <?php
        if(($now-1)>0){
        echo "<a href='?do=news&p=".($now-1)."'> &lt;</a>";
        }
        for($i=1;$i<=$pages;$i++){ $size=($i==$now)?"24px":"16px";
            echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>" ; } if(($now+1)<=$pages){
            echo "<a href='?do=news&p=" .($now+1)."'> &gt;</a>";
            }

            ?>
    </div>
    <div class="ct">
        <button onclick="edit()">確定修改</button>
    </div>

</fieldset>

<script>
function edit() {
    /* let ids=$("input[name='id[]']")
             .map((idx,item)=>{
                return $(item).val()
              }).get(); */
    let ids = $("input[name='id[]']")
        .map((idx, item) => $(item).val()).get();
    let del = $("input[name='del[]']:checked")
        .map((idx, item) => $(item).val()).get();
    let sh = $("input[name='sh[]']:checked")
        .map((idx, item) => $(item).val()).get();
    $.post("./api/edit_news.php", {
        ids,
        sh,
        del
    }, (res) => {
        //console.log(res);
        location.reload();
    })

}
</script>