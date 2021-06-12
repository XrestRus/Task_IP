<?

function isRole($role) {
    global $db;

    $isRole = $db->query("select * from role where `title` = '$role'")->fetch_all();

    return $isRole ? true : false;
};

function isRolesAll($rolesArray) {
    global $db;

    foreach ($rolesArray as $key => $value) {
        $isRole = $db->query("select * from role where `id` = '$value'")->fetch_all() ? true : false;

        if($isRole) break;
    }

    return $isRole;
};

//ЗАЯВКА
define('STATE_PENDING_PROCESSING','Ожидает обработки');
define('STATE_PROCESSED','Обработано');
define('STATE_CANCEL','Отклонено');

//ДОГОВОР
define('STATE_ACTIVE','Активный');
define('STATE_AWAITING_PAY', 'Ожидает оплаты');

//РАСЧЕТ
define('STATE_NOT_PAID','Не оплачено');
define('STATE_PAY','Оплачено');