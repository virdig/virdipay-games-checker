<?php

class VirdipayGamesChecker
{
    public $link = "https://virdipay.com/api/games-checker";
    public $apikey;
    public $secret;

    public function __construct($apikey, $secret)
    {
        $this->apikey = $apikey;
        $this->secret = $secret;
    }

    public function VGC_byID($id = null, $code = null)
    {
        return json_decode($this->Request($this->link, "key=" . $this->apikey . "&secret=" . $this->secret . "&action=games&games=" . $code . "&id=" . $id));
    }

    public function VGC_byIDS($id = null, $server = null, $code = null)
    {
        return json_decode($this->Request($this->link, "key=" . $this->apikey . "&secret=" . $this->secret . "&action=games&games=" . $code . "&id=" . $id . "&server=" . $server));
    }

    protected function Request($url, $post = false)
    {
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_RETURNTRANSFER => true
        ));

        if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
