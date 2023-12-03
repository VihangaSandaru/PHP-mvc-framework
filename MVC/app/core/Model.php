<?php


Trait Model {

    use Database;
    // protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    public function findAll(){
        $query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }

    public function where($data, $data_not=[]){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        // $query = "select * from $this->table where id = :id && date = now() && id != :id";
        $query = "select * from $this->table where ";
        foreach($keys as $key){
            $query .= $key . " = :". $key . " && ";
        }
        foreach($keys_not as $key){
            $query .= $key ." != :". $key ." && ";
        }
        $query = trim($query, " && ");

        $query .= "order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);   // fetch wena object okkoma metanin return weno

    }

    public function first($data, $data_not=[]){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        // $query = "select * from $this->table where id = :id && date = now() && id != :id";
        $query = "select * from $this->table where ";
        foreach($keys as $key){
            $query .= $key . " = :". $key . " && ";
        }
        foreach($keys_not as $key){
            $query .= $key ." != :". $key ." && ";
        }
        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);
        // return $this->query($query, $data); 
        $result= $this->query($query, $data);

        if($result){
            return $result[0];
        }
        return false;
    }
    public function insert($data){

        /* removed not allowed access to data */

        if(!empty($this->allowedColumns)){
            foreach($data as $key){
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $keys= array_keys($data);
        // $query = "insert into $this->table (";

        // foreach($keys as $key){
        //     $query .= $key .",";
        // }
        // $query=trim($query, ',');
        // $query .= ") values (";
        // foreach($keys as $key){
        //     $query .= ":". $key .",";
        // }
        // $query = trim($query, ",");
        // $query .= ")";

        // echo $query;

        $query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
        // echo $query;

        $this->query($query, $data);
        echo "Insertion successful";

        
    }
    public function update($id, $data, $id_column = 'id'){

        /* removed not allowed access to data */

        if(!empty($this->allowedColumns)){
            foreach($data as $key){
                if(!in_array($key, $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $keys=array_keys($data);
        $data[$id_column] = $id;
        $query = "update $this->table set ";
        foreach($keys as $key){
            $query.= $key ." = :".$key.", ";
        }
        $query=trim($query, " ,");
        $query .= " where $id_column = :$id_column";

        $this->query($query, $data);
        echo "Update Successful";

    }
    public function delete($id, $id_column='id'){
        
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";
        // echo $query;
        $this->query($query, $data);
        echo "Deletion successful";
    }
}