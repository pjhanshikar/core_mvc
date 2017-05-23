<?php

class Model {


	private $link;
	function __construct()
	{
		$this->link = mysql_connect('localhost','root','');
		mysql_select_db('core_mvc',$this->link) or die(mysql_error());
	}
	function __distruct()
	{
		mysql_close($this->link);
	}
	 
	 function check_login($username,$pass)
	 {
 		$sql = sprintf("select * from mvc_admin where email ='%s' and password='%s'",$username,$pass);
		$rs=mysql_query($sql,$this->link) or die(mysql_error());
		if(mysql_num_rows($rs)==1)
		return mysql_fetch_assoc($rs);
		else
	    return false;
	 }


	 function fetch_entry_all($table)
	 {
	 	$sql = "SELECT * FROM ".$table." ORDER BY create_date DESC";
		$rs=mysql_query($sql,$this->link) or die(mysql_error());
		if(mysql_num_rows($rs)>=1)
		return $rs;
	    return false;
	 }
	 
	 function check_entry($tabel, $col, $value)
	 {
		$sql = "SELECT * FROM ".$tabel." WHERE ".$col."='".$value."'";
		$rs=mysql_query($sql,$this->link) or die(mysql_error());
		if(mysql_num_rows($rs)==1)
		return mysql_fetch_assoc($rs);
	    return false;
	 }

     function add_attr($value)
	 {
	   $sql="insert into prd_attributes (attr_name) VALUES ('$value')";
	   $rs=mysql_query($sql,$this->link) or die(mysql_error());
		if(mysql_affected_rows()==1)
		return true;
	    return false;
	 }

	 function edit_attributeDetails($id,$name)
	 { 
	 	$date=date("Y-m-d H:i:s");
		$sql="update prd_attributes set attr_name='$name', update_date='$date' where attr_id='$id'";
		$rs = mysql_query($sql,$this->link);
		if(mysql_affected_rows()==1)		
		return true;
		else
		return false;
	 }

	 function add_cat($cat, $parent_cat)
	 {
	 	$sql="insert into prd_categories (cat_title, cat_parent_id) VALUES ('$cat', '$parent_cat')";
	   $rs=mysql_query($sql,$this->link) or die(mysql_error());
		if(mysql_affected_rows()==1)
		return true;
	    return false;
	 }

	 function edit_categoryDetails($id,$cat,$parent_cat)
	 {
	 	$date=date("Y-m-d H:i:s");
		$sql="update prd_categories set cat_title='$cat', cat_parent_id = '$parent_cat', update_date='$date' where cat_id='$id'";
		$rs = mysql_query($sql,$this->link);
		if(mysql_affected_rows()==1)		
		return true;
		else
		return false;
	 }

	
	 function delete($table, $col, $val)
	 {
	 $sql="DELETE FROM ".$table." WHERE ".$col."=". $val; 
	  $rs = mysql_query($sql,$this->link);
	  if(mysql_affected_rows()==1)		
	  return true;
	  else
	  return false;
	 }
	
	
	function fetchByID($table, $col, $id)
	 {
	   $sql="select * from ".$table." where ".$col."=". $id;
		  $rs = mysql_query($sql,$this->link);
		  if(mysql_affected_rows()>=1)
		  {	
		  	return $rs;
		  }
		  else
		  {
		  return false;
		  }
	 }
	
	
		 
		 
	
		
		 
	
	
	
}

?>