<?
include_once "./repositories/usersR.php";
include_once "./repositories/supportR.php";

class support {

    public function index() {
        if ($_SESSION['role_id'] != 3 && $_SESSION['role_id'] != 4) header("location: ../support/room?id=$_SESSION[user_id]");

        $this->user_chat = supportR::GetRooms();
        
        view();
    }

    public function room() {
		if (!isset($_SESSION['user_id'])) header("location: ../");
		
        $this->user = usersR::GetById($_SESSION['user_id']);  
        $this->fullname = $this->user->surname." ".$this->user->name." ".$this->user->patronymic;
        
        $room = supportR::GetMessagesToRoom($_GET['id']);

        if (count($room) == 0) supportR::AddMessages('Диалог создан', "Автоматически", $_GET['id'], 5, "Создано");

        view();
    }

    public function getMessages() {
        $result = supportR::GetMessagesToRoom($_GET['id']);

        return print json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function isMessage()
    {
        $result = supportR::CountMess($_GET['id']);

        if ($result > $_GET['count']) return print "true";
        // else return print "false";
    }

    public function isMessageAll()
    {
        if (isset($_GET['mode'])) {
            $countO = supportR::CountMessToStatusUnread($_SESSION['user_id'], 3);
            $countA = supportR::CountMessToStatusUnread($_SESSION['user_id'], 4);
            $result = $countA + $countO;
        } else {
            $result = supportR::CountMessToStatusUnread($_GET['id'], 2);
        }

        $status = supportR::GetStatus($_GET['id']);

        if ($result > $_GET['count'] || $result < $_GET['count']) return print '{"status":"true","status_chat":"'.$status.'","count":"'.$result.'"}';
        else return print '{"status":"false"}';
    }

    public function close()
    {
        supportR::AddMessages('Диалог закрыт', "Автоматически", $_GET['id'], 5, "Закрыт");
        
        $mes = supportR::GetMessagesToRoom($_GET['id']);
    
        foreach ($mes as $key => $value) {
            if ($value['status'] == "Новое сообщение") {
                supportR::UpdateMessages("Прочитано", $value['id']);
            }
        }

        return ;
    }

    public function postMessages() {
        
        $mes = supportR::GetMessagesToRoom($_POST['client_id']);
    
        if ($mes[count($mes) - 1]['status'] == "Закрыт") {
            supportR::AddMessages('Диалог создан', "Автоматически", $_POST['client_id'], 5, "Создано");
        }

        foreach ($mes as $key => $value) {
            if ($_POST["author"] != $value['author'] 
                && $value['status'] == "Новое сообщение"
            ) {
                supportR::UpdateMessages("Прочитано", $value['id']);
            }
        }

        supportR::AddMessages($_POST["message"], $_POST["author"], $_POST['client_id'], $_SESSION['role_id'], "Новое сообщение");


        return ;
    }

}

