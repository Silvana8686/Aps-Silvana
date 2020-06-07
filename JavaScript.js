function validar_form_contato(){
    const formcontato = document.querySelector("form");
    var nome = formcontato.nome.value;
    var preco = formcontato.preco.value;
    var quantidade = formcontato.quantidade.value;
    var categoria = document.getElementById('cat').value;
    
    if(nome == ""){
        alert("Campo nome é obrigatorio");
        formcontato.nome.focus();
        return false;
    }if(preco == ""){
        alert("Campo Preco é obrigatorio");
        formcontato.preco.focus();
        return false;
    }if(preco <=0){
        alert("preco valor inválido ");
        formcontato.preco.focus();
        return false;
    }if(quantidade == ""|| quantidade<=0){
        alert("Campo Quantidade é obrigatorio");
        formcontato.quantidade.focus();
        return false;
        
    }if(categoria == "" || categoria == "Selecione..."){
        alert("Campo categoria é obrigatorio");
        
        return false;

    }

}