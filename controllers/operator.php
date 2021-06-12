<?
include_once "./repositories/usersR.php";
include_once "./repositories/tariffR.php";
include_once "./repositories/contractR.php";
include_once "./repositories/applicationR.php";
include_once "./repositories/paymentR.php";

class operator {
    public function __construct() {
        if (!isset($_SESSION['user_id'])) header("location: ../main/");
    }

    public $applications;
    public $applications_rows;
    
    public $applications_processing;
    public $applications_processing_rows;

    public $contracts;
    public $contracts_rows;
    
    public $contracts_active;
    public $contracts_active_rows;
    
    public function index() {
        if ($_SESSION['role_id'] != 3) header('location: ../user/index');

        view();
    }

    public function applications() {
        global $db;

        $this->applications = applicationR::GetAllByState([STATE_PENDING_PROCESSING]);
        $this->applications_rows = $this->applications->num_rows;

        $this->applications_processing = applicationR::GetAllByState([STATE_PROCESSED, STATE_CANCEL]);
        $this->applications_processing_rows = $this->applications_processing->num_rows;

        if(isset($_GET['mode'], $_GET['id'])) {
            if($_GET['mode'] == 'ok') {

                $db->begin_transaction();

                try {
                    $app = applicationR::GetByIdOrderDate($_GET['id'])->fetch_object();
                    applicationR::UpdateApplication($app->id, $app->user_id, $app->tariff_id, $app->address_id, STATE_PROCESSED, $_SESSION['user_id']);

                    $contract = contractR::GetByUserId($app->user_id);

                    if($contract->num_rows > 0) 
                        contractR::UpdateContract($app->user_id, $app->id, $_SESSION['user_id']);
                    else
                        contractR::AddContract($app->user_id, $app->id, $_SESSION['user_id']);
                    
                    $data = self::viewModelAppContract($app);   
                    $pay = paymentR::AddPay($app->user_id, $_SESSION['user_id'], $data['tariff']->price);

                    $db->commit();
                } catch (error $ex) {
                    $db->rollback();
                    print_r($ex);
                }
                
            }
            else if($_GET['mode'] == 'cancel') {
                $app = applicationR::GetByIdOrderDate($_GET['id'])->fetch_object();
                $res = applicationR::UpdateApplication($app->id, $app->user_id, $app->tariff_id, $app->address_id, STATE_CANCEL, $_SESSION['user_id']);
            }

            header("location: ../operator/applications");
        }

        view();
    }
    
    public function contracts() {
        global $db;

        $this->contracts = contractR::GetAllByState([STATE_AWAITING_PAY,STATE_PAY]);
        $this->contracts_rows = $this->contracts->num_rows;

        $this->contracts_active = contractR::GetAllByState([STATE_ACTIVE]);
        $this->contracts_active_rows = $this->contracts_active->num_rows;

        if(isset($_GET['mode'], $_GET['id'])) {

            $db->begin_transaction();
            try {
                if($_GET['mode'] == 'ok') {
                    $contract = contractR::GetByUserId($_GET['id'])->fetch_object();
                    contractR::UpdateContract($contract->id, $contract->app_id, $_SESSION['user_id'], STATE_ACTIVE);
                }
                else if($_GET['mode'] == 'cancel') {
                    $contract = contractR::GetByUserId($_GET['id'])->fetch_object();
                    contractR::UpdateContract($contract->id, $contract->app_id, $_SESSION['user_id'], STATE_AWAITING_PAY);

                    $tariff_id = applicationR::GetById($contract->app_id)->fetch_object()->tariff_id;
                    $tariff = tariffR::GetTariffsById($tariff_id)->fetch_object();
                    
                    $pay = paymentR::AddPay($contract->id, $_SESSION['user_id'], $tariff->price);
                }
                $db->commit();
            } catch (error $ex) {
                $db->rollback();
                print_r($ex);
            }

            header("location: ../operator/contracts");
        }

        view();
    }

    public function viewModelAppContract($app) {
        $client = usersR::GetById($app->user_id);
        $tariff = tariffR::GetTariffsById($app->tariff_id)->fetch_object();
        $address = applicationR::GetAddressById($app->address_id)->fetch_object();

        return Array('client'=>$client, 'tariff'=>$tariff, 'address'=>$address);
    }
    
}

