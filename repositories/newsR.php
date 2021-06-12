<?
class newsR {

    static public function GetNewsAll($limit = 0) {
        $file = file_get_contents('public/src/news.json');

        $news = json_decode($file, true);
        unset($file);

        if($limit > 0) {
            $n = [];
            $count = count($news) <= $limit ? count($news) : $limit; 
            for ($i=0; $i < $count; $i++) { 
                array_push($n, $news[$i]); 
            } 
            $news = $n;
        } 
        
        return $news;
    } 

    static public function Add($title, $desc, $date) {
        $file = file_get_contents('public/src/news.json');
        $taskList = json_decode($file,TRUE);

        array_push($taskList, ['title'=>$title, 'description'=>$desc, 'date'=>$date]);
        
        $taskList = newsR::sort($taskList);

        file_put_contents('public/src/news.json',json_encode($taskList));         
        unset($taskList);                    
    } 

    static public function Edit($id, $title, $desc, $date) {
        $file = file_get_contents('public/src/news.json');
        $taskList = json_decode($file,TRUE);

        foreach ($taskList as $key => $value) {
            if($key == $id) $taskList[$key] = ['title'=>$title, 'description'=>$desc, 'date'=>$date];
        }

        $taskList = newsR::sort($taskList);
       
        file_put_contents('public/src/news.json',json_encode($taskList));         
        unset($taskList);                   
    } 

    static public function Delete($current) {
        $file = file_get_contents('public/src/news.json');
        $taskList= json_decode($file,TRUE);
     
        foreach ($taskList  as $key => $value) {        
          
            if($key == $current) {
                unset($taskList[$key]);           
            }
        }   

        $taskList = newsR::sort($taskList);
       
        file_put_contents('public/src/news.json',json_encode($taskList));         
        unset($taskList);                    
    } 

    static public function sort($a) {
        $res = [];
        foreach ($a as $key => $value) {
            array_push($res, $value);
        }
        return $res;
    }
}

