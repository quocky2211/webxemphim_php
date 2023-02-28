<?php
    require './ConnectDB/connect.php';
    $con = ketnoi();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/xemphim.css">
    <script src="/web.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TTKmovie.net</title>
</head>

<body>
    <div id="progressbar"></div>
    <header class="header">
        <?php require './GiaoDien/header-with-search.php'; ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>
    <?php
    $MaPhim = $_GET['id'];
    $Tap = $_GET['ep'];

    $sql = "SELECT * FROM `phim` WHERE `MaPhim` = '$MaPhim'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    ?>
    <div class="container">
        <div class="cover-zone">
            <div id="player-zone" class="player-zone-center-container">
                <div class="player-zone-top">
                    <h1>
                        <a href="./xemchitietphim.php?id=<?php echo $MaPhim; ?>" class="video-infor-link">
                            Xem thông tin phim | <?php echo $row['TenPhim']; ?> Tập <?php echo $Tap; ?>
                        </a>
                    </h1>
                </div>
                <?php
                    $sql01 = "SELECT * FROM `tapphim` WHERE `MaPhim` = '$MaPhim' AND `ThuTu` = '$Tap'";
                    $result01 = mysqli_query($con, $sql01) or die(mysqli_error($con));
                    $row01 = mysqli_fetch_assoc($result01);
                ?>
                <div class="video-screen">
                    <video class="video-player" controls>
                        <source src="./Admin/file/video/<?php echo $row01['FilePhim']; ?>" type="video/mp4">
                    </video>
                </div>
                <div class="user-selection">
                    <div class="selection-bar">
                        <ul class="select-list">
                            <li class="selection">
                                <a class="bar-TTK" style="cursor: pointer;">
                                    <i class="material-icons">error_outline</i><br>
                                    Báo lỗi phim
                                </a>
                            </li>
                            <li class="selection">
                                <a class="bar-TTK" style="cursor: pointer;" onclick="window.location.reload()">
                                    <i class="material-icons">refresh</i><br>
                                    Tải lại trang
                                </a>
                            </li>
                            <li class="selection">
                                <a class="bar-TTK" style="cursor: pointer;" <?php if ($Tap != 1) echo 'href="./xemphim.php?id=' . $MaPhim . '&ep=' . ($Tap - 1) . '"' ?>>
                                    <i class="material-icons">skip_previous</i><br>
                                    Tập Trước
                                </a>
                            </li>
                            <li class="selection">
                                <a class="bar-TTK" style="cursor: pointer;">
                                    <i class="material-icons">lightbulb_outline</i><br>
                                    Tắt đèn
                                </a>
                            </li>
                            <li class="selection">
                                <a class="bar-TTK" style="cursor: pointer;" <?php if ($Tap < $row['SoTapPhim']) echo 'href="./xemphim.php?id=' . $MaPhim . '&ep=' . ($Tap + 1) . '"' ?>>
                                    <i class="material-icons">skip_next</i><br>
                                    Tập Sau
                                </a>
                            </li>
                            <li class="selection">
                                <a class="bar-TTK">
                                    <i class="material-icons">image</i><br>
                                    Chụp ảnh
                                </a>
                            </li>
                            <li class="selection">
                                <?php
                                    if(isset($_SESSION['id']))
                                    {
                                        $sql06 = "SELECT * FROM `yeuthich` WHERE `MaTK` = '$_SESSION[id]' AND `MaPhim` = '$MaPhim'";
                                        $result06 = mysqli_query($con,$sql06) or die(mysqli_error($con));
                                        $num = mysqli_num_rows($result06);
                                        if($num > 0)
                                        {
                                            ?>
                                            <a id="RemoveLikeList" class="bar-TTK" style="cursor: pointer">
                                                <i class="material-icons" style="color: red;">favorite_border</i><br>
                                                Hủy Thích
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a id="AddLikeList" class="bar-TTK" style="cursor: pointer">
                                                <i class="material-icons">favorite_border</i><br>
                                                Thích
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <a id="AddLikeList" class="bar-TTK" style="cursor: pointer">
                                            <i class="material-icons">favorite_border</i><br>
                                            Thích
                                        <?php
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="ep-zone" style="margin-bottom: 0px;">
                    <div class="server-zone" style="margin-bottom:0; ">
                        <div class="video-server-part">
                            <div class="server">
                                <span class="svname">Server TTKMovie</span>
                            </div>
                            <div class="episodelist" style=" max-height: 250px; overflow: auto; overflow-x: hidden; ">
                                <?php
                                    $sql02 = "SELECT * FROM `tapphim` WHERE `MaPhim` = '$MaPhim'";
                                    $result02 = mysqli_query($con,$sql02) or die(mysqli_error($con));
                                    while ($row02 = mysqli_fetch_assoc($result02))
                                    {
                                        ?>
                                            <a href="./xemphim.php?id=<?php echo $MaPhim; ?>&ep=<?php echo $row02['ThuTu']; ?>" title="Tập <?php echo $row02['ThuTu']; ?>" <?php if($row02['ThuTu'] == $Tap) echo 'class="ep active"'; else echo 'class="ep"'; ?>>Tập <?php echo $row02['ThuTu']; ?></a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </ul>
                <div class="comment_zone">
                    <div class="cmt-zone">
                        <div style="background:#ccc;padding:10;border: 1px solid #ccc">
                            <div id="u_0_0_RL" style="width: 552px;">
                                <div class="cmt-container">
                                    <div class="start-cmt-zone">
                                        <div class="start-cmt-zone01" style="width: 100%; height: 50px;">
                                            <div class="cmt-count-num">
                                                <span><span class="c-num">0 bình luận</span></span>
                                            </div>
                                        </div>
                                        <div class="start-cmt-zone02" direction="left">
                                            <input type="text" id="cmt" placeholder="Thêm Bình luận" style="outline: none; user-select: text; white-space: pre-wrap; overflow-wrap: break-word;">
                                            <button id="ThemCmt">Thêm</button>                                                                        
                                        </div>
                                        <div id="cmt-box" class="start-cmt-zone03">
                                            <?php
                                                $sql03 = "SELECT * FROM `binhluan` WHERE `MaPhim` = '$MaPhim'";
                                                $result03 = mysqli_query($con,$sql03) or die(mysqli_error($con));
                                                while ($row03 = mysqli_fetch_assoc($result03))
                                                {
                                                    $id = $row03['MaTK'];
                                                    $sql05 = "SELECT * FROM `account` WHERE `MaTK`= '$id'";
                                                    $result05 = mysqli_query($con,$sql05) or die(mysqli_error($con));
                                                    $row05 = mysqli_fetch_assoc($result05);
                                                    
                                                    ?>
                                                    <div class="cmt-item">
                                                        <div class="cmt-user-img">
                                                            <img src="./Admin/file/image/user.png" style="margin-right:8px; width:48px; height:48px;">
                                                        </div>
                                                        <div>
                                                            <div class="cmt-content">
                                                                <div>
                                                                    <div>
                                                                        <span>
                                                                            <a class="cmt-username"><?php echo $row05['Name']; ?></a>
                                                                        </span>
                                                                        <div class="cmt-infor">
                                                                            <div>
                                                                                <span>
                                                                                    <span class="cmt">
                                                                                        <span><?php echo $row03['ThongTinBL'] ?></span>
                                                                                    </span>
                                                                                </span>
                                                                                <span></span>
                                                                            </div>
                                                                            <?php
                                                                                if(isset($_SESSION['id']))
                                                                                {
                                                                                    if($_SESSION['role'] == 'Admin')
                                                                                    {
                                                                                        ?>
                                                                                        <div>
                                                                                            <a style="cursor: pointer; color:red;" onclick="return Del('<?php echo $row03['MaBL']; ?>','BinhLuan')">Xóa</a>
                                                                                        </div>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                                                                                                                                                              
                    <div class="ads-zone">
                        <div class="ads-play">
                            <?php
                                $sql04 = "SELECT * FROM `quangcao` ORDER BY RAND() LIMIT 1";
                                $result04 = mysqli_query($con,$sql04) or die(mysqli_error($con));
                                while($row04 = mysqli_fetch_assoc($result04))
                                {
                                    ?>
                                    <a href="<?php echo  $row04['Link']; ?>" ><img style="max-width: 300px; max-height: 250px; width:300px; height:250px;" src="./Admin/file/image/<?php echo $row04['Banner']; ?>"></a> 
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__left">
            <div class="header__logo-text">
                <b>TTKmovie</b>
                <span>NET</span>
            </div>
            <p class="par">Nơi cập nhật những bộ phim mới hot nhất hiện nay.</p>
        </div>
        <div class="footer__right">
            <span class="footer__right-name">Thông Tin</span>
            <ul class="footer__right-list">
                <li class="footer__right-item">
                    <a href="#">Điều khoản sử dụng</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Bản quyền và trách nhiệm nội dung</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Admin: trankhiem1308@gmai.com</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Liên hệ QC: ads.movies123@gmail.com</a>
                </li>
            </ul>
        </div>
    </footer>
    <div class="footer1">
        <div class="footer1-left">
            <p>© 2022 Copyright
                <a href="#">
                    <b class="ft-name">TTKmovie.net</b>
                </a>
                . All Rights reserved.
            </p>
        </div>
        <div class="footer1-right">
            <a href="#">Back to top
                <i class="footer1-right__icon fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#ThemCmt").click(function(){
            <?php if(isset($_SESSION["id"])) {
                    $user = $_SESSION["id"];
                }
                else {
                    $user = "";
                }
             ?>
             var user_id = '<?php echo $user; ?>';
             if(user_id == "")
             {
                location.href = './login.php';
             }
             else
             {
                var MaPhim = <?php echo $MaPhim; ?>;
                var Cmt = document.getElementById("cmt").value;
                $.post ('./xuly/xulycmt.php', {MaPhim: MaPhim, MaTK: user_id, Cmt: Cmt} , function(ReturnData)
                {
                    if(ReturnData == 1)
                    {
                        alert("Bình luận thành công");
                        //$("#cmt-box").load("#cmt-box");
                    }
                })
             }
        })
    }) 
    $("#AddLikeList").click(function() {
        <?php if(isset($_SESSION["id"])) {
                    $user = $_SESSION["id"];
                }
                else {
                    $user = "";
                }
             ?>
             var user_id = '<?php echo $user; ?>';
             if(user_id == "")
             {
                location.href = './login.php';
             }
             else
             {
                var MaPhim = <?php echo $MaPhim; ?>;
                $.post ('./xuly/xulyyeuthich.php', {MaPhim: MaPhim, MaTK: user_id} , function(ReturnData) {
                    if(ReturnData == 1)
                    {
                        alert("Đã thêm vào danh sách yêu thích");
                        location.reload();
                    }
                })
             }
    })
    $("#RemoveLikeList").click(function() {
        <?php if(isset($_SESSION["id"])) {
                    $user = $_SESSION["id"];
                }
                else {
                    $user = "";
                }
             ?>
             var user_id = '<?php echo $user; ?>';
             if(user_id == "")
             {
                location.href = './login.php';
             }
             else
             {
                var MaPhim = <?php echo $MaPhim; ?>;
                $.post ('./xuly/xulyhuythich.php', {MaPhim: MaPhim, MaTK: user_id} , function(ReturnData) {
                    if(ReturnData == 1)
                    {
                        alert("Đã xóa khỏi danh sách yêu thích");
                        location.reload();
                    }
                })
             }
    })
</script>
<script>
    function Del(id,place) {
    if(confirm("Bạn có chắc chắn muốn xóa bình luận này không ?"))
        document.location = './Admin/model/delete_model.php?id='+ id +'&place=' + place;
}
</script>