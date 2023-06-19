
var cursosContainer = document.getElementById("cursos-container");

// Função para criar um elemento checkbox com base nas informações de um curso
function createCheckbox(curso) {
  var checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.name = "cursos[]";
  checkbox.value = curso.idCurso;
  checkbox.id = "curso_" + curso.idCurso;

  var label = document.createElement("label");
  label.htmlFor = "curso";
  label.classList.add('ml-3');
  //label.htmlFor = "curso_" + curso.idCurso;

  // Adicionando o nome do curso
  var nomeCurso = document.createTextNode(curso.nomeCurso);
  label.appendChild(nomeCurso);

  // Adicionando o separador " - "
  var separator = document.createElement("span");
  separator.innerHTML = " - ";
  label.appendChild(separator);

  // Adicionando o tipo do curso
  var tipoCurso = document.createElement("span");
  tipoCurso.innerHTML = curso.tipoCurso;
  label.appendChild(tipoCurso);

  // Adicionando o separador " - "
  var separator2 = document.createElement("span");
  separator2.innerHTML = " - ";
  label.appendChild(separator2);

  // Adicionando o turno do curso
  var turnoCurso = document.createElement("span");
  turnoCurso.innerHTML = curso.turno;
  label.appendChild(turnoCurso);

  var br = document.createElement("br");

  cursosContainer.appendChild(checkbox);
  cursosContainer.appendChild(label);
  cursosContainer.appendChild(br);
}

// Função para exibir os cursos como checkboxes
function displayCursos(cursos) {
  for (var i = 0; i < cursos.length; i++) {
    createCheckbox(cursos[i]);
  }
}

function sendPOSTRequest(url, data, successCallback, errorCallback) {
  fetch(url, {
    method: 'POST',
    headers: {
      "Content-type": "application/json"
    },
    body: JSON.stringify(data)
  })
    .then(function(response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("Erro ao enviar solicitação: " + response.status);
      }
    })
    .then(function(responseData) {
      successCallback(responseData);
    })
    .catch(function(error) {
      errorCallback(error);
    });
}



// Chamada da função sendPOSTRequest para buscar os alunos
sendPOSTRequest('../../projetoOOP/operacoes/exibir/exibirCursos.php', {}, 
  function(response) {
    displayCursos(response);
    console.log(response);
  },
  function(error) {
    console.log(error);
  }
);

