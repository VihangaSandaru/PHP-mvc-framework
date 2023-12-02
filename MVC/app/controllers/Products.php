<?php
class Products extends Controller{
   
    public function index(){
        echo "This is the Products controller";

        $this->view('products');
    }
}