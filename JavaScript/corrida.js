//Definição da classe corrida
class Corrida{

    constructor(){
        this.vl_corrida = document.getElementById("vl-corrida").value;
        this.nome_motorista = document.getElementById("nome-motorista").value; 

    }
    
    getNomeMotorista(){
        return this.nome_motorista;
    }
    
    setNomeMotorista(nome_motorista){
        this.nome_motorista = nome_motorista;
    }
    
    getVlCorrida(){
        return this.vl_corrida;
    }
    
    setVlCorrida(vl_corrida){
        this.vl_corrida = vl_corrida;
    }
}

function init(){
    var corrida = new Corrida();
    //Passagem de variáveis para .php enviar ao banco
    window.location.href = 'http://localhost/Projeto/Paginas/PHP/corrida.php?vl_corrida='+corrida.getVlCorrida()+"&nome-motorista="+corrida.getNomeMotorista();
    return false;
}
