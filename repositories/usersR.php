<?
class usersR {

    static public function GetAll() {
        global $db;

        $query = "select * from user order by role_id";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetRoleById($roleId) {
        global $db;

        $query = "select * from role where id = '$roleId'";
        $result = $db->query($query);

        return $result->fetch_object();
    } 

    static public function GetRoleAll() {
        global $db;

        $query = "select * from role";
        $result = $db->query($query);

        return $result;
    } 
    

    static public function GetById($id) {
        global $db;

        $query = "select * from user where `id` = '$id'";
        $result = $db->query($query);

        return $result->fetch_object();
    } 
    
    static public function GetByLoginAndPassword($login, $password) {
        global $db;

        $query = "select * from user where `login`='$login' AND password = '$password'";
        $result = $db->query($query);

        return $result->fetch_object();
    } 

    static public function GetByLogin($login) {
        global $db;

        $query = "select * from user where `login`='$login'";
        $result = $db->query($query);

        return $result->fetch_object();
    } 
     
    static public function SaveById($id, $surname, $name, $patronymic, $phone, $email) {
        global $db;

        $query = "
            UPDATE `user` 
            SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',
                `phone`='$phone',`email`='$email' 
            WHERE `id` = '$id'
        ";
        $result = $db->query($query);

        return $result;
    } 

    static public function AddUser($surname, $name, $middlename, $email, $phone, $login, $password, $role) {
        global $db;

        $query = "
            INSERT INTO `user`(`login`, `password`, `surname`, `name`, `patronymic`, `phone`, `email`, `role_id`)
            VALUES ('$login','$password', '$surname', '$name', '$middlename', '$phone', '$email', '$role')
        ";
        $result = $db->query($query);

        return $result;
    } 
    
    static public function Edit($id, $surname, $name, $patronymic, $role) {
        global $db;

        $query = "
            UPDATE `user` 
            SET `surname`='$surname',`name`='$name',`patronymic`='$patronymic',`role_id`='$role'
            WHERE `id` = '$id'
        ";
        $result = $db->query($query);

        return $result;
    }

    static public function Delete($user_id) {
        global $db;

        $query = "delete from `user` where `id` = '$user_id'";
        $result = $db->query($query);

        return $result;
    }
}

