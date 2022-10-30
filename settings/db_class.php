<?php

require('db_cred.php');

/**
 *@author Digney Yemofio
 *@version 1.0
 */
class db_connection
{
	
	public $db = null;
	public $results = null;

	//connect
	/**
	*Database connection
	*@return bolean
	**/
	function db_connect(){
		$this->db = mysqli_connect("us-cdbr-east-06.cleardb.net","b9cd28c7abc157","d5fb23f2","heroku_0486fd9877d15e7");
		if (mysqli_connect_errno()) {
			return false;
		}else{
			return true;
		}
	}

	//execute a query
	/**
	*Query the Database
	*@param takes a connection and sql query
	*@return bolean
	**/
	function db_query($sqlQuery){
		if (!$this->db_connect()) {
			return false;
		}
		elseif ($this->db==null) {
			return false;
		}

		$this->results = mysqli_query($this->db,$sqlQuery);
		if ($this->results == false) {
			return false;
		}else{
			return true;
		}

	}

	//fetch data
	/**
	*get select data
	*@return a record
	**/
	function db_fetch(){
		if ($this->results == null) {
			return false;
		}
		elseif ($this->results == false) {
			return false;
		}
		return mysqli_fetch_assoc($this->results);

	}
}
?>
