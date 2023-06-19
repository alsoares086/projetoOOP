var cursosContainer = document.getElementById("cursos-container");
var tipoSelect = document.getElementById('tipo');
var tipoSelecionado = tipoSelect.value;

// Função para criar um elemento option com base nas informações de um curso
function createOption(curso) {
    var option = document.createElement("option");
    //option.value = curso.idCurso;  // Define o value como o ID do curso
    option.textContent = curso.nomeCurso;  // Define o texto do option como o nome do curso
    return option;
}
  
  function displayCursos(cursos) {
    var selectCursos = document.createElement("select");
    //selectCursos.id = cursos.id;
    selectCursos.name = "cursos[]";
    selectCursos.classList.add("form-control");
  
    var defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.textContent = "Selecione uma opção";
    selectCursos.appendChild(defaultOption);
  
    for (var i = 0; i < cursos.length; i++) {
      var option = createOption(cursos[i]);
      selectCursos.appendChild(option);
    }
  
    cursosContainer.appendChild(selectCursos);
  }

function sendPOSTRequest(url, data, successCallback, errorCallback) {
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
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
  
  // Chamada da função sendPOSTRequest para buscar os cursos
  sendPOSTRequest('../../projetoOOP/operacoes/exibir/exibirCursosTipo.php', { tipo: tipoSelecionado }, 
    function(response) {
      console.log(response);
      displayCursos(response.cursos);
    },
    function(error) {
      console.log(error);
    }
  );
