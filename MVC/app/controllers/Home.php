<?php
class Home extends Controller{
   
    public function index($a = '', $b = '', $c=''){
        
        $model = new Model ;
        // $arr['id'] = 6;
        $arr = array("name" => "chamod", "age"=> 19, "date" => "2023-11-26 20:33:31.526526");
        // $result = $model->where($arr);
        // $result = $model->insert($arr);
        // $result = $model->delete(5);
        // show($result);

        $result = $model->update(3, $arr);
        

        echo "This is the home controller";
        $this->view('home');
    }
}

