<?php
App::uses('AppController','Controller');
class ZipcodesController extends AppController{
    public $components = array('Paginator','Flash','Search.Prg',);
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('search','index','csvupload');
    }
    public function search(){
		$this->autoRender = false;
		if($this->request->is('ajax')) {
			$zipcode = $this->request->data('zipcode');
			$options = array('conditions'=>array('zipcode'=>$zipcode));
			if($result = $this->Zipcode->find('all',$options)){
				return json_encode($result);
			}
			return json_encode(null);
		}
	}
    public function csvupload(){
        $file_temp_name = $this->request->data['Csv']['file']["tmp_name"];
        $file_name = $this->request->data['Csv']['file']["name"];
        $file_size = $this->request->data['Csv']['file']["size"];
        if (is_uploaded_file($file_temp_name) && ($fp = fopen($file_temp_name,'r')) !== false) {
            $file_path = Router::url($_SERVER["DOCUMENT_ROOT"].'/app/Files/csv/');
            $file = $file_path.$file_name;
            if (move_uploaded_file($file_temp_name, $file)) {
                chmod($file, 0644);
                $truncate = "TRUNCATE TABLE zipcodes;";
                $this->Zipcode->query($truncate);
                $setutf8 = "SET character_set_database=utf8;";
                $this->Zipcode->query($setutf8);
                //csvファイルをテーブルに挿入
                $sql = "LOAD DATA LOCAL INFILE "."'".$file."' ";
                $sql .= "INTO TABLE zipcodes ";
                $sql .= "FIELDS ";
                $sql .= "TERMINATED BY ',' ";
                $sql .= "OPTIONALLY ENCLOSED BY "."'".'"'."' ";
                $sql .= "ESCAPED BY '' ";
                $sql .= "LINES ";
                $sql .= "STARTING BY '' ";
                $sql .= "TERMINATED BY "."'".'\\'.'r\\'.'n'."' ";
                $sql .= "(jiscode,zipcode_old,zipcode,pref_kana,city_kana,street_kana,pref,city,street,flag1,flag2,flag3,flag4,flag5,flag6)";
                $this->Zipcode->query($sql);
                unlink($file_path.$file_name);
            }
            $this->Flash->success(__('CSVファイルはアップロードされました'));
        }
    }
    public function index(){
        //アップロードボタンが押されたらcsvuploadアクションが発動する。
        if(!empty($this->request->data['Csv'])){
            $this->csvupload();
        }
    }
}
