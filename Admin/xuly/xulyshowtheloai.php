<?php
    $theloaiphim_show_query = "SELECT * FROM `theloai`";
    $theloaiphim_show_result = mysqli_query($con, $theloaiphim_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($theloaiphim_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($theloaiphim_show_result))
        {
            ?>
            <tr>
                <td><?php echo $row["MaTheLoai"]; ?></td>
                <td><?php echo $row["TenTheLoai"]; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="document.location='XemTheLoai.php?id=<?php echo $row['MaTheLoai']; ?>'">Xem</button>
                </td>
            </tr>
            <?php
        }
    }
?>