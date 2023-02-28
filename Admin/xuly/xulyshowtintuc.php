<?php
    $tintuc_show_query = "SELECT * FROM `tintuc`";
    $tintuc_show_result = mysqli_query($con, $tintuc_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($tintuc_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($tintuc_show_result))
        {
            ?>
            <tr>
                <td><?php echo $row["MaTinTuc"]; ?></td>
                <td><?php echo $row["TieuDe"]; ?></td>
                <td><?php echo $row["ThoiGian"]; ?></td>
                <td><?php echo $row["LuotXem"]; ?></td>
                <td><?php echo $row["LuotThich"]; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="document.location='ChiTietTinTuc.php?id=<?php echo $row['MaTinTuc']; ?>'">Xem</button>
                    <button type="button" class="btn btn-danger" onclick="return Del('<?php echo $row['TieuDe']; ?>','<?php echo $row['MaTinTuc']; ?>','TinTuc')">Xóa</button>
                </td>
            </tr>            
            <?php
        }
    }
?>