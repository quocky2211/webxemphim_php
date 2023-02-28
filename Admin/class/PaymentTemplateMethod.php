<?php
    abstract class UserPayment
    {
        private $User;
        private $masp;
        private $request;
        abstract public function addRequestActivity($request):string;//More , Less
        abstract public function addPaymentChoice($masp);// Thanh toán Code or Momo QR 
        abstract public function addRechargeChoice($masp):int;//Nạp gói Prenium = 100k, Vip = 50k or Normal = 10k

        public function __construct(User $User,$masp,$request)
        {
            $this -> User = $User;
            $this -> masp = $masp;
            $this-> request = $request;
        }

        protected function getRequest()
        {
            return $this-> request;
        }

        protected function getUser()
        {
            return $this->User;
        }

        protected function getMasp()
        {
            return $this->masp;
        }

        final public function PaymentRequest(UserPayment $UserPayment)
        {
            $this -> LoginCheck();
            if($this -> addRequestActivity($UserPayment->getRequest()) == "Nạp")
                $this -> Nap($UserPayment->getUser(),$UserPayment->getMasp());
            else if ($this -> addRequestActivity($UserPayment->getRequest()) == "Thanh Toán")
                $this -> ThanhToan($UserPayment->getUser(),$UserPayment->getMasp());
            else
            {
                ?>
                <script>
                    alert("Unknown Request");
                </script>
                <?php
            }               
        }

        protected function LoginCheck():bool
        {
            if(isset($_SESSION['user'])) return true;
            else return false;
        }

        public function Nap(User $user,$masp)
        {
            $matk = $user->Findmatk();
            $point = $user->Findpoint();
            $discountMethod = DiscountController::getDiscountMethod($point);
            $discountValue = $discountMethod->getDiscount();
            $price = $this->addRechargeChoice($masp);
            $date = date("d/m/Y");
            $instance = SingletonDBConnect::getInstance();
            $con = $instance->getConnection();
            $sql = "INSERT INTO `nap`(`MaTK`, `GiaNap`, `NgayNap`) VALUES ('$matk','$price','$date')";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            $Xuthem = ($this->QuyDoiXu($price))+($this->QuyDoiXu($price) * $discountValue);
            $AddPoint = $this->QuyDoiXu($price);
            $sql01 = "UPDATE `account` SET `XuKhoa`= XuKhoa + $Xuthem,`Point`= Point + $AddPoint WHERE `MaTK` = '$matk'";
            $upResult = mysqli_query($con, $sql01) or die(mysqli_error($con));
            $this->UpdatePoint($matk);
        }

        public function QuyDoiXu($price)
        {
            return ($price/1000);
        }

        public function UpdatePoint($matk)
        {
            $instance = SingletonDBConnect::getInstance();
            $con = $instance->getConnection();
            $query = new MysqlQueryBuilder();
            $query01 = $query   ->select(["Point"]) 
                                ->from(["account"])   
                                ->where("MaTK","=",$matk)
                                ->getSQL();
            $result = mysqli_query($con,$query01) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($result);
            $_SESSION['point'] = $row['Point'];
        }

        public function ThanhToan(User $user,$masp)
        {

        }
    }
?>
