<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \GraphQL\Type\Schema;
use \GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

/**
 * Indolj GQL Schema
 */
class iSchema
{
	
	public function get()
	{
		return new Schema([
			'query' => $this->queryType()
		]);
	}

	public function queryType()
	{
		return new ObjectType([
			'name' => 'Query',
			'fields' => [
				'echo' => [
					'type' => Type::string(),
					'resolve' => function() {
						return "Hello";
					}
				]
			]
		]);
	}

	private function sqlToGql()
	{
		$table_data = include __DIR__ . '/SqlDb.php';


	}

}