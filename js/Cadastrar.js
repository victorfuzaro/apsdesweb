function queryString(parameter) {  
    var loc = location.search.substring(1, location.search.length);   
    var param_value = false;   
    var params = loc.split("&");   
    for (i=0; i<params.length;i++) {   
        param_name = params[i].substring(0,params[i].indexOf('='));   
        if (param_name == parameter) {                                          
            param_value = params[i].substring(params[i].indexOf('=')+1)   
        }   
    }   
    if (param_value) {   
        return param_value;   
    }   
    else {   
        return undefined;   
    }   
}

function getRA(){
    var variavel = queryString("ra");
    var div = document.getElementById("content").innerHTML;
    div = div + "<h6 style=\"display: inline-block\">" + variavel + "</h6>";
    document.getElementById("content").innerHTML = div;
}

function cadastrar(){
    var ra =  queryString("ra");
    var tipo =  "ALUNO";
    var tes = document.getElementsByName("tipo");
    if(tes[0].checked){
        tipo = "PROF";
        window.location.href="Questoes.html?ra=" + ra;
    }else{
        window.location.href="Pergunta.html?ra=" + ra;
    }
    //alert("Cadastrado, RA: " + ra + " como: " + tipo);
    
}