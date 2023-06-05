
 //função para mostrar os nomes dos cursos de acordo com o tipo de curso selecionado
 $(document).ready(function() {
    $('#tipo').change(function() {
        var tipo = $(this).val();
        var cursos = {
            "Médio Integrado": ["Administração", "Agropecuária", "Agricultura", "Alimentos", "Biotecnologia", "Edificações", "Finanças", "Florestas", "Informática", "Meio Ambiente", "Recursos Pesqueiros", "Redes de Computadores"],
            "Técnico Subsequente": ["Agroecologia", "Agronegócio", "Agroindustria", "Gestão Ambiental", "Logistica", "Processos Escolares"],
            "Superior de Tecnologia": ["Agronegócio", "Agroindustria", "Agroecologia", "Gestão Ambiental", "Logística", "Sistemas para Internet", "Processos Escolares"],
            "Bacharelado": ["Administração", "Zootecnia"],
            "Licenciatura": ["Ciências Biológicas", "Física","Matemática", "Química"],
            "Especialização": ["Logística Empresarial", "Educação Profissional - EPT", "Docência em EPT", "Projeto Agricultor Familiar"],
            "Mestrado": ["Mestrado em EPT"]
        };
        $('#curso').empty();
        cursos[tipo].forEach(function(curso) {
            $('#curso').append('<option>' + curso + '</option>');
        });
    });
});
//fim da verificação dos cursos

//verificação do nome de usuário
$(document).ready(function(){
    let usuario_regex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g;
    

    $("#usuario").on("input", function() {
        var usuario = $(this).val();

        if (!usuario.match(usuario_regex) || usuario.length < 6) {
            $("#usuario_error").text("Mínimo 6 caracteres");
            $("#usuario_check").hide();
        } else {
            $("#usuario_error").text("");
            $("#usuario_check").show();
        }
    });
    //fim da verificação de usuário


    // Esconder os requisitos da senha até o campo ser focado pela primeira vez
    $("#senha_requisitos").hide();
    $("#confirm_status").hide();

    $("#senha").one("focus", function() {
        $("#senha_requisitos").show();
        $("#confirm_status").show();
    });

// verificação da senha
$("#senha").on("input", function() {
    let senha = $(this).val();

    // Verifique cada requisito de senha
    if (/[a-z]/.test(senha)) {
        $("#letras_minusculas .requisito").html("&#10004;").removeClass("red").addClass("green");
    } else {
        $("#letras_minusculas .requisito").html("&#10060;").removeClass("green").addClass("red");
    }

    if (/[A-Z]/.test(senha)) {
        $("#letras_maiusculas .requisito").html("&#10004;").removeClass("red").addClass("green");
    } else {
        $("#letras_maiusculas .requisito").html("&#10060;").removeClass("green").addClass("red");
    }

    if (/\d/.test(senha)) {
        $("#numeros .requisito").html("&#10004;").removeClass("red").addClass("green");
    } else {
        $("#numeros .requisito").html("&#10060;").removeClass("green").addClass("red");
    }

    if (/[@#$%^&*+=]/.test(senha)) {
        $("#caracteres_especiais .requisito").html("&#10004;").removeClass("red").addClass("green");
    } else {
        $("#caracteres_especiais .requisito").html("&#10060;").removeClass("green").addClass("red");
    }

    if (senha.length >= 6) {
        $("#min_caracteres .requisito").html("&#10004;").removeClass("red").addClass("green");
    } else {
        $("#min_caracteres .requisito").html("&#10060;").removeClass("green").addClass("red");
    }
});
//fim da verificação dos requisitos de senha

    // Verifique se as senhas coincidem
    $("#confirm_senha").on("input", function() {
        var senha = $("#senha").val();
        var confirm_senha = $(this).val();

        if (senha === confirm_senha && senha.length > 0 && confirm_senha.length > 0) {
            $("#confirm_status").html('<span style="color: green;" class="requisito">&#10004;</span> As senhas coincidem').css("color", "green");
        } else {
            $("#confirm_status").html('<span style="color: red;" class="requisito">&#10060;</span> As senhas não coincidem').css("color", "red");
        }
    });
});
//fim da verificação do confirmar senha

$(document).ready(function(){
    var $etapas = $(".etapa");
    var $progresso = $(".etapa-progresso li");

    $(".avancar").click(function(){
        var $etapaAtual = $(this).parent();
        var indice = $etapas.index($etapaAtual);

        // oculta a etapa atual e mostra a próxima
        $etapaAtual.hide();
        $etapas.eq(indice + 1).show();

        // atualiza a linha do tempo
        $progresso.eq(indice).removeClass("ativo");
        $progresso.eq(indice + 1).addClass("ativo");
    });

    $(".voltar").click(function(){
        var $etapaAtual = $(this).parent();
        var indice = $etapas.index($etapaAtual);

        // oculta a etapa atual e mostra a anterior
        $etapaAtual.hide();
        $etapas.eq(indice - 1).show();

        // atualiza a linha do tempo
        $progresso.eq(indice).removeClass("ativo");
        $progresso.eq(indice - 1).addClass("ativo");
    });
});


$(function(){
    for (i = 1; i <= 31; i++) {
        $('#day').append($('<option />').val(i).html(i));
    }
    for (i = 1; i <= 12; i++) {
        $('#month').append($('<option />').val(i).html(i));
    }
    for (i = 1900; i <= 2023; i++) {
        $('#year').append($('<option />').val(i).html(i));
    }
});

$(document).ready(function(){
    $('.custom-checkbox-input').on('change', function() {
        $('.custom-checkbox-input').not(this).prop('checked', false);  
    });
  });
  

var togglePassword = document.querySelector('#togglePassword');
var passwordField = document.querySelector('#senha');

// Para o campo de senha
document.querySelector('#togglePassword').addEventListener('click', function (e) {
    const password = document.querySelector('#senha');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye-slash');
});

// Para o campo de confirmação de senha
document.querySelector('#toggleConfirmPassword').addEventListener('click', function (e) {
    const confirmPassword = document.querySelector('#confirm_senha');
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.querySelector('i').classList.toggle('fa-eye-slash');
});












