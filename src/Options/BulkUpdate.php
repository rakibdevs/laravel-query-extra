<?php

namespace RakibDevs\QueryExtra\Options;

use RakibDevs\QueryExtra\Exceptions\InvalidTable;
use RakibDevs\QueryExtra\Exceptions\InvalidKey;
use RakibDevs\QueryExtra\Exceptions\InvalidData;

class BulkUpdate 
{
    /**
     * make update query
     *
     * @return string $query
     */


	public static function make($table,$key, array $update): string
    {
        if (is_null($table)) 
            throw new InvalidTable('table() is missing');
        
        if (is_null($key))
            throw new InvalidKey('whereKey() is missing');
        
        if (empty($update))
            throw new InvalidData('No data found!');

    	$arr   = collect($update)->pluck('keyval')->toArray();
        $arr   = implode(', ',$arr);
    	$case  = self::condition($update, $key);

        // raw sql query for bulk update
    	return "update $table set ".$case." where $key in (".$arr.")";

    	
    }

  
    /**
     * get conditional case statement
     *
     * @return string $query
     */
    private static function condition(array $update, $key)
    {
        foreach ($update as $k => $val) {
            
            if (!isset($val['keyval']))
                throw new InvalidKey('No value assigned to the key `keyval`');
            
            $column = $val['keyval'];
            foreach ($val['data'] as $k1 => $v) {
                $cases[$k1][] =  "when $column then '".$v."'";
            }
        }

        return self::case($cases, $key);
    }

    /**
     * build case statement
     *
     * @return string $query
     */

    private static function case(array $cases, $key)
    {
        foreach ($cases as $k => $v) {
            $s[$k] = $k." = case $key ".implode(" ",$v)." end";
        }

        return implode(', ', $s);
    }
    
}