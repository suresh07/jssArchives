<?php

class Model {

	public function __construct() {

		$this->db = new Database();
	}
	
	public function getPostData() {

		if (isset($_POST['submit'])) {

			unset($_POST['submit']);	
		}

		if(!array_filter($_POST)) {
		
			return false;
		}
		else {

			return array_filter(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
		}
	}

	public function getPrecastKey($type, $key){

	    $structure = json_decode(file_get_contents(PHY_JSON_PRECAST_URL . 'archive-structure.json'), true);

		return (isset($structure{$type}['selectKey'])) ? $structure{$type}{$key} : '';
	}

	public function getRandomID($type, $selectKey, $category, $count){

		$db = $this->db->useDB();
		$collection = $this->db->selectCollection($db);

		$result = $collection->findOne(['Type' => $type, $selectKey => $category], ['projection' => ['id' => 1], 'skip' => rand(0, $count - 1)]);

		if(!$result)
			$result = $collection->findOne(['Type' => $type, $selectKey => ['$exists' => false]], ['projection' => ['id' => 1], 'skip' => rand(0, $count - 1)]);
		
		return $result['id'];
	}

	public function getThumbnailPath($id){

		$artefactPath = PHY_DATA_URL . $id;

		$leaves = glob(PHY_DATA_URL . $id . '/thumbs/*' . PHOTO_FILE_EXT);

		$firstLeaf = array_shift($leaves);

		return ($firstLeaf) ? str_replace(PHY_DATA_URL, DATA_URL, $firstLeaf) : STOCK_IMAGE_URL . 'default-image.png';
	}

	public function syncArtefactJsonToDB($id){

		$db = $this->db->useDB();
		$collection = $this->db->selectCollection($db);

		$jsonFile = PHY_METADATA_URL . $id . '/index.json';

		$contentString = file_get_contents($jsonFile);
		$content = json_decode($contentString, true);
		$content = $this->beforeDbUpadte($content);

		$result = $collection->replaceOne(
			[ 'id' => $id ],	
			$content
		);

	}

	public function beforeDbUpadte($data){

		if(isset($data['Date'])){

			if(preg_match('/^0000\-/', $data['Date'])) {

				unset($data['Date']);
			}
		}
		return $data;
	}
}

?>
