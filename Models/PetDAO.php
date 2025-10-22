<?php

class PetDAO extends Conexao {
  public function __construct() {
    parent:: __construct();
  }

  public function inserir($pet) {
    $sql = "INSERT INTO pets (nome,idade,porte,raca,local,data,imagem,cor,cor_olhos,observacoes,situacao,usuario_id)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

    try {
      $stm = $this->db->prepare($sql);
      $stm->bindValue(1,$pet->getNome());
      $stm->bindValue(2,$pet->getIdade());
      $stm->bindValue(3,$pet->getPorte());
      $stm->bindValue(4,$pet->getRaca());
      $stm->bindValue(5,$pet->getLocal());
      $stm->bindValue(6,$pet->getData());
      $stm->bindValue(7,$pet->getImagem());
      $stm->bindValue(8,$pet->getCor());
      $stm->bindValue(9,$pet->getCor_olhos());
      $stm->bindValue(10,$pet->getObservacoes());
      $stm->bindValue(11,$pet->getSituacao());
      $stm->bindValue(12,$pet->getUsuario()->getId_usuario());

      $stm->execute();
      $this->db = null;
      return "Pet inserido com sucesso!";
    }
    catch (PDOException $e) {
      $this->db = null;
      return "Erro ao inserir Pet";
    }
  }
}

?>