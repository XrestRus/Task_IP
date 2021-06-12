<?
include_once "./repositories/tariffR.php";
include_once "./repositories/usersR.php";
include_once "./repositories/applicationR.php";
include_once "./repositories/contractR.php";

class tariffs {

    public $message;
    public $my_tariff_status;
    public $rate;
    public $user_tariff;
    public $user_actual_contract;
    public $user;

    public $user_contract;
    public $user_contract_row;
    public $user_contract_object;


    public function index() {
        if (isset($_SESSION['user_id'])) {
            $this->user_contract = contractR::GetByUserId($_SESSION['user_id']);
            $this->user_contract_row =  $this->user_contract->num_rows;
            if($this->user_contract_row > 0) {
                $this->user_contract_object = $this->user_contract->fetch_object();
                $this->user_app_object = applicationR::GetById($this->user_contract_object->app_id)->fetch_object();
                $this->tariff = tariffR::GetTariffsById($this->user_app_object->tariff_id)->fetch_object();
            }
        }

        $this->rate = tariffR::GetTariffs(); 

        view();
    }

    public function application() {
        if ($_SESSION['role_id'] == 1) header('location: ../auth/registration');

        if (isset($_GET['status']) && $_GET['status'] == 'false') $this->message = 'Ошибка отправки заявки...';   
        if (isset($_SESSION['user_id'])) $this->user = usersR::GetById($_SESSION['user_id']);

        view();
    }

    public function applicationPOST() {
        if ($_SESSION['role_id'] == 1) header('location: ../auth/registration');

        applicationR::AddAddress($_POST['city'], $_POST['street'], $_POST['house'], $_POST['room']);
       
        $address_id = GetLastId();
        $res = applicationR::AddApplication($_SESSION['user_id'], $_POST['tariff_id'], $address_id);

        if ($res) header('location: ../user/tariff?status=true');
        else header("location: ./application?tariff_id=$_POST[tariff_id]&status=false");
    }


    public $tariff;

    public function add() {
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) header('location: ../user/index');

        view();
    }

    public function addPOST() {
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) header('location: ../user/index');


        $strokeService = "";
        foreach ($_POST as $key => $value) {
            if($key[0] == 'd' && $strokeService == "") $strokeService.=$value;
            else if($key[0] == 'd') $strokeService.="\r\n".$value;
        }

        $res = tariffR::AddTariff($_POST['tariff_title'],$strokeService ,$_POST['price'] ,1);

        if ($res) header("location: ../admin/tariffs?status=true_add");
        else header('location: ../admin/tariffs?status=false');
    }

    public function delete() {
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) header('location: ../user/index');

        $res = tariffR::Delete($_GET['tariff_id']);

        if ($res) header('location: ../admin/tariffs?status=true_delete');
        else header('location: ../admin/tariffs?status=false');
    }

    public function edit() {
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) header('location: ../user/index');

        $this->tariff = tariffR::GetTariffsById($_GET['tariff_id'])->fetch_object();

        if (isset($_GET['status']) && $_GET['status'] == 'false') $this->message = 'Ошибка изменения...';   

        view();
    }

    public function editPOST() {
        if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) header('location: ../user/index');

        $strokeService = "";
        foreach ($_POST as $key => $value) {
            if($key[0] == 'd' && $strokeService == "") $strokeService.=$value;
            else if($key[0] == 'd') $strokeService.="\r\n".$value;
        }

        $res = tariffR::Edit($_POST['tariff_id'], $_POST['tariff_title'], $strokeService ,$_POST['price'] ,1);

        if ($res) header("location: ../admin/tariffs?status=true_edit");
        else header('location: ../admin/tariffs?status=false');
    }

}

