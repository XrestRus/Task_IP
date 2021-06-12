<?
class applicationR {

    static public function GetByUserId($id) {
        global $db;
        
        $query = "
           select * from `application` where `user_id` = '$id'
        ";
        $result = $db->query($query);

        return $result;
    } 
    
    static public function GetById($id) {
        global $db;
        
        $query = "
           select * from `application` where `id` = '$id'
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetByIdOrderDate($id) {
        global $db;
        
        $query = "
           select * from `application` where `id` = '$id' order by `date` desc
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetAll() {
        global $db;
        
        $query = "
           select * from `application`
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetAllByState($state) {
        global $db;

        $str = " ";
        foreach ($state as $key => $value) {
            if ($key != 0) {
                $str.=" OR `state` = '$value'";
            } else {
                $str.="`state` = '$value'";
            }
        }

        $query = "
           select * from `application` where $str
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetAddressById($id) {
        global $db;
        
        $query = "
           select * from `address` where `id`='$id'
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function AddAddress($city, $street, $house, $room) {
        global $db;
        
        $query = "
           insert into `address`(`city`, `street`, `house`, `room`) values('$city','$street','$house','$room')
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function AddApplication($user_id, $tariff_id, $address_id, $state = STATE_PENDING_PROCESSING, $operator_id = NULL) {
        global $db;

        $date = date('y-m-d-H-i-s');

        if($operator_id == NULL) {
            $query = "
                insert into `application` values('','$tariff_id','$user_id','$date','$state','$address_id', NULL)
            ";
        } else {
            $query = "
                insert into `application` values('','$tariff_id','$user_id','$date','$state','$address_id', '$operator_id')
            ";
        }

        
        $result = $db->query($query);
        return $result;
    }
    
    static public function UpdateApplication($id, $user_id, $tariff_id, $address_id, $state = STATE_PENDING_PROCESSING, $operator_id = NULL) {
        global $db;
        
        $date = date('y-m-d-H-i-s');
        $query = '';
        if($operator_id == NULL) {
            $query = "
                update `application` set  `tariff_id`='$tariff_id',`user_id`='$user_id',`date`='$date',`state`='$state',`address_id`='$address_id',`operator_id`=NULL where `id` = '$id'
            ";
        } else {
            $query = "
                update `application` set  `tariff_id`='$tariff_id',`user_id`='$user_id',`date`='$date',`state`='$state',`address_id`='$address_id',`operator_id`='$operator_id' where `id` = '$id'
            ";
        }

        $result = $db->query($query);

        return $result;
    }

}