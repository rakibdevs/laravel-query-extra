<?php
namespace RakibDevs\QueryExtra;

/**
 * Update different conditional data in a single query.
 *
 * @package  laravel-query-extra
 * @author   Md. Rakibul Islam <rakib1708@gmail.com>
 * @version  dev-master
 * @since    2021-03-21
 */

use RakibDevs\QueryExtra\Options\BulkUpdate;

class QueryExtra
{

	protected $table;


	public static function bulkUpdate(string $table, string $key, array $update)
	{
		self::run(BulkUpdate::make($table, $key, $update));
	}

	public static function run(string $qr)
	{
		dd($qr);
		return DB::statement($qr);
	}

}