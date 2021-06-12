<?
include_once "./repositories/tariffR.php";
include_once "./repositories/usersR.php";
include_once "./repositories/newsR.php";

class admin {

    public $users;
    public $tariffs;
    public $news;
    public $message;

    public function __construct() {
        if ($_SESSION['role_id'] == 1) {
            header('location: ../user/index');
        }
    }

    public function index() {
        view();
    }

    public function users() {
        $this->users = usersR::GetAll();

        if(isset($_GET['status'])) {
            if ($_GET['status'] == 'true_edit') $this->message = 'Пользователь изменен';   
            else if ($_GET['status'] == 'true_delete') $this->message = 'Пользователь удален';   
            else if ($_GET['status'] == 'false') $this->message = 'Ошибка действий';   
        }
        
        view();
    }

    public function tariffs() {
        $this->tariffs = tariffR::GetTariffs();

        if(isset($_GET['status'])) {
            if ($_GET['status'] == 'true_edit') $this->message = 'Тариф изменен';   
            else if ($_GET['status'] == 'true_delete') $this->message = 'Тариф удален';   
            else if ($_GET['status'] == 'false') $this->message = 'Ошибка действий';   
        }

        view();
    }

    public function news() {

        $this->news = newsR::GetNewsAll();

        view();
    }

}