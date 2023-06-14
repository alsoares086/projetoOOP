let cursosCheckbox = document.getElementById("cursos-container-checkbox");
let cursosSelect = document.getElementById("cursos-container-select");


// Função para criar um elemento checkbox com base nas informações de um curso

function createSelect(curso){
  var select = document.createElement("select");
  select.name = "tipo[]";
  select.id = "tipo[]";

  var defaultOption = document.createElement("option");
  defaultOption.value = "";
  defaultOption.textContent = "Escolha um curso";
  select.appendChild(defaultOption);

  for (var i = 0; i < curso.cursos.length; i++) {
    var option = document.createElement("option");
    option.value = curso.cursos[i].idCurso;
    option.textContent = curso.cursos[i].nomeCurso;
    select.appendChild(option);
  }

  // Adicione o select ao elemento pai desejado no HTML
  var container = document.getElementById("cursos-container-select");
  container.appendChild(select);

  select.addEventListener("change", function () {
    var tipoSelecionado = select.value;
    displayCursosByTipo(tipoSelecionado);
  });

}

function displayCursosByTipo(tipo) {
  var cursos = document.getElementsByClassName("curso-item");
  for (var i = 0; i < cursos.length; i++) {
    var curso = cursos[i];
    if (curso.dataset.tipo === tipo || tipo === "") {
      curso.style.display = "block";
    } else {
      curso.style.display = "none";
    }
  }
}


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

  cursosCheckbox.appendChild(checkbox);
  cursosCheckbox.appendChild(label);
  cursosCheckbox.appendChild(br);
}

// Função para exibir os cursos como checkboxes
function displayCursosCheckbox(cursos) {
  for (var i = 0; i < cursos.length; i++) {
    createCheckbox(cursos[i]);
  }
}

// Função para exibir os cursos como select
function displayCursosSelect(cursos) {
  for (var i = 0; i < cursos.length; i++) {
    createSelect(cursos[i]);
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

/*
// Chamada da função sendPOSTRequest para buscar os alunos
sendPOSTRequest('../../projetoOOP/PHP/exibir/exibirCursos.php', {}, 
  function(response) {
    displayCursosCheckbox(response);
    console.log(response);
  },
  function(error) {
    console.log(error);
  }
);*/

// Chamada da função sendPOSTRequest para buscar os alunos
sendPOSTRequest('../../projetoOOP/PHP/exibir/exibirCursos.php', {}, 
  function(response) {
    displayCursosCheckbox(response);
    console.log(response);
  },
  function(error) {
    console.log(error);
  }
);

