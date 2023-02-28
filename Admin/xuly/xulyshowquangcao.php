<?php
    $qc_show_query = "SELECT * FROM `quangcao`";
    $qc_show_result = mysqli_query($con, $qc_show_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($qc_show_result);
    if($rowcount > 0)
    {
        //output data 
        while($row= mysqli_fetch_assoc($qc_show_result))
        {
            ?>
            <tr>
                <td><?php echo $row["MaQC"]; ?></td>
                <td class="tintuc-col">
                        <img class="mx-auto d-block" src="./file/image/<?php echo $row["Banner"]; ?>" alt="Card image" > 
                </td>
                <td><?php echo $row["CongTy"]; ?></td>
                <td><a href="<?php echo $row["Link"]; ?>"><?php echo $row["Link"]; ?></a></td>
                <td><?php echo $row["ChiPhi"]; ?>/Click</td>
                <td><?php echo $row["ThuNhap"]; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="return Del('Quảng cáo <?php echo $row['MaQC']; ?>','<?php echo $row['MaQC']; ?>','QuangCao')">Xóa</button>
                </td>
            </tr>
            <?php
        }
    }
?>