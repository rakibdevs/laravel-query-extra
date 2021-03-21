<?php

namespace RakibDevs\QueryExtra\Options\BulkUpdate;


class BulkUpdate
{

	protected function make(string $table, string $key, array $update)
    {
    	$values = collect($update['data'])->pluck('value');
    	$qr  = "update $table set ";
    	$qr .= $this->case($update, $key);
    	$qr .= " where $key in (".implode(', ',$values).")";

    	return $qr;
    }

  

    protected function case(array $update, $key)
    {
    	foreach ($update['data'] as $key => $val) {
            foreach ($val['data'] as $k => $v) {
                if($v){
                    $cases[$k][] =  "when ".$val['value']." then $v";
                }
            }
        }

        foreach ($cases as $k => $v) {
    		$s[$k] = $k." = case $key ".implode(" ",$v)." end";
    	}

        return implode(', ', $s);

    }

    
}