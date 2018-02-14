//Defining Passageiro class
class Passageiro{

    constructor(){
        this.nome = document.getElementById("nome").value; 
        this.dt_nascimento = document.getElementById("dt_nascimento").value; 
        this.cpf = document.getElementById("cpf").value; 
        this.nome_motorista = document.getElementById("options").value; 
        this.sexo = document.getElementById("sexo").value;
        
    }  
    
    getNome(){
        return this.nome;
    }
    
    setNome(nome){
        this.nome = nome;
    }
    
    getDataNasc(){
        return this.dt_nascimento;
    }
    
    setDataNasc(dt_nascimento){
        this.dt_nascimento = dt_nascimento;
    }
    
    getCPF(){
        return this.cpf;
    }
    
    setCPF(cpf){
        this.cpf = cpf;
    }
    
    getNomeMotorista(){
        return this.nome_motorista;
    }
    
    setNomeMotorista(nome_motorista){
        this.nome_motorista = nome_motorista;
    }
    
    getSexo(){
        return this.sexo;
    }
    
    setSexo(sexo){
        this.sexo = sexo;
    }
    
    
}

function init(){
    var passageiro = new Passageiro();  

    if(passageiro.getNomeMotorista().localeCompare("Escolha um motorista") != 0 && passageiro.getSexo().localeCompare("Escolha um genero") != 0 && passageiro.getDataNasc() != "" && passageiro.getNome() != "" && passageiro.getCPF() != ""){
        //Passing variable via URL to insert in the DB
        window.location.href = 'http://localhost/Projeto/Paginas/PHP/passageiro.php?nome='+passageiro.getNome()+"&dt_nascimento="+passageiro.getDataNasc()+"&cpf="+passageiro.getCPF()+"&nome-motorista="+passageiro.getNomeMotorista()+"&sexo="+passageiro.getSexo();
    }else{
        alert("Escolha/Escreva nos campos não selecionados ou vazios");
    }
    return false;
}
