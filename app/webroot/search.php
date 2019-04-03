<?php
	//$zipcode = $this->request->data['zipcode'];
	//                //$options = array('conditions'=>array('zipcode'=>$zipcode));
	//                                //if($result = $this->PostalCode->find('all',$options)){
	//                                                //      $this->set(compact('result'));
	//                                                                //}
	$this->autoRender = false;
	if($this->request->is('ajax')) {
		return $this->data['name']."さん、こんにちは";
	}
?>
