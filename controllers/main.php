<?
include_once "./repositories/tariffR.php";
include_once "./repositories/usersR.php";
include_once "./repositories/newsR.php";

class main {

    public $message;
    public $user;

    public function index() {
        $this->news = newsR::GetNewsAll();
        view();
    }
}