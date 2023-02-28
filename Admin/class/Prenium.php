<?php
    class Prenium extends UserPayment
    {
        public function addPaymentChoice($masp){}
        public function addRequestActivity($request):string
        {
            if($request == "Nạp")
                return 'Nạp';
        }

        public function addRechargeChoice($masp):int
        {
            return 100000;
        }
    }
?>