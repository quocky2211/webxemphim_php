<?php
    $id = $_GET['id'];
    $dstapphim_show_query = "SELECT * FROM `tapphim` WHERE MaPhim = '$id'";
    $dstapphim_show_result = mysqli_query($con, $dstapphim_show_query) or die(mysqli_error($con));

    while($row= mysqli_fetch_assoc($dstapphim_show_result))
    {
        ?>
        <tr>
            <td><?php echo $row['MaTapPhim']; ?></td>
            <td><?php echo $row['ThuTu']; ?></td>
            <td><?php echo $row['FilePhim']; ?></td>
            <td>
                <button type="button" class="btn btn-primary" onclick="document.location='ChiTietTapPhim.php?id=<?php echo $row['MaTapPhim']; ?>'">Xem</button>
                <button type="button" class="btn btn-primary" onclick="document.location='SuaTapPhim.php?id=<?php echo $row['MaTapPhim']; ?>&target=<?php echo $row['MaPhim']; ?>'">Sửa</button>
                <button type="button" class="btn btn-danger" onclick="return Del('<?php echo $row['MaTapPhim']; ?>','<?php echo $row['MaTapPhim']; ?>','TapPhim')">Xóa</button>
            </td>
        </tr>
        <?php
    }
?>