<?php
    $dsphim_show_query = "SELECT * FROM `phim`";
    $dsphim_show_result = mysqli_query($con, $dsphim_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($dsphim_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($dsphim_show_result))
        {
            //Tìm thể loại
            $theloai_show_query = "select * from `theloai` where MaTheLoai=".$row['MaTheLoai']."";
            $theloai_show_result = mysqli_query($con, $theloai_show_query) or die(mysqli_error($con));
            $row01 = mysqli_fetch_assoc($theloai_show_result);
            $TenTheLoai = $row01["TenTheLoai"];
            ?>
            <tr>
                <td><?php echo $row["MaPhim"]; ?></td>
                <td class="book-col-2">
                    <?php echo '<img src="./file/image/'.$row['VideoImg'].'">'; ?> 
                </td>
                <td><?php echo $row["TenPhim"]; ?></td>
                <td><?php echo $TenTheLoai ?></td>
                <td><?php echo $row["SoTapPhim"]; ?></td>
                <td><?php echo $row["LuotView"]; ?></td>
                <td><?php echo $row["LuotLike"]; ?></td>
                <td><?php echo $row["GiaMua"]; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="document.location='ChiTietPhim.php?id=<?php echo $row['MaPhim']; ?>&note=&code=0'">Xem</button>
                    <button type="button" class="btn btn-danger" onclick="return Del('<?php echo $row['TenPhim']; ?>','<?php echo $row['MaPhim']; ?>','Phim')">Xóa</button>
                </td>
            </tr>
            <?php
        }
    }
?>