<?php 


class Mahasiswa_model {
	private $table = 'mahasiswa';
	private $db;


	public function __construct()
	{
		$this->db = new Database;
	}


	



// 	private $mhs = [
// [ 
// 	"nama" => "Rian Rinaldi",
// 	"nrp" => "173040120",
// 	"email" => "Riangembira23@gmail.com",
// 	"jurusan" => "Teknik Informatika"
// ],
// [ 
// 	"nama" => "Ardiana",
// 	"nrp" => "173040116",
// 	"email" => "Ardiana16@gmail.com",
// 	"jurusan" => "Teknik Mesin"
// ],
// [
// 	"nama" => "M Adam",
// 	"nrp" => "173040123",
// 	"email" => "Madam123@gmail.com",
// 	"jurusan" => "Teknik Industri"
// ]
// ];
 
public function getAllMahasiswa()

{
	$this->db->query('SELECT * FROM ' . $this->table);
	return $this->db->resultSet();
}

public function getMahasiswaById($id)
{
	$this->db->query('SELECT * FROM '.$this->table.' where id='.$id);
	$this->db->bind('id', $id);
	// var_dump($id);
	// exit();
	return $this->db->single();
}

public function tambahDataMahasiswa($data) 
{
	$query = "INSERT INTO mahasiswa 
				VALUES 
				('', :nama, :nrp, :email, :jurusan)";

				$this->db->query($query);
				$this->db->bind('nama', $data['nama']);
				$this->db->bind('nrp', $data['nrp']);

				$this->db->bind('email', $data['email']);
				$this->db->bind('jurusan', $data['jurusan']);

				$this->db->execute();


				return $this->db->rowCount();




}

	public function hapusDataMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

public function ubahDataMahasiswa($data) 
{
	$query = "UPDATE mahasiswa SET 
					nama = :nama,
					nrp  = :nrp,
					email= :email,
				    jurusan= :jurusan
				    WHERE id = :id"; 
				$this->db->query($query);
				$this->db->bind('nama', $data['nama']);
				$this->db->bind('nrp', $data['nrp']);
				$this->db->bind('email', $data['email']);
				$this->db->bind('jurusan', $data['jurusan']);
				$this->db->bind('id', $data['id']);
				$this->db->execute();
				return $this->db->rowCount();
// var_dump($query);
// exit();



}

	public function cariDataMahasiswa()
	{
		$keyword = $_POST['keyword'];
		// var_dump($keyword);
		// exit();
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%". $keyword."%'";
		$this->db->query($query);
		$this->db->bind('keyword', "%keyword%");
		return $this->db->resultSet();
	}

}
 ?>