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
use RakibDevs\QueryExtra\Traits\ProcessQuery;

class QueryExtra
{
	use ProcessQuery;

	/**
     * The base query table instance.
     *
     * @var \RakibDevs\QueryExtra\QueryExtra
     */
	protected $table;

	/**
     * The base query where key instance.
     *
     * @var \RakibDevs\QueryExtra\QueryExtra
     */

	protected $whereKey;

	/**
     * The base query instance.
     *
     * @var \RakibDevs\QueryExtra\QueryExtra
     */

	protected $query;



	/**
	 * Bulk update
     * 
     * @param  array $update
     * @return boolean
    */

	public function bulkUpdate(array $update)
	{
		$this->buildUpdateQuery($update)
			 ->run();
	}

	/**
	 * Build bulk update query 
     * 
     * @param  array $update
     * @return $this
     * update array basic structure
       $update = [
    		[
    			'data' => [
    				'field_1' => 'field_1_v1lue_a',
    				'field_2' => 'field_2_v1lue_a'
    			],
    			'value' => 2
    		],
    		[
    			'data' => [
    				'field_2' => 'field_1_v1lue_b',
    				'field_2' => 'field_1_v1lue_b'
    			],
    			'value' => 3
    		],
    	];
     *
     */

	public function buildUpdateQuery(array $update)
	{
		$this->query = (new BulkUpdate)
			->make($this->table, $this->whereKey, $update);

		return $this;
	}

	

}