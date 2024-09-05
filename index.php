<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxson AI</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #36d1dc, #5b86e5);
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #fffc00;
        }

        #text {
            width: 60%;
            padding: 15px;
            font-size: 1.2em;
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        button {
            padding: 15px 30px;
            font-size: 1.2em;
            background-color: #ff5722;
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff7043;
        }

        #response {
            margin-top: 20px;
            padding: 20px;
            font-size: 1.2em;
            background-color: #fff;
            color: #333;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .response-title {
            font-weight: bold;
            font-size: 1.5em;
            color: #ff5722;
            margin-bottom: 10px;
        }

        .response-content {
            white-space: pre-wrap; /* Ensures line breaks are respected */
            font-family: 'Courier New', Courier, monospace;
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Ensures long text can scroll horizontally */
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Maxson AI</h1>
    
    <input type="text" id="text" placeholder="Enter your query here">
    <br><br>
    
    <button onclick="generateResponse()">Generate Response</button>
    <br><br>
    
    <div id="response">
        <!-- Response content will be inserted here -->
    </div>
    
    <script>
        function generateResponse(){
            var text = document.getElementById("text");
            var responseDiv = document.getElementById("response");
            
            fetch("response.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    text: text.value,
                }),
            })
            .then((res) => res.text())
            .then((res) => {
                responseDiv.innerHTML = `
                    <div class="response-title">AI Response</div>
                    <div class="response-content">${res}</div>
                `;
            })
            .catch((error) => {
                console.error("Error:", error);
                responseDiv.innerHTML = `<div class="error-message">An error occurred. Please try again.</div>`;
            });
        }
    </script>
</body>
</html>