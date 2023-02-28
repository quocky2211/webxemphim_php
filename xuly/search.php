<?php
    require '../ConnectDB/connect.php';
    $con = ketnoi();

    $txt = $_REQUEST['TuKhoa'];
    $sql = "SELECT * FROM `phim` WHERE `TenPhim` LIKE '%$txt%'"; 
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    if($num == 0)
    {
        ?>
        <div class="search-item">
            <a>Không tìm thấy kết quả</a>
        </div>
        <?php
    }
    else
    {
        while($row = mysqli_fetch_assoc($result))
        {
    
            ?>
            <div class="search-item">
                <a style="text-decoration: none; color:black;" href="./xemchitietphim.php?id=<?php echo $row['MaPhim']; ?>"><?php echo $row['TenPhim']; ?></a>
            </div>
            <?php        
        }
    }
?>