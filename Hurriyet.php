<?php 
/**
* Savaş Can ALTUN <savascanaltun@gmail.com>
* @link http://savascanaltun.com.tr
*/
class Hurriyet{

	private $apiKey=null;
	private $apiBase="https://api.hurriyet.com.tr/v1/"; // default api base url
	private $data=null;

	public function __construct($apiKey){
		if(empty($apiKey)){ die('Api anahtarı bulunamadı'); };

		$this->apiKey=$apiKey;
	}

	public function listArticle($filter=null,$select=null,$count=null){

		if (empty($filter)) {
			$this->getRequest('articles');
			
		}else{
			$this->getRequest('articles?filter='.$filter.'&select='.$select.'foo&top='.$count);
		}
		
	}

	public function getArticle($id){

		$this->getRequest('articles/'.$id);
	}

	public function getColumnists($filter=null,$select=null,$count=null){
		if (empty($filter)) {

			$this->getRequest('columns');
		}else{

			$this->getRequest('columns?filter='.$filter.'&select='.$select.'&top='.$count);
		}
	}

	public function getColumnist($id){

		$this->getRequest('columns/'.$id);

	}


	protected function getRequest($request){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->apiBase.$request,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
 		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "accept: application/json",
		    "apikey: ".$this->apiKey
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$this->data=json_decode($response);
		$this->data=$request;
		curl_close($curl);


	}

	public function getData(){
		return $this->data;
	}
	
	public function __destruct(){

	}
}