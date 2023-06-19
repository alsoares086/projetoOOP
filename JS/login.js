window.addEventListener('DOMContentLoaded', function() {
    sendPOSTRequest('../operacoes/logins/checkLogins.php', {}, 
      function(response) {
        if (response.authenticated) {
          console.log('Usuário logado:', response.matricula);
          window.location.href = '../../pages/homeAdm.html';
          // Usuário autenticado, permitir o acesso à página
        } else {
          window.location.href = '../../pages/loginAdm.html';
        }git a
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