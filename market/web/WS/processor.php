<?php
require '../conn/connect.php';
class proc {
	
	 private $db;
	 
	  // Constructor - open DB connection
    function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'test');
        $this->db->autocommit(FALSE);
    }

    
	
	 
 function json() {
    	session_start();
        // Check for required parameters
        if ( isset($_SESSION['username']) && isset($_SESSION['userid']) ){
        
            // Put parameters into local variables
            $val_from = $_POST["val_from"];
            $to = $_POST["to"];
            $from = $_POST["from"];
			$userid=$_SESSION['userid'];
			$amount_buy;
			$rate;
			$time=date("Y-m-d H:i:s");
			
			if($from=='USD' and $to=='EUR')
			{
				$rate=0.9366;
			}
			if($from=='EUR' and $to=='USD')
			{
				$rate=1.0586;
			}
			if($from=='USD' and $to=='USD')
			{
				$rate=0;
			}
			if($from=='EUR' and $to=='EUR')
			{
				$rate=0;
			}
			
			$amount_buy=($val_from*$rate);
			
			
			$miArray = array("UserId"=>$userid, "currencyFrom"=>$from, "currencyTo"=>$to, "amountSell"=>$val_from, "amountBuy"=>$amount_buy, "rate"=>$rate, "timePlaced"=>$time, "originatingCountry"=>"FR");
print_r(json_encode($miArray));

			return true;
        }
       
        return false;
    	
    }
	
	

   
	function save() {
    	
            $_val_from = $_POST["val_from"];
            $_to = $_POST["to"];
            $_from = $_POST["from"];
			$_userid=$_POST['user'];
			$_amount_buy;
			$_rate;
			$_time=date("Y-m-d H:i:s");
			
			if($_from=='USD' and $_to=='EUR')
			{
				$_rate=0.9366;
			}
			if($_from=='EUR' and $_to=='USD')
			{
				$_rate=1.0586;
			}
			if($_from=='USD' and $_to=='USD')
			{
				$_rate=0;
			}
			if($_from=='EUR' and $_to=='EUR')
			{
				$_rate=0;
			}
			
			$_amount_buy=($_val_from*$_rate);
			$country='FR';
			//IMPORTANT: I am not sure why this part of code doesn' work, I tried a lot of times but all is correct but the insert doesn't appear in the table
			/*$id=2;
			//$stmt = $this->db->prepare("INSERT INTO tst_log (id,userid, val_from, from, val_receive, to, rate, date, original_country) VALUES (?,?,?,?,?,?,?,?,?)");
			//$stmt = $this->db->prepare("INSERT INTO `tst_log`(`id`,`userid`, `val_from`, `from`, `val_receive`, `to`, `rate`, `date`, `original_country`) VALUES (?,?,?,?,?,?,?,?,?)");
			//$stmt = $this->db->prepare("INSERT INTO 'tst_log' ('id','userid', 'val_from', 'from', 'val_receive', 'to', 'rate', 'date', 'original_country') VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt = $this->db->prepare("INSERT INTO `tst_log` (`id`,`userid`, `val_from`, `from`, `val_receive`, `to`, `rate`, `date`, `original_country`) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('iidsdsdss', $id,$_userid, $_val_from,$_from,$_amount_buy,$_to,$_rate,$_time,$country);
			//$a=var_dump($stmt);
            $stmt->execute();
			//$a=$stmt->affected_rows;
			$a=var_dump($stmt);
			$stmt->close();
			return $a;
        	*/
			$sql=mysql_query("INSERT INTO `tst_log` (`userid`, `val_from`, `from`, `val_receive`, `to`, `rate`, `date`, `original_country`)
						VALUES(						
							".$_userid.",
							".$_val_from.",
							'".$_from."',
							".$_amount_buy.",
							'".$_to."',
							".$_rate.",
							'".$_time."',
							'".$country."'
						)");
							
							if($sql)
							{
								return true;
							}
							else
							{
								return false;
							}
    	
    }

}

$op=$_POST['op'];
$api = new proc;
switch($op)
{
	case 0: $est=$api->json();
			if($est==true)
			{ echo $miArray;}
			else
			{ echo '{::}';}
			
			break;
	case 1: $est=$api->save();
			
			echo $est;
			break;
}
?>