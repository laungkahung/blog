<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/9/17
 * Time: 14:07
 */

namespace App\Plugins\TencentOcr\Request;
use GuzzleHttp\Client as HttpClient;

class OrcClient
{
    private $apiUrl     = 'http://recognition.image.myqcloud.com';
    private $appId      = '';
    private $secretId   = '';
    private $secretKey  = '';
    static protected $ins = null;

    final protected function __construct($appId = null,$secretId = null,$secretKey = null)
    {
        $this->appId     = config('tencent.orc_app_id', $appId);
        $this->secretId  = config('tencent.orc_secret_id', $secretId);
        $this->secretKey = config('tencent.orc_secret_key', $secretKey);
        $this->http      = new HttpClient(['base_uri' => $this->apiUrl]);
    }

    static public function getInstance(){
        if (self::$ins instanceof self) {
            return self::$ins;
        }
        self::$ins=new self();
        return self::$ins;
    }

    /**
     *
     */
    public function requestBusinessCardByUrls($urls = array())
    {
        $url = '/ocr/businesscard';
        $josn = [
            'appid'    => $this->appId,
//            'bucket'   => 'test',
            'url_list' => $urls
        ];
        $headers = [
            'host' => 'recognition.image.myqcloud.com',
            'content-type'  => 'application/json',
            'authorization' => $this->getSign()
        ];

        return $this->post($url,$josn,null,$headers);
    }

    public function requestBusinessCardByFiles($images)
    {
        $url = '/ocr/businesscard';
        $josn = [
            'appid'    => $this->appId,
            'bucket'   => 'test',
            'image'    => $images,
        ];
        $headers = [
            'host' => 'recognition.image.myqcloud.com',
            'content-type'  => 'multipart/form-data',
            'authorization' => $this->getSign()
        ];

        return $this->post($url,$josn,null,$headers);
    }

    public function getSign(){
        $sign = $this->getSignCache();
        if($sign){
            return $sign;
        }else{
            return $this->setSign();
        }
    }

    protected function setSign()
    {
        //签名分为两种：
        //多次有效签名：签名中绑定或者不绑定文件 fileid，需要设置大于当前时间的有效期，最长可设置三个月，在此期间内签名可多次使用。
        //单次有效签名：签名中绑定文件 fileid，有效期必须设置为 0，此签名只可使用一次，且只能应用于被绑定的文件。
        //拼接多次有效签名串：
        $currentTime = time();
        $expiredTime = strtotime('+3 month');
        $rand        = rand();
        $mins        = ($expiredTime - $currentTime) / 60 - 30;
        $bucket      = "test";
        $str         = 'a=' . $this->appId . '&b=' . $bucket . '&k=' . $this->secretId . '&e=' . $expiredTime . '&t=' . $currentTime . '&r=' . $rand . '&f=';
        $sign        = $this->getSignature($str);
        $this->setSignCache($sign,$mins);
        return $sign;
    }

    protected function getSignCache()
    {
        return cache('tencent_orc_sign');
    }

    protected function setSignCache($sign, $mins = 100)
    {
        return cache(['tencent_orc_sign' => $sign], $mins);
    }


    private function get($url, $query)
    {
        $response = $this->http->get($url, [
            'query' => $query,
        ]);
        if ($response->getStatusCode() == 200) {
            $result = json_decode((string) $response->getBody(), true);
            return $result;
        }
        return null;
    }

    private function post($url, $json, $query = null,$headers = ['Content-type' => 'application/json'])
    {
        $response = $this->http->post($url, [
            'query' => $query,
            'json' => $json,
            'headers' => $headers,
        ]);
        if ($response->getStatusCode() == 200) {
            $result = json_decode((string) $response->getBody(), true);
            return $result;
        }
        return null;
    }

    private function getSignature($str) {
        if (function_exists('hash_hmac')) {
            $signature = base64_encode(hash_hmac('SHA1', $str, $this->secretKey, true) . $str);
        } else {
            $blocksize = 64;
            $hashfunc  = 'sha1';
            if (strlen($this->secretKey) > $blocksize) {
                $key = pack('H*', $hashfunc($this->secretKey));
            }
            $key  = str_pad($key, $blocksize, chr(0x00));
            $ipad = str_repeat(chr(0x36), $blocksize);
            $opad = str_repeat(chr(0x5c), $blocksize);
            $hmac = pack(
                'H*', $hashfunc(
                    ($key ^ $opad) . pack(
                        'H*', $hashfunc(
                            ($key ^ $ipad) . $str
                        )
                    )
                )
            );
            $signature = base64_encode($hmac.$str);
        }
        return $signature;
    }

}