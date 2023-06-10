<?php

namespace Kathamo\Database\Migrations;

use CodesVault\Howdyqb\DB;
use Kathamo\App\Core\Lib\SingleTon;

class CacheMigration
{
	use SingleTon;

	public function __construct()
	{
		// DB::create('cache') // table name
		// 	->column('ID')->bigInt()->unsigned()->autoIncrement()->primary()->required()
		// 	->column('key')->string(255)->required()
		// 	->column('data')->string(255)->default('NULL')
		// 	->index(['ID'])
		// 	->execute();
	}
}
