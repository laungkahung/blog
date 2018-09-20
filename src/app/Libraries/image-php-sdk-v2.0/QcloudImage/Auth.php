<?php
/**
 * Signature create related functions.
 */

namespace QcloudImage;

/**
 * Auth class for creating reusable signature.
 */
class Auth
{

    public function __construct($appId, $secretId, $secretKey)
    {
        $this->appId = $appId;
        $this->secretId = $secretId;
        $this->secretKey = $secretKey;
    }

    public function getSign()
    {
        if($this->getSignCache()){
            return $this->getSignCache();
        }
        return $this->setSign();
    }

    /**
     * Return the appId
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Create reusable signature.
     * This signature will expire at time()+$howlong timestamp.
     * Return the signature on success.
     * Return false on fail.
     */
    public function setSign($bucket = 'bucket', $howlong = 90*24*60*60)
    {
        if ($howlong <= 0) {
            return false;
        }

        $now = time();
        $expiration = $now + $howlong;
        $random = rand();

        $plainText = "a=" . $this->appId . "&b=$bucket&k=" . $this->secretId . "&e=$expiration&t=$now&r=$random&f=";
        $bin = hash_hmac('SHA1', $plainText, $this->secretKey, true);
        $sign = base64_encode($bin . $plainText);
        if ($expiration > strtotime('+3 month')) {
            $expiration = strtotime('+3 month');
        }
        $this->setSignCache($sign,($expiration-$now)/60-30);
        return $sign;
    }

    protected function getSignCache()
    {
        return cache('tencent_orc_sign');
    }

    protected function setSignCache($sign, $mins = 10)
    {
        return cache(['tencent_orc_sign' => $sign], $mins);
    }

    private $appId = "";
    private $secretId = "";
    private $secretKey = "";
}
