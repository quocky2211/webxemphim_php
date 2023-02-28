<?php
    class DiscountController
    {
        public function getDiscountMethod(int $point): Strategy
        {
            if ($point = 0 || $point < 100)
            {
                return new NoDiscountPlan();
            }
            else if($point >= 100 && $point < 500)
            {
                return new DiscountPlan_A();
            }

            else if ($point >= 500 && $point < 1000)
            {
                return new DiscountPlan_B();
            }
            else
            {
                return new DiscountPlan_C();
            }
        }
    }
?>