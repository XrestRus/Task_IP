<?
include_once "./repositories/usersR.php";
include_once "./repositories/tariffR.php";
include_once "./repositories/contractR.php";
include_once "./repositories/paymentR.php";
include_once "./repositories/applicationR.php";

class user {

    public $message;
    public $my_tariff_status;
    public $user;
    public $user_tariff;
    public $user_actual_contract;

    public $user_contract;
    public $user_contract_row;
    public $user_contract_object;
    
    public $user_app;
    public $user_app_row;
    public $user_app_object;

    public $user_pay;
    public $user_pay_row;
    public $user_pay_object;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) header("location: ../");
    }

    public function index() {
        $this->user = usersR::GetById($_SESSION['user_id']);   
        
        if (isset($_GET['status']) && $_GET['status'] == 'true') $this->message = 'Изменение данных прошло успешно';   
        else if (isset($_GET['status']) && $_GET['status'] == 'false') $this->message = 'Изменение данных не удалось';   

        view();
    }

    public function save() {
        $res = usersR::SaveById($_SESSION['user_id'], $_POST['surname'], $_POST['name'], $_POST['middlename'], $_POST['phone'], $_POST['email']);

        if ($res) header('location: ./index?status=true');
        else header('location: ./index?status=false');
    }

    public function tariff() {
        if (isset($_SESSION['user_id'])) {
            $this->user_contract = contractR::GetByUserId($_SESSION['user_id']);
            $this->user_contract_row =  $this->user_contract->num_rows;

            $this->user_app = applicationR::GetByUserId($_SESSION['user_id']);
            $this->user_app_row = $this->user_app->num_rows;
            if($this->user_contract_row > 0) {
                $this->user_contract_object = $this->user_contract->fetch_object();
                $this->user_app_object = applicationR::GetById($this->user_contract_object->app_id)->fetch_object();
                $this->tariff = tariffR::GetTariffsById($this->user_app_object->tariff_id)->fetch_object();
            } else if($this->user_app_row > 0) {
                $this->user_app_object = $this->user_app->fetch_object();
                $this->message = "Заявка успешно отправленна<br>Статус ".$this->user_app_object->state;   
            } else $this->message = 'У вас нет тарифа';
        }

        view();
    }

    public function delete() {
        if ($_SESSION['role_id'] != 4) header('location: ../user/index');

        $res = usersR::Delete($_GET['user_id']);

        if ($res) header('location: ../admin/users?status=true_delete');
        else header('location: ../admin/users?status=false');
    }

    public function edit() {
        if ($_SESSION['role_id'] != 4) header('location: ../user/index');
      
        $this->user = usersR::GetById($_GET['user_id']);   
        $this->roles = usersR::GetRoleAll();

        view();
    }

    public function editPOST() {
        if ($_SESSION['role_id'] != 4) header('location: ../user/index');
  
        $res = usersR::Edit($_POST['user_id'], $_POST['surname'], $_POST['name'], $_POST['middlename'], $_POST['role']);

        if ($res) header('location: ../admin/users?status=true_edit');
        else header('location: ../admin/users?status=false');
    }

    public function account() {
        if (isset($_SESSION['user_id'])) {
            $this->user_pay = paymentR::GetByUserIdByActual($_SESSION['user_id']);
            $this->user_pay_row =  $this->user_pay->num_rows;
            $this->user_pay_object = $this->user_pay->fetch_object();
        }
        
        view();
    }

    public function pay() {
        if (isset($_SESSION['user_id'])) {
            $this->user_pay_object = paymentR::GetByUserIdByActual($_SESSION['user_id'])->fetch_object();
            $this->user_object = usersR::GetById($_SESSION['user_id']);
        }
        
        view();
    }

    public function payPOST() {
        //Оплата 

        //Конец оплаты

        global $db;

        $db->begin_transaction();

        try {

            paymentR::UpdateState($_POST['pay_id'], STATE_PAY);
            contractR::UpdateState($_SESSION['user_id'], STATE_PAY);
        
            $db->commit();
        } catch (error $ex) {
            $db->rollback();
        } finally {
            header('location: ../user/account');
        }
    }

    public function viewModelAppContract($app) {
        $client = usersR::GetById($app->user_id);
        $tariff = tariffR::GetTariffsById($app->tariff_id)->fetch_object();
        $address = applicationR::GetAddressById($app->address_id)->fetch_object();

        return Array('client'=>$client, 'tariff'=>$tariff, 'address'=>$address);
    }
}

