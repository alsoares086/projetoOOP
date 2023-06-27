$(document).ready(function() {
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


    sendPOSTRequest('../operacoes/exibir/exibirTurmas.php', {}, function(data) {
        $.each(data, function(index, turma) {
            var row = $('<tr></tr>');
            row.append($('<td></td>').text(turma.codigo));
            row.append($('<td></td>').text(turma.curso.nome.toString()));
            row.append($('<td></td>').text(turma.curso.turno.toString()));
            row.append($('<td></td>').text(turma.curso.tipo.toString()));
            var detalhesBtn = $('<button></button>').text('Detalhes');
            detalhesBtn.click(function() {
                //funcionalidades do botão
              console.log('Detalhes da turma:', turma);
            });
            row.append($('<td></td>').append(detalhesBtn));
            $('#turmasTable tbody').append(row);
        });
    }, function(error) {
        console.error('Ocorreu um erro:', error);
    });
});