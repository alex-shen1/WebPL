let xhr = new XMLHttpRequest();
function makeAjaxCall(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    // 2. Create an instance of an XMLHttpRequest object
    // let xhr = GetXmlHttpObject();


    // custom defined function that returns XMLHttpRequest if your browser is good
    // and a random other version if you're a dinosaur using IE5/6

    if (xhr == null) {
        alert("Your browser does not support XMLHTTP!");
        return;
    }


    // 3. specify a backend handler (URL to the backend)
    let url = "welcomeMsg.php";

    // 4. Assume we are going to send a GET request,
    //    use url rewriting to pass information the backend needs to process the request
    url = url + `?StringSoFar=${str}`;

    // 5. Configure the XMLHttpRequest instance.
    //    Register the callback function.
    //    Assume the callback function is named showHint(),
    //    don't forget to write code for the callback function at the bottom

    // onreadystatechange is a field of XHR objects that stores callback function
    xhr.onreadystatechange = showHint;
    xhr.url = url;

    // 6. Make an asynchronous request
    xhr.open("GET", url, true); // true = async (default), false = sync

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // declare that content type is binary without boundary?

    // 7. The request is sent to the server
    xhr.send(null); // not sure why we do null here?

    // 8. Once the response is back the from the backend,
    //    the callback function is called to update the screen
    //    (this will be handled by the configuration above)



}

// 1. Add event listener to the input boxes.
//    Call makeAjaxCall() when the event happens
document.getElementById("fname").addEventListener("keyup", function() {
    let str_sofar = document.getElementById("fname").value;
    makeAjaxCall(str_sofar);
})

// The callback function processes the response from the server
function showHint() {
    // what do to with the response

    // readyState = 4 means that request is ready to use
    // status = 200 means response code; nothing failed
    if(xhr.readyState == 4 && xhr.status == 200){
        //update DOM
        document.getElementById("txtHint").innerHTML = xhr.responseText;
    }
    console.log(xhr.responseText);

}


function GetXmlHttpObject() {
    // Create an XMLHttpRequest object

    if (window.XMLHttpRequest) {  // code for IE7+, Firefox, Chrome, Opera, Safari
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject) { // code for IE6, IE5
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}