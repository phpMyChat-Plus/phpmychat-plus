<?php
class DB
{
	var $Host = C_DB_HOST;			// Hostname of our MySQL server
	var $Database = C_DB_NAME;		// Logical database name on that server
	var $User = C_DB_USER;			// Database user
	var $Password = C_DB_PASS;		// Database user's password
	var $Link_ID = 0;				// Result of mysql_connect()
	var $Query_ID = 0;				// Result of most recent mysql_query()
	var $Record	= array();			// Current mysql_fetch_array()-result
	var $Row;						// Current row number
	var $Errno = 0;					// Error state of query
	var $Error = "";

	function halt($msg)
	{
		echo("</TD></TR></TABLE><B>Database error:</B> $msg<br>\n");
		echo("<B>MySQL error</B>: $this->Errno ($this->Error)<br />\n");
		die("Session halted.");
	}

	function connect()
	{
		if(!$this->Link_ID)
		{
			$this->Link_ID = mysql_connect($this->Host, $this->User, $this->Password);
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES 'utf8'"); 
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
			}
			$SelectResult = mysql_select_db($this->Database, $this->Link_ID);
			if(!$SelectResult)
			{
				$this->Errno = mysql_errno($this->Link_ID);
				$this->Error = mysql_error($this->Link_ID);
				$this->halt("cannot select database <I>".$this->Database."</I>");
			}
		}
	}

	function query($Query_String)
	{
		if(!$this->Link_ID) $this->connect();
		if(gettype($this->Link_ID) == "resource") $this->Query_ID = mysql_query($Query_String,$this->Link_ID);
		$this->Row = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
		if (function_exists('mysql_free_result')) mysql_free_result($this->Query_ID);
		else mysql_freeresult($this->Query_ID);
	}

	function next_record()
	{
		$this->Record = mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			if (function_exists('mysql_free_result')) mysql_free_result($this->Query_ID);
			else mysql_freeresult($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
	}

	function num_rows()
	{
		if(gettype($this->Query_ID) == "resource") return mysql_num_rows($this->Query_ID);
	}

	function affected_rows()
	{
		if (gettype($this->Link_ID) == "resource") return mysql_affected_rows($this->Link_ID);
	}

	function optimize($tbl_name)
	{
		if(!$this->Link_ID) $this->connect();
		$this->Query_ID = mysql_query("OPTIMIZE TABLE $tbl_name",$this->Link_ID);
	}

	function truncate($tbl_name)
	{
		if(!$this->Link_ID) $this->connect();
		$this->Query_ID = mysql_query("TRUNCATE TABLE $tbl_name",$this->Link_ID);
	}

	function repair($tbl_name)
	{
		if(!$this->Link_ID) $this->connect();
		$this->Query_ID = mysql_query("REPAIR TABLE $tbl_name",$this->Link_ID);
	}

	function clean_results()
	{
#		if($this->Query_ID != 0) mysql_freeresult($this->Query_ID);
		if($this->Query_ID && gettype($this->Query_ID) == "resource")
		{
			if (function_exists('mysql_free_result')) mysql_free_result($this->Query_ID);
			else mysql_freeresult($this->Query_ID);
		}
	}

	function close()
	{
#		if($this->Link_ID != 0) mysql_close($this->Link_ID);
		if(gettype($this->Link_ID) == "resource") mysql_close($this->Link_ID);
	}
}
?>