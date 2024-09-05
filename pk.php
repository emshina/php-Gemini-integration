<?php

// Replace with your actual API key
$apiKey = 'AIzaSyBr9mqp2ZfRGNgUvYABtXd6GkonOUWXsO4'; 

// Set the Bard API endpoint
$apiUrl = 'https://bard.google.com/api/v1/chat';

// Your Gemini prompt (to be sent to Bard)
$prompt = "Write a short story about a cat and a dog who are best friends.";

// Prepare the request data
$data = [
    'model' => 'bard', // This should be 'bard'
    'prompt' => $prompt,
    // Add any necessary API parameters
];

// Send the request to the Bard API
$response = file_get_contents($apiUrl, false, stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json'
        ],
        'content' => json_encode($data)
    ]
]));

// Process the response
$response = json_decode($response);

// Extract the generated text
$text = $response->content;

echo $text;

?>