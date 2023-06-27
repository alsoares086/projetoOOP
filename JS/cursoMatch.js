// Função para remover acentos de uma string
function removeAccents(str) {
    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

document.addEventListener('DOMContentLoaded', function () {
    var cursoInput = document.getElementById('curso');
    var cursoList = document.getElementById('lista-cursos');
    var cursos = [];

    cursoInput.addEventListener('input', function () {
        var searchTerm = removeAccents(cursoInput.value.toLowerCase()); // Remove os acentos do termo de busca
        var filteredCursos = cursos.filter(function (curso) {
            var cursoNome = removeAccents(curso.nomeCurso.toLowerCase()); // Remove os acentos do nome do curso
            return cursoNome.indexOf(searchTerm) !== -1;
        });

        if (searchTerm !== '') {
            showCursos(filteredCursos);
        } else {
            cursoList.innerHTML = '';
        }
    });

    function loadCursos() {
        var url = '../operacoes/exibir/exibirCursos.php';
        var data = {};
    
        sendPOSTRequest(url, data, function (response) {
          cursos = response;
        }, function (error) {
          console.error('Erro ao carregar os cursos:', error);
        });
      }

    function showCursos(cursos) {
        cursoList.innerHTML = '';
        cursos.forEach(function (curso) {
            var cursoItem = document.createElement('div');
            var checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'cursos';
            checkbox.value = curso.idCurso;
            checkbox.classList.add('ml-3');
            cursoItem.appendChild(checkbox);

            var label = document.createElement('label');
            label.textContent = curso.nomeCurso;
            label.classList.add('ml-1');
            cursoItem.appendChild(label);

            var info = document.createElement('p');
            info.textContent = 'Tipo: ' + curso.tipoCurso + ' - Turno: ' + curso.turno;
            info.classList.add('ml-3');
            cursoItem.appendChild(info);

            cursoList.appendChild(cursoItem);
        });
    }

    // Carrega os cursos ao carregar a página
    loadCursos();
});

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
