<?php
    interface Strategy 
    {
        public function getDiscount(): float;
    }

    class NoDiscountPlan implements Strategy
    {
        public function getDiscount(): float
        {
            return 0;
        }
    }

    class DiscountPlan_A implements Strategy
    {
        public function getDiscount(): float
        {
            return 0.1;
        }
    }

    class DiscountPlan_B implements Strategy
    {
        public function getDiscount(): float
        {
            return 0.2;
        }
    }

    class DiscountPlan_C implements Strategy
    {
        public function getDiscount(): float
        {
            return 0.5;
        }
    }
?>