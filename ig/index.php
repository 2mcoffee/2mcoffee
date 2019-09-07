<?php include '../include/header.php'; ?>
<body>
<?php include '../include/hamburger.php'; ?>
<table class="content">
    <tr>
        <td class="bar">
        <?php include '../include/bar.php'; ?>   
        </td>
        <td style="width:80%;">
            <br>
            <br>
            <?php
            $access_token = "1996905208.ed896b3.e11366fd165e4090882cbb85c75c564d";
            $photo_count = 20;
            $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
            $json_link .="access_token={$access_token}&count={$photo_count}";
            $json = file_get_contents($json_link);
            $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);

            foreach ($obj['data'] as $post){
                $pic_text = $post['caption']['text'];
                $pic_link = $post['link'];
                $pic_like_count = $post['likes']['count'];
                $pic_comment_count=$post['comments']['count'];
                $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
                $pic_created_time=date("F j, Y", $post['caption']['created_time']);
                $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

                echo '            <div class="instagram">'."\n";
                echo '              <a href="'.$pic_link.'" target="_blank"> <img src="'.$pic_src.'" alt="'.$pic_text.'"></a>'."\n";
                echo '              <br>'."\n";
                echo '              '.$pic_text."\n";
                echo '              <br>'."\n";
                echo '              <span>'.$pic_created_time.' | ❤️'.$pic_like_count.' | 💬'.$pic_comment_count.'</span>'."\n";
                echo '            </div>'."\n";
                echo '            <br>'."\n";
            }
            ?>
            <br>
            <?php include '../include/license.php'; ?>
            <br>
        </td>
    </tr>
</table>
<?php include '../include/footer.php'; ?>