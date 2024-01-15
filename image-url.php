<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
$client = OpenAI::client($_ENV['OPENAI_API_KEY']);

$response = $client->images()->create([
    'model' => 'dall-e-3',
    'prompt' => 'A panda flying over Paris at night',
    'n' => 1,
    'size' => '1024x1024',
    'response_format' => 'url',
]);

foreach ($response->data as $data) {
    $data->url; 
    $data->b64_json; // null
}

// display the image
echo '<img src="' . $data->url . '" />';

?>