<?
class supportR {

    static public function GetRooms() {
        global $db;

        $query = "
            SELECT DISTINCT `client_id` FROM `chat_message`
        ";

        $result = $db->query($query);

        return $result;
    } 

    static public function GetMessagesToRoom($id) {
        global $db;

        $query = "
           select * from `chat_message` where `client_id` = '$id' 
        ";

        $result = $db->query($query)->fetch_all(MYSQLI_ASSOC);

        return $result;
    } 

    static public function CountMess($id) {
        global $db;

        $query = "
            select count(*) as 'num'  from `chat_message` where `client_id` = '$id' 
        ";

        $result = $db->query($query);

        return $result->fetch_object()->num;
    } 

    
    static public function GetStatus($id) {
        global $db;

        $query = "
            SELECT * FROM `chat_message` WHERE `client_id` = '$id' ORDER BY `id` DESC LIMIT 1
        ";

        $result = $db->query($query);

        return $result->fetch_object()->status;
    } 

    static public function CountMessToStatusUnread($id, $role) {
        global $db;

        $query = "select count(*) as 'num'  from `chat_message` where `client_id` = '$id' AND `role_id` = '$role' AND `status` = 'Новое сообщение'";

        $result = $db->query($query);

        return $result->fetch_object()->num;
    } 


    static public function AddMessages($message, $author, $client_id, $role, $status) {
        global $db;
        
        $date = date("Y-m-d H:i:s");

        $query = "
            INSERT INTO `chat_message`(`text`, `author`, `client_id`, `date`, `role_id`, `status`) 
            VALUES ('$message', '$author',  $client_id, '$date', '$role', '$status')
        ";

        $result = $db->query($query);

        return ;
    } 

    static public function UpdateMessages($status, $id) {
        global $db;
        
        $query = "
            UPDATE `chat_message` SET `status` = '$status' WHERE `id` = '$id'
        ";

        $result = $db->query($query);

        return ;
    } 
   
}

