window.addEventListener('pageshow', function() {
  sendPOSTRequest('../operacoes/logins/checkLogins.php', {}, 
    function(response) {
      if (response.authenticated) {
        console.log('Usuário logado');
        
      } else {   
          console.log(response);      
          window.location.href = '../pages/loginAdm.html';
      }
    },
    function(error) {
      console.log(error);
    }
  );
});

function sendPOSTRequest(url, data, successCallback, errorCallback) {
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(function(response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Erro ao enviar solicitação: ' + response.status);
      }
    })
    .then(function(responseData) {
      successCallback(responseData);
    })
    .catch(function(error) {
      errorCallback(error);
    });
}
