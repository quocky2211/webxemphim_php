<?php
    
    interface UserInterFace 
    {
        public function Login(): void;
    }

    class User implements UserInterFace
    {
        private $Matk;
        private $Name;
        private $Username;
        private $Password;
        private $Role;
        private $XuKhoa;
        private $Point;

        function __construct($Username,$Password)
        {
            $this -> Username = $Username;
            $this -> Password = $Password;
        }

        public function Login(): void
        {            
            if($this->Authentication())
            {
                if($_SESSION['role'] == 'Admin')
                {
                    ?>
                        <script>
                            alert("Đăng nhập thành công");
                            location.href = './Admin/index.php';
                        </script>
                    <?php
                }
                else
                {
                    ?>
                        <script>
                            alert("Đăng nhập thành công");
                            location.href = './index.php';
                        </script>
                    <?php
                }
            }
            else 
            {
                ?>
                    <script>
                        alert("Tài khoản hoặc mật khẩu chưa đúng");
                    </script>
                <?php
            }
            
        }

        function Authentication():bool
        {
            $instance = SingletonDBConnect::getInstance();
            $con = $instance->getConnection();
            $Name = $this->getUsername();
            $Pass = $this->getPassword();
            $query = new MysqlQueryBuilder();
            $user_authentication_query = $query->select(["*"])->from(["account"])->where("Username","=",$Name)->where("Password","=",$Pass)
                                                ->getSQL();
            //"SELECT * FROM account WHERE Username = '$Name' AND Password = '$Pass'";
            $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
            $rows_fetched = mysqli_num_rows($user_authentication_result);
            if($rows_fetched == 0)
            {
                return false;
            }
            else
            {
                $row = mysqli_fetch_assoc($user_authentication_result);
                $_SESSION['username'] = $row['Username'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['id'] = $row['MaTK'];
                $_SESSION['name'] = $row['Name'];
                $_SESSION['role'] = $row['Role'];
                $_SESSION['active'] = 'yes';
                $_SESSION['xukhoa'] = $row['XuKhoa'];
                $_SESSION['point'] = $row['Point'];
                $_SESSION['user'] = "";
                return true;
            }
        }

        function getMatk()
        {
            return $this->Matk;
        }

        function getName()
        {
            return $this->Name;
        }

        function getUsername()
        {
            return $this->Username;
        }

        function getPassword()
        {
            return $this->Password;
        }

        function getRole()
        {
            return $this->Role;
        }

        function getXuKhoa()
        {
            return $this->XuKhoa;
        }

        function Findmatk()
        {
            $this->Matk = $_SESSION['id'];
            return $this->Matk;
        }

        function Findpoint()
        {
            $this->Point = $_SESSION['point'];
            return $this->Point;
        }
    }
?>