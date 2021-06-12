<?
include_once "./repositories/usersR.php";

class auth {
    public $message = '';

    public function index() {
        if (isset($_GET['status']) && $_GET['status'] == 'false') $this->message = 'Неверные данные';
        else if (isset($_GET['status']) && $_GET['status'] == 'true') $this->message = 'Вы успешно зарегистрированы';

        view();
    }

    public function registration() {
        if (isset($_GET['status']) && $_GET['status'] == 'false') $this->message = 'Такой пользователь уже есть';
        $this->roles = usersR::GetRoleAll();

        view();
    }
    
    public function loginPOST() {
        $user = usersR::GetByLoginAndPassword($_POST['login'], $_POST['password']);
        
        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role_id'] = $user->role_id;
            header('location: ../user/index');
        } else header('location: ../auth/index?status=false');
    }

    public function registrationPOST() {
        $user = usersR::GetByLogin($_POST['login']);

        if (!$user) {

            usersR::AddUser($_POST['surname'], $_POST['name'], $_POST['middlename'], $_POST['email'], $_POST['phone'], $_POST['login'], $_POST['password'], $_POST['role']); 

            header('location: ../auth/index?status=true');
        } else  header('location: ../auth/registration?status=false');
    }

    public function logout() {
        session_destroy();
        header('location: ../auth/index');
    }
}

