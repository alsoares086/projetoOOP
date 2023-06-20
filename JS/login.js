window.addEventListener('DOMContentLoaded', function() {
  sendPOSTRequest('../operacoes/logins/checkLogins.php', {}, 
    function(response) {
      if (response.authenticated) {
        console.log('Usuário logado');
        window.location.href = '../pages/homeAdm.html';
      } else {
        setTimeout(function() {
          window.location.href = '../pages/loginAdm.html';
        }, 01); // Tempo de espera de 3 segundos (3000 milissegundos)
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
