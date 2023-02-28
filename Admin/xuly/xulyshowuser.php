<?php
    $user_show_query = "select * from `account`";
    $user_show_result = mysqli_query($con, $user_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($user_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($user_show_result))
        {
            ?>
            <tr>
                <td><?php echo $row["MaTK"]; ?></td>
                <td><?php echo $row["Username"]; ?></td>
                <td><?php echo $row["Role"]; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="return Del('<?php echo $row['Username']; ?>','<?php echo $row['MaTK']; ?>','Account')">Xóa</button>
                    <button type="button" class="btn btn-secondary" onclick="document.location='SuaTaiKhoan.php?id=<?php echo $row['MaTK']; ?>'">Sửa</button>
                </td>
            </tr>
            <?php 
        }
    }
?>