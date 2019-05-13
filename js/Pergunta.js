function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length);
    var param_value = false;
    var params = loc.split("&");
    for (i = 0; i < params.length; i++) {
        param_name = params[i].substring(0, params[i].indexOf('='));
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=') + 1)
        }
    }
    if (param_value) {
        return param_value;
    }
    else {
        return undefined;
    }
}

function getRA() {
    var ra = queryString("ra");
    var div = document.getElementById("ra").innerHTML;
    div = div + "<h6>RA: " + ra + "</h6>";
    document.getElementById("ra").innerHTML = div;
}

function getResposta() {
    var radios = document.getElementsByName("alternativa");
    var alternativa = ""
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            alternativa = radios[i].value;
        }
    }
    alert(alternativa);
}
function getQuestaoNumber(){
    var questao = document.getElementById("nQuestao").innerHTML;
    var numero = 4;
    questao += "<h2>Questao "+ numero +"</h2>";
    document.getElementById("nQuestao").innerHTML = questao;
}
function getQuestao(){
    var divQuestao = document.getElementById("questao").innerHTML;
    var questao = "O que eh o BootStrap?";
    divQuestao += "<h4>" + questao + "</h4>";
    document.getElementById("questao").innerHTML = divQuestao;
}