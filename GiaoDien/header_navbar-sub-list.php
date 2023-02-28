<?php
    $Find_Query = "SELECT * FROM `theloai`";
    $Find_Result = mysqli_query($con,$Find_Query) or die(mysqli_error($con));
    $num = mysqli_num_rows($Find_Result);
    if (($num % 5) != 0)
    {
        $Max_Col = ($num / 5) + 1;
    }
    else
    {
        $Max_Col = $num / 5;
    }

    $Column = 1;
    $Line = 1;
    $count = 1;

    for ($Column ; $Column <= $Max_Col; $Column++)
    {
        ?>
        <div class="sub-list-wrap-<?php echo $Column; ?>">
            <?php 
                for ($Line; $Line <= 5; $Line++)
                {
                    if ($count <= $num)
                    {
                        $row = mysqli_fetch_assoc($Find_Result);
                        ?>
                        <li class="header__navbar-sub-item"><a href="./theloai.php?id=<?php echo $row['MaTheLoai']; ?>"><?php echo $row['TenTheLoai']; ?></a></li>
                        <?php
                        $count++;
                    }
                }
            ?>
        </div>
        <?php
        $Line = 1;
    }
?>