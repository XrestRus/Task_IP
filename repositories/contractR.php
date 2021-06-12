<?
class contractR {

    static public function GetByUserId($id) {
        global $db;
        
        $query = "
           select * from `contract` where `id` = '$id'
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
           select * from `contract` where $str
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function AddContract($user_id, $app_id, $operator_id, $state = STATE_AWAITING_PAY) {
        global $db;
        
        $date = date('y-m-d-H-i-s');

        $query = "
           insert into `contract` values('$user_id','$app_id','$date','$state','$operator_id')
        ";
        $result = $db->query($query);

        return $result;
    }

    static public function UpdateContract($user_id, $app_id, $operator_id, $state = STATE_AWAITING_PAY) {
        global $db;
        
        $date = date('y-m-d-H-i-s');

        $query = "
           update `contract` set `id`='$user_id',`app_id`='$app_id',`date`='$date',`state`='$state',`operator_id`='$operator_id' where `id`='$user_id' 
        ";
        $result = $db->query($query);

        return $result;
    }

    static public function UpdateState($user_id, $state) {
        global $db;
        
        $date = date('y-m-d-H-i-s');

        $query = "
           update `contract` set `id`='$user_id',`state`='$state', `date` = '$date' where `id`='$user_id' 
        ";
        $result = $db->query($query);

        return $result;
    }
}