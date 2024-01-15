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
    'response_format' => 'b64_json',
]);

foreach ($response->data as $data) {
    $data->url; // null
    $data->b64_json; 
}

// display base64 encoded image
echo '<img src="data:image/jpeg;base64,' . $data->b64_json. '" />';

?>