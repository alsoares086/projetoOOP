
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
