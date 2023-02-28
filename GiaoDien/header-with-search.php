<div class="header-with-search">
    <div class="header__logo">
        <a href="./index.php" class="header__logo-link">
            <div class="header__logo-text">
                <b>TTKmovie</b>
                <span>NET</span>
            </div>
        </a>
    </div>
    <div class="header__search">
        <div class="header__search-input-wrap">
            <input id="Search-txt" type="text" class="header__search-input" placeholder="Tìm kiếm phim..">
            <div id="Result" class="header__search-history">                                     
            </div>
        </div> 
        <a href="">
            <button class="header__search-btn">
                <i class="header__search-btn-icon fas fa-search"></i>
            </button>  
        </a>             
    </div>
    <?php
        if(isset($_SESSION['user']))
        {
        ?>
        <a href="./thongtincanhan.php" class="">
            <button class="header__search-btn2">
                Chi tiết
            </button> 
        </a>
        <a href="./logout.php" class="">
            <button class="header__search-btn2">
                Đăng xuất
            </button> 
        </a>  
        <?php
        } 
        else
        {
        ?>
        <a href="./logup.php" class="">
            <button class="header__search-btn2">
                Đăng ký
            </button> 
        </a>
        <a href="./login.php" class="">
            <button class="header__search-btn3">
                Đăng nhập
            </button> 
        </a> 
        <?php
        }
    ?>           
</div>
<script>
  $(document).ready(function(){
    $("#Search-txt").keyup(function(){
        var search = $("#Search-txt").val();
        var DropdownResult = $(this).siblings("#Result");
        if(search != "") 
        {
            $.get("./xuly/search.php",{TuKhoa: search}).done(function(ReturnData){
                DropdownResult.html(ReturnData);
            });
        }
        else
        {
            document.getElementById("Result").innerHTML = "";
        }
    })
  })
</script>