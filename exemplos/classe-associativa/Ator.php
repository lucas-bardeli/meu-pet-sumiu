<?php

class Ator {
  public function __construct(
    private string $nome = ""
  ) {}

  public function getNome(): string {
    return $this->nome;
  }
}

?>