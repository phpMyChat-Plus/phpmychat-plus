<?php
// PostgreSQL library for phpMyChat by Martin Dvorak <jezek2@penguin.cz>

class DB
{
	var $Host = C_DB_HOST;		// Hostname of our PostgreSQL server
	var $Database = C_DB_NAME;		// Logical database name on that server
	var $User = C_DB_USER;		// Database user
	var $Password = C_DB_PASS;		// Database user's password
	var $Link_ID = 0;			// Result of pg_Connect()
	var $Query_ID = 0;			// Result of most recent pg_Exec()
	var $Record	= array();		// Current pg_fetch_array()-result
	var $Row;				// Current row number
	var $Errno = 0;			// Error state of query (not supported)
	var $Error = "";

	function halt($msg)
	{
		echo("</TD></TR></TABLE><B>Database error:</B> $msg<br>\n");
		echo("<B>PostgreSQL error</B>: $this->Errno ($this->Error)<br>\n");
		die("Session halted.");
	}

	function connect()
	{
		if($this->Link_ID == 0)
		{
			$options = '';
			if ($this->Host)
			{
				$tmp = split(':', $this->Host);
				$options .= 'host=' . $tmp[0];
				if ($tmp[1])
				{
					$options .= ' port=' . $tmp[1];
				}
			}
			$options .= ' dbname=' . $this->Database;
			if ($this->User)
			{
				$options .= ' user=' . $this->User;
			}
			if ($this->Password)
			{
				$options .= ' password=' . $this->Password;
			}
			$this->Link_ID = @pg_Connect($options);
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
			}
		}
	}

	function query($Query_String)
	{
		$this->connect();
		$this->Query_ID = @pg_exec($this->Link_ID,$Query_String);
		$this->Row = 0;
		$this->Error = pg_errormessage();
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}

	function next_record()
	{
		$this->Record = @pg_fetch_array($this->Query_ID, $this->Row);
		$this->Row += 1;
		$this->Error = pg_errormessage();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			pg_freeresult($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
	}

	function num_rows()
	{
		return pg_numrows($this->Query_ID);
	}

	function affected_rows()
	{
		return pg_cmdtuples($this->Query_ID);
	}

	function optimize($tbl_name)
	{
		$this->connect();
		$this->Query_ID =  @pg_exec($this->Link_ID, "VACUUM $tbl_name");
	}

	function clean_results()
	{
		if($this->Query_ID != 0) pg_FreeResult($this->Query_ID);
	}

	function close()
	{
		if($this->Link_ID != 0) pg_close($this->Link_ID);
	}
}
?>