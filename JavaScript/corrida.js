//Definição da classe corrida
class Corrida{

    constructor(){
        //In case the user insert a float with ',' instead of '.'
        var str = document.getElementById("vl-corrida").value + "";
        var res = str.replace(',','.')
        
        this.vl_corrida = res;
        this.nome_motorista = document.getElementById("options").value; 

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
    
    if(corrida.getNomeMotorista().localeCompare("Escolha um motorista") != 0 && corrida.getVlCorrida() != ""){
        //Passing variable via URL to insert in the DB
        window.location.href = 'http://localhost/Projeto/Paginas/PHP/corrida.php?vl_corrida='+corrida.getVlCorrida()+"&nome-motorista="+corrida.getNomeMotorista();
    }else{
        alert("Escolha/Escreva nos campos não selecionados ou vazios");
    }
    
    return false;
    
}
