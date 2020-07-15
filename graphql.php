<?php
require_once __DIR__ . '/vendor/autoload.php';

try {
	require_once __DIR__ . '/graphql/iSchema.php';

	$context = [
		'db' => [],
		'user' => []
	];

	$raw = file_get_contents('php://input') ?: '';
    $input = json_decode($raw, true) ?: [];

    if(json_last_error() !== JSON_ERROR_NONE)
    	$input = $raw;

    $schema = (new iSchema())->get();
    $query = $input['query'];
	$variableValues = isset($input['variables']) ? $input['variables'] : null;

    $result = GraphQL\GraphQL::executeQuery($schema, $query, $context, null, $variableValues);

    header('Content-Type: application/json');
    echo json_encode($result);
    die();
} catch (\Exception $e) {
	
}