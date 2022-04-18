
var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };
  
  fetch("http://api.airvisual.com/v2/nearest_city?key=99b80a4b-fe31-44de-b9ff-bc85a1c69b8b", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));