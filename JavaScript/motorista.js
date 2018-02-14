//Definição da classe motorista
class Motorista{

    constructor(){
        this.nome = document.getElementById("nome").value; 
        this.dt_nascimento = document.getElementById("dt_nascimento").value; 
        this.cpf = document.getElementById("cpf").value; 
        this.modelo_car = document.getElementById("modelo_car").value; 
        this.status = document.getElementById("status").value;
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
    
    getModeloCar(){
        return this.modelo_car;
    }
    
    setModeloCar(modelo_car){
        this.modelo_car = modelo_car;
    }
    
    getStatus(){
        return this.status;
    }
    
    setStatus(status){
            this.status = status;
    }
    
    getSexo(){
        return this.sexo;
    }
    
    setSexo(sexo){
        this.sexo = sexo;
    }
    
    
}

function init(){
    var motorista = new Motorista();
    if(motorista.getModeloCar() != "" && motorista.getSexo().localeCompare("Escolha um genero") != 0 && motorista.getDataNasc() != "" && motorista.getNome() != "" && motorista.getCPF() != ""){
        //Passagem de variáveis para .php enviar ao banco
        window.location.href= 'http://localhost/Projeto/Paginas/PHP/motorista.php?nome='+motorista.getNome()
        +"&dt_nascimento="+motorista.getDataNasc()+"&cpf="+motorista.getCPF()+"&modelo_car="+motorista.getModeloCar()+"&status="+motorista.getStatus()+"&sexo="+motorista.getSexo();
    }
    return false;
}






