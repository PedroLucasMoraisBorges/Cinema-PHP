<?php

class Filme{
  private $nome_filme = [];
  private $sala;
  private $faixa_etaria = [];

  //Adiciona a variável no array;
  public function adicionar_filme($nome,$faixa){
    $this->nome_filme[] = $nome;
    $this->faixa_etaria[] = $faixa;
  }

  //Retorn o array;
  public function ver_faixa(){
    return $this->faixa_etaria;
  }

  //Retorna o array;
  public function ver_filme(){
    return $this->nome_filme;
  }

  //Mostra os filmes disponíveis e suas classificações;
  public function mostrar_filmes($filmes,$faixas){
    for($n=0 ; $n<count($filmes) ; $n++){
      $num = $n;
      echo $num+1;
      echo ": ".$filmes[$n]." (+";
      echo $faixas[$n].")\n";
    }

    echo "\n";
  }
}




class Cliente extends Filme{
  private $nome;
  protected $ingresso;
  private $idade;

  public function __construct($nome,$ingresso,$idade){
    $this->nome = $nome;
    $this->ingresso = $ingresso;
    $this->idade = $idade;
  }


  
  //Função para ver a sala em que passará o filme;
  public function ver_sala($lista){
    for($n=1 ; $n<=count($lista); $n++){
      if ($this->ingresso == $n){
        $this->sala = $n;
        $teste = 0;
      }
    }
    if($teste!=0){
      echo "\n\nEscolha um filme em cartaz ou digite um número correto.";
    }
    return $this->sala;
  }
  

  
  //Função serve para comparar a idade do cliente com o filme escolhido de acordo com o ingresso e mostrar se ele pode ou não assistir ao filme específico;
  public function faixaEtaria($faixa){
    if($this->idade < $faixa[$this->ingresso-1]){
      echo "\nVocê não tem a idade necessária para assistir ao filme\n";
      return $permissao = false;
    }
    else{
      return $permissão = true;
    }
  }

  
  
  //Função para verificar o nome do filme, a sala em que passará o filme e verificar se o usuário tem a idade certa para assistir;
  public function clienteVerFilme($filme,$permi,$sala){
    if($permi == 0){
      echo "\n";
    }
    else{
      echo "\n\nAproveite a sessão:\n";
      echo "Filme: ".$filme[$this->ingresso-1];
      echo "\nSala: ".$sala;
    }
    
  }


  //Função para printar os dados do cliente;
  public function verCliente(){
    echo "\nCliente: ".$this->nome."\nIngresso: ".$this->ingresso."\nIdade: ".$this->idade;
  }
}



//Admin;

$n = (int)(readline("Olá ADM! Você deseja adicionar quantos filmes? "));
$filme = new Filme();

for($s=1 ; $s<=$n ; $s++){
  echo "\n".$s."\n";
  $filme->adicionar_filme(readline("Nome do filme: "),(int)(readline("Faixa etária: ")));
  echo"\n";
}

$filme->ver_faixa();
$filme->ver_filme();

//Admin;



//Programa;

echo "\n\nOlá, seja bem vindo ao cinema!";
echo "\n";
echo "Filmes em cartaz:\n";
$filme->mostrar_filmes($filme->ver_filme(),$filme->ver_faixa());
echo "\n";

//Programa;



//Usuário;

$cliente = new Cliente(strtoupper(readline("Qual o seu nome? ")),(int)(readline("Número do filme: ")),(int)(readline("Idade: ")));

$cliente->clienteVerFilme(
  $filme->ver_filme(), 
  $cliente->faixaEtaria($filme->ver_faixa()), 
  $cliente->ver_sala($filme->ver_filme()), 
  $cliente->verCliente()
);

/*
ver_filme() Retorna array filmes;
ver_faixa() retorna o array de faixa etária e faixaEtaria() irá comparar com a idade do usuário;
ver_filme() retorna o array de filmes e ver_sala() compara com o ingresso escolhido pelo usuário;
verCliente printa as informações do cliente;
*/

//Usuário;
