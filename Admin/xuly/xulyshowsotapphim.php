<?php
    $dsphim_show_query = "SELECT * FROM `phim`";
    $dsphim_show_result = mysqli_query($con, $dsphim_show_query) or die(mysqli_error($con));

    while($row= mysqli_fetch_assoc($dsphim_show_result))
    {
        ?>
        <tr>
            <td><?php echo $row['MaPhim']; ?></td>
            <td><?php echo $row['TenPhim']; ?></td>
            <td><?php echo $row['SoTapPhim']; ?></td>
            <td>
                <button type="button" class="btn btn-primary" onclick="document.location='ChiTietSoTap.php?id=<?php echo $row['MaPhim']; ?>'">Xem</button>
            </td>
        </tr>
        <?php
    }
?>