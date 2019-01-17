<?php

//Pegará a variável temp vinda da requisição POST
$temp = filter_input(INPUT_POST, 'temp', FILTER_SANITIZE_STRING);
if (is_null($temp)) {
  //Erro caso a variável venha vazia
  die("Dados inválidos");
} 
//Conexão com o Banco de Dados
$servername = "mysql.hostinger.com.br";
$username = "u963241935_jip";
$password = "ufc123";
$dbname = "u963241935_temp";
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) {
  //Verifica se na conexão ocorreu erro
  die("Não foi possível estabelecer conexão com o BD: " . $conn->connect_error);
} 
//Query SQL para enviar os dados de tempo e temperatura na requisição POST
$sql = "INSERT INTO Temperatura (wea_temp,wea_date) VALUES ($temp, CONVERT_TZ(NOW(), '+00:00', '-03:00'))";

//Tenta executar a Query, caso ocorra erro lança uma exceção
if (!$conn->query($sql)) {
  die("Erro na gravação dos dados no BD");
}

//Fecha a conexão com o banco de dados
$conn->close();
?>