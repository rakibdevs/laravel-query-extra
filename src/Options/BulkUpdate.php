<?php

namespace RakibDevs\QueryExtra\Options;


class BulkUpdate
{

	public static function make(string $table, string $key, array $update)
    {
    	$values = collect($update)
            ->pluck('value')
            ->toArray();

    	$qr  = "update $table set ";
    	$qr .= self::case($update, $key);
    	$qr .= " where $key in (".implode(', ',$values).")";

    	return $qr;
    }

  

    private static function case(array $update, $key)
    {
    	foreach ($update as $k => $val) {
            foreach ($val['data'] as $k1 => $v) {
                if($v){
                    $cases[$k1][] =  "when ".$val['value']." then $v";
                }
            }
        }

        foreach ($cases as $k => $v) {
    		$s[$k] = $k." = case $key ".implode(" ",$v)." end";
    	}

        return implode(', ', $s);

    }

    
}