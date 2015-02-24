<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 21/02/2015
 * Time: 15:43
 */

include_once('connect.php');
//$obj = new connection();
class professor extends connection{

    public function test(){
    }
    /**
     * @param $name
     * @param $password
     * @return bool
     * @return bool
     */
     public function login($name, $password){
         $obj = new connection();
        $obj->connect();

        $sql = "select firstname, lastname from credentials where username='$name' and password='$password'";
         /** @var TYPE_NAME $obj */
         $obj->query($sql);

         echo "print";

         /** @var TYPE_NAME $num_rows */
         /** @var TYPE_NAME $num_rows */
         /** @var TYPE_NAME $num_rows */
         /** @var TYPE_NAME $query_result */
         $num_rows = $obj->get_num_rows(); //get_num_rows();

        if ($num_rows == 0) {
            echo "Invalid username/password combination";
        }
         else{
            /** @var TYPE_NAME $result */
            $result = $obj->fetch();

            /** @var TYPE_NAME $_SESSION */
//            $_SESSION['username'] = $result['username'];
            $_SESSION['username'] = $name;
            header("Location: index.php");
            return true;
        }

         /** @var TYPE_NAME $username */
         $username = $this->login($username, $password);
         /** @var TYPE_NAME $username */
         if(isset($username)){
            header("Location: index.php");
        }
    }
}
