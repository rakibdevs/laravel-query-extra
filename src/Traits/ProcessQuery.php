<?php

namespace RakibDevs\QueryExtra\Traits;

use Illuminate\Support\Facades\DB;

trait ProcessQuery
{
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
	 * Initiate Query 
     *
     * @return boolean
     */

	private function run()
	{
		return DB::statement($this->query);
	}
}