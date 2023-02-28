<?php
    $stt = 0;
    $khuyenmai_show_query = "SELECT * FROM `khuyenmai`";
    $khuyenmai_show_result = mysqli_query($con, $khuyenmai_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($khuyenmai_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($khuyenmai_show_result))
        {
            $stt++;
            ?>
            <tr>
                <td><?php echo $row["MaKhuyenMai"]; ?></td>
                <td><?php echo $row["PhanTram"]; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="document.location='XemKhuyenMai.php?id=<?php echo $row['MaKhuyenMai']; ?>'">Xem</button>
                    <button type="button" class="btn btn-primary" onclick="document.location='ApDungKhuyenMai.php?id=<?php echo $row['MaKhuyenMai']; ?>'">Áp dụng</button>
                    <button type="button" class="btn btn-danger" onclick="return Del('<?php echo $row['MaKhuyenMai']; ?>','<?php echo $row['MaKhuyenMai']; ?>','KhuyenMai')">Xóa</button>
                </td>
            </tr>
            <?php
        }
    }
?>