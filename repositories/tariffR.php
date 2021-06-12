<?
class tariffR {

    static public function GetTariffs($limit = 0) {
        global $db;

        $limit = $limit == 0 ? "" :  "LIMIT $limit";

        $query = "select * from `tariff`  $limit";
        $result = $db->query($query);

        return $result;
    } 

    static public function GetTariffsById($id) {
        global $db;

        $query = "select * from `tariff` where `id` = '$id'";
        $result = $db->query($query);

        return $result;
    } 

    static public function AddTariff($title, $desc, $tota_sum, $relevance) {
        global $db;

        $query = "insert into `tariff`(`title`, `description`, `price`, `relevance`) VALUES('$title','$desc','$tota_sum','$relevance')";
        $result = $db->query($query);

        return $result;
    }

    static public function Edit($id, $title, $desc, $tota_sum, $relevance) {
        global $db;

        $query = "update `tariff` set `title`='$title', `description`='$desc',`price`='$tota_sum',`relevance`='$relevance' where `id`='$id'";
        $result = $db->query($query);

        return $result;
    }

    static public function Delete($tariff_id) {
        global $db;

        $query = "delete from `tariff` where `id` = '$tariff_id'";
        $result = $db->query($query);

        return $result;
    }

    static public function getService($tariff) {
        $array = explode("\r\n", $tariff->description);

        return $array;
    }
}
