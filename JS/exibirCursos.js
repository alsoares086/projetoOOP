// Supondo que você tenha uma div com o id "cursos-container" onde os checkboxes serão exibidos
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
function displayCursosCheckbox(cursos) {
  for (var i = 0; i < cursos.length; i++) {
    createCheckbox(cursos[i]);
  }
}

// Função para buscar os cursos via AJAX
function getCursosCheckbox() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var cursos = JSON.parse(xhr.responseText);
        displayCursosCheckbox(cursos);
      } else {
        console.log("Erro ao buscar cursos: " + xhr.status);
      }
    }
  };

  xhr.open("GET", "http://localhost/EduManage/PHP/exibir/exibirCursos.php", true);
  xhr.send();
}

// Chamada da função para buscar e exibir os cursos
getCursosCheckbox();
