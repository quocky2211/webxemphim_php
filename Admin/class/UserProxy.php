<?php
    session_start();

    class UserProxy implements UserInterFace
    {
        private $User;

        public function __construct(User $User)
        {
            $this->User =  $User;
        }

        public function Login(): void
        {
            if ($this->checkAccess()) 
            { 
                $this->User->Login();
            }
            else
            {
                ?>
                    <script>
                        alert("Bad Request");
                    </script>
                <?php
            }
        }

        private function checkAccess(): bool
        {
            if(isset($_SESSION['user']))
                return false;
            else
                return true;
        }
    }
?>