<?
    require('./AbsH1.php');

    class AbsH2 extends AbsH1{
        public function soy2(){
            echo "Soy 2";
            print_r($this);
        }
    }
?>