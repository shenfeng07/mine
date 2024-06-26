<?php

namespace Mine\Helper;

use GeoIp2\Database\Reader;
use Hyperf\Support\Composer;
use MaxMind\Db\Reader\InvalidDatabaseException;
use Mine\Mine;


class Ip2region
{

    protected Reader $reader;

    /**
     * @throws InvalidDatabaseException
     */
    public function __construct()
    {

        $composerLoader = Composer::getLoader();
        $path = $composerLoader->findFile(Mine::class);

        $dbFile = dirname(realpath($path)).'/GeoLite2-City.mmdb';

        $this->reader = new Reader($dbFile);
    }

    /**
     * @param string $ip
     * @return string
     */
    public function search(string $ip): string
    {
        try{
            $record = $this->reader->city($ip);
            return ($record->country->names['zh-CN']??"").",".($record->city->names['zh-CN']??"");
        }catch (\Throwable $e){
            return 'unknown';
        }
    }
}