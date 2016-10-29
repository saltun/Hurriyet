<?php
/**
 * Savaş Can ALTUN <savascanaltun@gmail.com>
 * @link http://savascanaltun.com.tr
 * @link https://developers.hurriyet.com.tr/
 * @version 1.0
 */
class Hurriyet {
    
    /**
     * @var string
     */
    private $apiKey = null;
    
    /**
     * @var string
     */
    private $apiBase = "https://api.hurriyet.com.tr/v1/"; // default api base url
    
    /**
     * @var string
     */
    private $data = null;
    
    /**
     * Sınıfın başlangıcı ve key bilgisinin alınıp değişkene atandığı alan
     * @param string
     * @return void
     */
    public function __construct($apiKey) {
        if (empty($apiKey)) {
            die('Api anahtarı bulunamadı');
        }
        
        
        $this->apiKey = $apiKey;
    }
    
    /**
     * İçerikleri listeleme fonksiyonu
     * @param string
     * @param string
     * @param string
     * @return void
     */
    
    public function listArticle($filter = null, $select = null, $count = null) {
        
        if (empty($filter)) {
            $this->getRequest('articles');
            
        } else {
            $this->getRequest('articles?filter=' . $filter . '&select=' . $select . 'foo&top=' . $count);
        }
        
    }
    /**
     * İçerik listeleme fonksiyonu
     * @param string
     * @return void
     */
    public function getArticle($id) {
        
        $this->getRequest('articles/' . $id);
    }
    /**
     * Köşe yazarlarının içeriklerini listeleme fonksiyonu
     * @param string
     * @param string
     * @param string
     * @return void
     */
    public function getColumnists($filter = null, $select = null, $count = null) {
        if (empty($filter)) {
            
            $this->getRequest('columns');
        } else {
            
            $this->getRequest('columns?filter=' . $filter . '&select=' . $select . '&top=' . $count);
        }
    }
    /**
     * Köşe yazarının içeriklerini listeleme fonksiyonu
     * @param string
     * @return void
     */
    public function getColumnist($id) {
        
        $this->getRequest('columns/' . $id);
        
    }

     /**
     * RFC 1123 tipinde tarih dizisi döndürür. RFC 1123 için "ols.ietf.org/html/rfc1123" adresine bakınız.
     * @return void
     */
    public function date() {
        
        $this->getRequest('date');
        
    }
    
    /**
     * CURL Fonksiyonu sorguyu alır çalıştırır data değişkenine aktarır 
     * @param string
     * @return string
     */
    protected function getRequest($request) {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiBase . $request,
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
                "apikey: " . $this->apiKey
            )
        ));
        
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        
        $this->data = json_decode($response);

        curl_close($curl);
        
        
    }
    
    /**
     * Api Sonuçlarını getir
     * @return string
     */
    
    public function getData() {
        return $this->data;
    }
    
    
}