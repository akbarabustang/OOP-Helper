<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helper/Format.php');
?>

<?php 
/**
* 
*/
class Class
{
	
	private $db;
	private $fm;

	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAll(){
 		$query = " SELECT * FROM  ORDER BY  DESC ";
 		$result = $this->db->select($query);
 		return $result;
 	}

 	public function delById($id){
		$query = "DELETE FROM  WHERE  = '$id' ";
		$deldata = $this->db->delete($query);
	}

	public function barangInsert($data){
 		$var = mysqli_real_escape_string($this->db->link, $data['var']);

	    if ($var == "" ) {
	    	$pesan = "<span class='error'>Form tidak boleh kosong</span> ";
	    	return $pesan;
	    }else{
	    	$query = " INSERT INTO  (field)
					   VALUES
					   ('$var' )";
		
			$masukkan_data = $this->db->insert($query);
			header("Location:?p=pages");	
	    }
 	}

 	public function getById($id){
		$query = "SELECT * FROM  
				  WHERE 
				  id = '$id' ";	
		$result = $this->db->select($query);
		return $result;
	}

	public function Update($data, $id){
 		$var = mysqli_real_escape_string($this->db->link, $data['var']);

 		if ($var == "" ) {
	    	$pesan = "<span class='error'>Form tidak boleh kosong</span> ";
	    	return $pesan;
	    }else{
	    	$query = "UPDATE 
			    				SET
			    				field = '$var'
			    				WHERE
			    				id = '$id'
			    				";
			$masukkan_data = $this->db->update($query);
			header("Location:?p=pages");	
	    }

	}
}

 ?>