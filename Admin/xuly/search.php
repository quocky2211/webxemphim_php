<?php
    require '../connectdb/connect.php';
    $con = ketnoi();

    $txt = $_REQUEST['TuKhoa'];
    $place = $_REQUEST['Place'];
    switch($place)
    {
        case 'Tin Tức':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `tintuc` WHERE `TieuDe` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            else
            {
                $sql = "SELECT * FROM `tintuc`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            break;
        }
        case 'Phim':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `phim` WHERE `TenPhim` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {           
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
            }
            else
            {
                $sql = "SELECT * FROM `phim`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {           
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
            }
            break;
        }
        case 'KM':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `khuyenmai` WHERE `MaKhuyenMai` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {           
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
            }
            else
            {
                $sql = "SELECT * FROM `khuyenmai`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {           
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
            }
            break;
        }
        case 'QC':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `quangcao` WHERE `CongTy` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            else
            {
                $sql = "SELECT * FROM `quangcao`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            break;
        }
        case 'TL':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `theloai` WHERE `TenTheLoai` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            else
            {
                $sql = "SELECT * FROM `theloai`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
            }
            break;
        }
        case 'ST':
        {
            if($txt != "")
            {
                $sql = "SELECT * FROM `phim` WHERE `TenPhim` LIKE '%$txt%'"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
                }
            }
            else
            {
                $sql = "SELECT * FROM `phim`"; 
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                $num = mysqli_num_rows($result);
                if($num != 0)
                {
                    while($row = mysqli_fetch_assoc($result))
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
                }
            }
            break;
        }
    }
?>