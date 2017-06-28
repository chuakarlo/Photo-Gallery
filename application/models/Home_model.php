<?php
class Home_model extends CI_Model {

	public function insert($data) {
		$query = $this->db->insert('photos', $data);
	}

	public function update($tags, $id) {
		$result = $this->getPhoto($id);

		$tags = preg_replace('/\s*,\s*/', ",", $tags);

		if ($result[0]->image_tags != "") {
			$data['image_tags'] = $result[0]->image_tags . "," . $tags;
		} else {
			$data['image_tags'] = $tags;
		}

		$query = $this->db->where('photoId', $id)
					->update('photos', $data);
	}

	public function getPhotos($id) {

		$query = $this->db->select('photoId, file_name, image_tags')
					->from('photos')
					->where('photoId >',$id)
					->limit(10)
					->get();

		return $query->result();
	}

	public function getPhoto($id) {

		$query = $this->db->select('image_tags')
					->from('photos')
					->where('photoId',$id)
					->limit(1)
					->get();

		return $query->result();
	}
}