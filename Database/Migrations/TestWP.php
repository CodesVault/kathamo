<?php

namespace Howdy\Database\Migrations;

use CodesVault\Howdyqb\DB;
use Kathamo\App\Core\Lib\SingleTon;

class TestWP
{
	use SingleTon;

	public function __construct()
	{
		// DB::create('howdy')
		// 	->column('ID')->bigInt()->unsigned()->autoIncrement()->primary()->required()
		// 	->column('name')->string(255)->required()
		// 	->column('email')->string(255)->default('NULL')
		// 	->index(['ID'])
		// 	->execute();
	}
}
