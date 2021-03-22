<?php

namespace RakibDevs\QueryExtra\Traits;

use Illuminate\Support\Facades\DB;

trait ProcessQuery
{
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
	 * Set base table.
     *
     * @param  string  $id
     * @return $this
     */

	public function table(string $table)
	{
		$this->table = $table;

		return $this;
	}

	/**
	 * Set conditional column name 
     *
     * @param  string  $key
     * @return $this
     */

	public function whereKey(string $key)
	{
		$this->whereKey = $key;
		
		return $this;
	}

	/**
	 * Initiate SQL Query 
     * lluminate\Support\Facades\DB
     * @return boolean
     */

	protected function run()
	{
		return DB::statement($this->query);
	}
}