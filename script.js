// function generateResponse(){
//     var text = document.getElementById("text");
//     var response = document.getElementById("response");
    
//     fetch("response.php",{
//         method: "post",
//         body: JSON.stringify({
//             text:text.value,
//         }),
//     })
//     .then((res) => res.text)
//     .then((res) =>{
//         response.innerHTML =res;
//     });
// }

function generateResponse(){
    var text = document.getElementById("text");
    var response = document.getElementById("response");
    
    fetch("response.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            text: text.value,
        }),
    })
    .then((res) => res.text())  // Invoke .text() function
    .then((res) => {
        response.innerHTML = res;
    })
    .catch((error) => {
        console.error("Error:", error);
        response.innerHTML = "An error occurred";
    });
}