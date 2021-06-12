<?
class paymentR {

    static public function AddPay($contract_id, $operator_id, $price, $state = STATE_NOT_PAID) {
        global $db;
        
        $date = date('y-m-d-H-i-s');

        $query = "
           insert into `payment`(`contract_id`, `operator_id`, `state`, `price`, `date`) values('$contract_id','$operator_id','$state','$price','$date')
        ";
        $result = $db->query($query);

        return $result;
    }

    static public function GetById($id) {
        global $db;
        
        $query = "
           select * from `payment` where `id` = '$id'
        ";
        $result = $db->query($query);

        return $result;
    }

    static public function GetByUserId($userId) {
        global $db;
        
        $query = "
           select * from `payment` where `contract_id` = '$userId'
        ";
        
        $result = $db->query($query);

        return $result;
    }

    static public function GetByUserIdAndState($userId, $state) {
        global $db;
        
        $query = "
           select * from `payment` where `contract_id` = '$userId' AND `state` = '$state'
        ";
        
        $result = $db->query($query);

        return $result;
    }

    static public function GetByUserIdByActual($userId) {
        global $db;
        
        $query = "
           select * from `payment` where `contract_id` = '$userId' order by `date` desc
        ";
        
        $result = $db->query($query);

        return $result;
    }

    static public function UpdateState($id, $state) {
        global $db;
        
        $date = date('y-m-d-H-i-s');

        $query = "
           update `payment` set `id`='$id',`state`='$state', `date` = '$date' where `id`='$id' 
        ";
        $result = $db->query($query);

        return $result;
    }
}