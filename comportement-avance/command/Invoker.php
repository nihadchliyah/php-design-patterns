<?php
require_once 'Commande.php';

class Invoker
{
    private array $historique = [];

    public function executerCommande(Commande $cmd): void
    {
        $cmd->executer();
        $this->historique[] = $cmd;
    }

    public function nbCommandes(): int
    {
        return count($this->historique);
    }
}
