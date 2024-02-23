<?php

    class Curso
    {
        private $nome;
        private $nivel;
        private $duracao;
        private $valorTotal;
        private $descricao;

        public function __construct(){}

        public function create($_nome, $_nivel, $_duracao, $_valorTotal, $_descricao) {
            $this->nome = $_nome;
            $this->nivel = $_nivel;
            $this->duracao = $_duracao;
            $this->valorTotal = $_valorTotal;
            $this->descricao = ($_descricao);
        }
    
        public function getNome() {
            return $this->nome;
        }

        public function getNivel() {
            return $this->nivel;
        }
        
        public function getDuracao() {
            return $this->duracao;
        }

        public function getvalorTotal() {
            return $this->valorTotal;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setNome($_nome) {
            $this->nome = $_nome;
        }

        public function setNivel($_nivel) {
            $this->nivel = $_nivel;
        }

        public function setDuracao($_duracao) {
            $this->duracao = $_duracao;
        }

        public function setvalorTotal($_valorTotal) {
            $this->valorTotal = $_valorTotal;
        }

        public function setDescricao($_descricao) {
            $this->descricao = $_descricao;
        }

        public function inserirCurso() {

            include_once('./db/conn.php');
            $sql = "CALL piCurso(:nome, :nivel, :duracao, :valorTotal, :descricao)";

            $data = [
                'nome' => $this->nome,
                'nivel' => $this->nivel,
                'duracao' => $this->duracao,
                'valorTotal' => $this->valorTotal,
                'descricao' => $this->descricao
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

        public function listarCurso() {
            include_once('./db/conn.php');
            $sql = "CALL psListarCurso   ('')";

            $data = $conn->query($sql)->fetchAll();

            return $data;
        }

        public function excluirCurso($_id) {
            include_once("./db/conn.php");
            $sql = "CALL pdCurso(:id)";

            $data = [
                'id' => $_id
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

        
        
        public function buscarCurso($_id)
        {
            include("./db/conn.php");

            $sql = "CALL psCurso('$_id')";
            $data = $conn->query($sql)->fetchAll();

            foreach ($data as $item) {
                $this->nome = $item["nome"];
                $this->nivel = $item["nivel"];
                $this->duracao = $item["duracao"];
                $this->valorTotal = $item["valorTotal"];
                $this->descricao = $item["descricao"];
            }

            return true;

        }

        public function atualizarCurso($_id)
        {
            include("./db/conn.php");
            $sql = "CALL puCurso(:id, :nome, :nivel, :duracao, :valorTotal, :descricao)";

            $data = [
                'id' => $_id,
                'nome' => $this->nome,
                'nivel' => $this->nivel,
                'duracao' => $this->duracao,
                'valorTotal' => $this->valorTotal,
                'descricao' => $this->descricao
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }
    }
?> 
