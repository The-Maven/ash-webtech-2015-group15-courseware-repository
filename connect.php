<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 21/02/2015
 * Time: 16:00
 */

define("DB_HOST", 'localhost');
define("DB_NAME", 'courseware');
define("DB_PORT", 3306);
define("DB_USER","root");
define("DB_PWORD","humble5300.");

define("LOG_LEVEL_SEC",0);
define("LOG_LEVEL_DB_FAIL",0);

define("PAGE_SIZE",10);

/**
 * @param $level
 * @param $er_code
 * @param $msg
 * @param $mysql_msg
 * @return int
 */
function log_msg($level, $er_code, $msg, $mysql_msg){
    return 0;
}

 class connection{

    /**error description*/
    var $str_error;
    /*error code*/
    var $error;
    /*db connection link*/
    var $link;
    /* Every error log has a 4 digit code. The first two digits(prefix) tells you which class logged the error*/
    var $er_code_prefix;
    /* query result resource*/
    var $result;

    public function adb() {

        $this->er_code_prefix=1000;
        $this->link=false;
        $this->result = false;
    }

    /**
     * logs error into database using functions defined in log.php
     * @param $level
     * @param $code
     * @param $msg
     * @param string $mysql_msg
     * @return int
     */
    public function log_error($level, $code, $msg, $mysql_msg = "NONE") {
        $er_code = $this->er_code_prefix + $code;
        //call to a predefined function
        $log_id = log_msg($level, $er_code, $msg, $mysql_msg);
        //if log id is false return 0;
        if (!$log_id) {
            return 0;
        }

        //display this code to user
        $this->error="$er_code-$log_id";
        return $log_id;
    }

    /**
     * creates connection to database
     */
    public function connect() {

        if($this->link)
        {
            return true;
        }
        //try to connect to db
        $this->link = mysql_connect(DB_HOST , DB_USER, DB_PWORD);

        if (!$this->link) {
            //if connection fail log error and set $str_error
            //echo "not connected";	//debug line
            $this->log_error(LOG_LEVEL_DB_FAIL,1, "connection failed  in db:connect()", mysql_error());
            return false;
        }
        //echo "connected";
        if (!mysql_select_db(DB_NAME)) {

            $log_id = $this->log_error(LOG_LEVEL_DB_FAIL,2, "select db failed   in db:connect()", mysql_error($this->link));
            return false;
        }

        return true;
    }


    /**
     *returns a row from a data set
     */
    public function fetch() {
        return mysql_fetch_assoc($this->result);
    }

     /**
      * connect to db and run a query
      * @param $str_sql
      * @return bool
      */
    public function query($str_sql) {

        if (!$this->connect()) {
            return false;
        }

        $this->result = mysql_query($str_sql,$this->link);
        if (!$this->result) {
            $this->log_error(LOG_LEVEL_DB_FAIL, 4, "query failed", mysql_error($this->link));
            return false;
        }

        return true;
    }
    /**
     * returns number of rows in current dataset
     */
    public function get_num_rows() {
        return mysql_num_rows($this->result);
    }
    /**
     *returns last auto generated id
     */
    public function get_insert_id() {
        return mysql_insert_id($this->link);
    }

}