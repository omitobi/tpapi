<?php
namespace Apier;
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 10.08.16
 * Time: 11:13
 */
class APIKey
{
    protected $key;
    public function __construct()
    {
        $this->key = $this->makeAPIKey();
    }

    protected function makeAPIKey(){
      return  "1111";
    }

    public function verifyKey($apikey, $origin){
        return ($apikey==$origin) ? true : false;
    }
}