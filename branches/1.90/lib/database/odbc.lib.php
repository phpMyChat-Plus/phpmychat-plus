<?php
// ODBC library for phpMyChat by J. "Guli" Mikulas <guli1@email.cz>

class DB
{
	var $Host = C_DB_HOST;			// Hostname of our MySQL server
	var $Database = C_DB_NAME;		// Logical database name on that server
	var $User = C_DB_USER;			// Database user
	var $Password = C_DB_PASS;		// Database user's password
	var $UseODBCCursor = 0;
	var $Link_ID = 0;			// Result of mysql_connect()
	var $Query_ID = 0;			// Result of most recent mysql_query()
	var $Record	= array();		// Current mysql_fetch_array()-result
	var $Row    = 0;			// Current row number
	var $Errno = 0;				// Error state of query
	var $Error = "";

	var $Auto_Free = 1;     ## set this to 1 to automatically free results, 0 else


	function halt($msg)
	{
		printf("</td></tr></table><b>Database error:</b> %s<br>\n", $msg);
		printf("<b>ODBC Error</b>: %s (%s)<br>\n",
		$this->Errno,
		$this->Error);
		die("Session halted.");
	}


	function connect()
	{
		if (0 == $this->Link_ID)
		{
			$this->Link_ID = odbc_connect($this->Database, $this->User, $this->Password, $this->UseODBCCursor);
			if (!$this->Link_ID)
			{
				$this->halt("Link-ID == false, connect failed");
			}
		}
	}
  
	function query($Query_String)
	{
		// remove the 'LIMIT' clause from the query
		$pos = strpos($Query_String, " LIMIT ");
		if ($pos) $Query_String = substr($Query_String, 0, $pos);
		unset($pos);

		$this->connect();

		# printf("<br>Debug: query = %s<br>\n", $Query_String);

		# rei@netone.com.br suggested that we use this instead of the odbc_exec().
		# He is on NT, connecting to a Unix MySQL server with ODBC. -- KK
		# $this->Query_ID = odbc_prepare($this->Link_ID,$Query_String);
		# $this->Query_Ok = odbc_execute($this->Query_ID);
        
		$this->Query_ID = odbc_exec($this->Link_ID,$Query_String);
		$this->Row = 0;
		odbc_binmode($this->Query_ID, 1);
		odbc_longreadlen($this->Query_ID, 4096);
    
		if (!$this->Query_ID)
		{
			$this->Errno = 1;
			$this->Error = "General Error (The ODBC interface cannot return detailed error messages).";
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}
  
	function next_record()
	{
		$this->Record = array();
		$this->$stat = odbc_fetch_into($this->Query_ID, ++$this->Row, &$this->Record);
		if (!$this->$stat)
		{
			if ($this->Auto_Free)
			{
				odbc_free_result($this->Query_ID);
				$this->Query_ID = 0;
			};
		}
		else
		{
			// add to Record[<key>]
			$count = odbc_num_fields($this->Query_ID);
			for ($i=1; $i<=$count; $i++)
			$this->Record[strtolower(odbc_field_name ($this->Query_ID, $i)) ] = $this->Record[ $i - 1 ];
		}
		return $this->Record;
	}
  
	function seek($pos)
	{
		$this->Row = $pos;
	}

	function metadata($table)
	{
		$count = 0;
		$id    = 0;
		$res   = array();

		$this->connect();
		$id = odbc_exec($this->Link_ID, "select * from $table");
		if (!$id)
		{
			$this->Errno = 1;
			$this->Error = "General Error (The ODBC interface cannot return detailed error messages).";
			$this->halt("Metadata query failed.");
		}
		$count = odbc_num_fields($id);
    
		for ($i=1; $i<=$count; $i++)
		{
			$res[$i]["table"] = $table;
			$name             = odbc_field_name ($id, $i);
			$res[$i]["name"]  = $name;
			$res[$i]["type"]  = odbc_field_type ($id, $name);
			$res[$i]["len"]   = 0;  // can we determine the width of this column?
			$res[$i]["flags"] = ""; // any optional flags to report?
		}
    
		odbc_free_result($id);
		return $res;
	}
  
	function num_rows()
	{
		# Many ODBC drivers don't support odbc_num_rows() on SELECT statements.
		$num_rows = odbc_num_rows($this->Query_ID);
		//printf ($num_rows."<br>");

		# This is a workaround. It is intended to be ugly.
		if ($num_rows < 0)
		{
			$i=10;
			while (odbc_fetch_row($this->Query_ID, $i)) $i*=10;

			$j=0;
			while ($i!=$j)
			{
				$k= $j+intval(($i-$j)/2);
				if (odbc_fetch_row($this->Query_ID, $k))
					$j=$k;
				else 
					$i=$k;
				if (($i-$j)==1)
				{
					if (odbc_fetch_row($this->Query_ID, $i)) 
						$j=$i;
					else 
						$i=$j; 
				};
				//printf("$i $j $k <br>");
			};
			$num_rows=$i;
		}

		return $num_rows;
	}
  

	function num_fields()
	{
		return count($this->Record)/2;
	}
  
	function field_value($Field_Name)
	{
		return $this->Record[strtolower($Field_Name)];
	}
  
	function f($Field_Name)
	{
		return $this->Record[strtolower($Field_Name)];
	}

	function affected_rows()
	{
		return odbc_num_rows($this->Query_ID);
	}  

	function optimize($tbl_name)
	{
		// TODO...
		return false;
	}

	function clean_results()
	{
		if($this->Query_ID != 0) odbc_freeresult($this->Query_ID);
	}

	function close()
	{
		if($this->Link_ID != 0) odbc_close($this->Link_ID);
	}
}
?>