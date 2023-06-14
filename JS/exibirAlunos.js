// Supondo que você tenha uma div com o id "cursos-container" onde os checkboxes serão exibidos
var alunosContainer = document.getElementById("alunos-container");

// Função para criar um elemento checkbox com base nas informações de um curso
function createCheckbox(aluno) {
  var checkbox = document.createElement("input");
  checkbox.type = "checkbox";
  checkbox.name = "alunos[]";
  checkbox.value = aluno.idAluno;
  checkbox.id = "alunos_" + aluno.idAluno;

  var label = document.createElement("label");
  label.htmlFor = "aluno";
  label.classList.add('ml-3');
  //label.htmlFor = "curso_" + curso.idCurso;

  // Adicionando o nome do Aluno
  var nomeAluno = document.createTextNode(aluno.nomeAluno);
  label.appendChild(nomeAluno);

  // Adicionando o separador " - "
  var separator = document.createElement("span");
  separator.innerHTML = " - ";
  label.appendChild(separator);

  // Adicionandoa matricula do Aluno
  var matriculaAluno = document.createElement("span");
  matriculaAluno.innerHTML = aluno.matriculaAluno;
  label.appendChild(matriculaAluno);

  var br = document.createElement("br");

  alunosContainer.appendChild(checkbox);
  alunosContainer.appendChild(label);
  alunosContainer.appendChild(br);
}

// Função para exibir os cursos como checkboxes
function displayAlunosCheckbox(alunos) {
  for (var i = 0; i < alunos.length; i++) {
    createCheckbox(alunos[i]);
  }
}

// Função para buscar os cursos via AJAX
function getAlunosCheckbox() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var alunos = JSON.parse(xhr.responseText);
        displayAlunosCheckbox(alunos);
      } else {
        console.log("Erro ao buscar alunos: " + xhr.status);
      }
    }
  };

  xhr.open("GET", "http://localhost/EduManage/PHP/exibir/exibirAlunos.php", true);
  xhr.send();
}

// Chamada da função para buscar e exibir os cursos
getAlunosCheckbox();
