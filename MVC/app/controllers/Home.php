<?php

class Home{

    use Controller;
    public function index(){
        
        $user = new User;
        // $arr['id'] = 6;
        // $arr = array("name" => "sahan", "age"=> 45, "date" => "2023-12-01 11:24:31.526526");
        // $result = $model->where($arr);
        // $result = $model->insert($arr);  model kiyana thanata user hri product kiyala hari danna one 
        // $result = $model->delete(5);
        // show($result);


        // $result = $user->findAll();
        // show($result);

        // echo "This is the home controller";
        $this->view('home');
    }
}

