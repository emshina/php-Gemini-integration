<?php
require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Decode incoming JSON request
$data = json_decode(file_get_contents("php://input"));

// Check if text exists in request
if (isset($data->text)) {
    $text = $data->text;

    // Initialize the Gemini API client
    $client = new Client("AIzaSyBJzUINUaOlE7-GNWaUXKrGodoqb_qaD90");

    // Generate a response using the Gemini API
    try {
        $response = $client->geminiPro()->generateContent(
            new TextPart($text)
        );

        // Output the response text
        echo $response->text();
    } catch (Exception $e) {
        // Handle errors gracefully
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No text provided";
}
?>