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
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'PHP/exibir/exibirCursos.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                cursos = response;
            }
        };

        xhr.send();
    }

    function showCursos(cursos) {
        cursoList.innerHTML = '';
        cursos.forEach(function (curso) {
            var cursoItem = document.createElement('div');
            var checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'curso[]';
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
