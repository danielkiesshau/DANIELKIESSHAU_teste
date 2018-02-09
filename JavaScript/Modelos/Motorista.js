class Motorista{
    constructor(nome, dt_nascimento, cpf, modelo_car, status, sexo){
        this.nome = nome;
        this.dt_nascimento = dt_nascimento;
        this.cpf = cpf;
        this.modelo_car = modelo_car;
        this.status = status;
        this.sexo = sexo;
    }
    
    public function getNome(){
        return this.nome;
    }
    
    public function setNome(nome){
        this.nome = nome;
    }
    
    public function getDataNasc(){
        return this.dt_nascimento;
    }
    
    public function setDataNasc(dt_nascimento){
        this.dt_nascimento = dt_nascimento;
    }
    
    public function getCPF(){
        return this.cpf;
    }
    
    public function setCPF(cpf){
        this.cpf = cpf;
    }
    
    public function getModeloCar(){
        return this.modelo_car;
    }
    
    public function setModeloCar(modelo_car){
        this.modelo_car = modelo_car;
    }
    
    public function getStatus(){
        return this.status;
    }
    
    public function setStatus(status){
            this.status = status;
    }
    
    public function getSexo(){
        return this.sexo;
    }
    
    public function setSexo(sexo){
        this.sexo = sexo;
    }
    
    
    
    
}