var loader = document.querySelector('.loader');

function showLoader() {
    loader.style.display = 'block';
}

function hideLoader() {
    loader.style.display = 'none';
}

document.getElementById("dataForm").addEventListener("submit", function (e) {
  e.preventDefault();
  showLoader();

  var selectedProduct = document.getElementById("product").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "fetchData.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      document.getElementById("responseArea").innerText =
        JSON.stringify(response, null, 3);
    } else {
      console.error("Request failed", xhr.statusText);
    }
    hideLoader();
  };

  xhr.onerror = function() {
    alert("Request failed", xhr.statusText);
    hideLoader(); 
};

  // Send the request data
  xhr.send(`product=${selectedProduct}`);
});
