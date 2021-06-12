<?
include_once "./repositories/newsR.php";
include_once "./repositories/tariffR.php";
include_once "./repositories/usersR.php";

class news {

    public function index() {

        $this->news = newsR::GetNewsAll();

        view();
    }

    public function detail() {
        $this->news = newsR::GetNewsAll()[$_GET['news_id']];

        view();
    }

    public function add() {
        if ($_SESSION['role_id'] == 1) header('location: ../user/index');
        
        view();
    }

    public function addPOST() {
        if ($_SESSION['role_id'] == 1) header('location: ../user/index');

        newsR::Add($_POST['title'], $_POST['desc'], $_POST['date']);

        header('location: ../admin/news');
    }

    public function edit() {
        if ($_SESSION['role_id'] == 1) header('location: ../user/index');
       
        $this->news = newsR::GetNewsAll()[$_GET['news_id']];

        view();
    }

    public function editPOST() {
        if ($_SESSION['role_id'] == 1) header('location: ../user/index');

        newsR::Edit($_POST['news_id'], $_POST['title'], $_POST['desc'], $_POST['date']);

        header('location: ../admin/news');
    }

    public function delete() {
        if ($_SESSION['role_id'] == 1) header('location: ../user/index');

        newsR::Delete($_GET['news_id']);

        header('location: ../admin/news');
    }

}

