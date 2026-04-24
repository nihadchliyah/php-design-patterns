<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';
require_once 'Sujet.php';

class ProduitSujet implements Sujet
{
    private array    $observateurs = [];
    private ?Produit $produit      = null;

    // ── Gestion des abonnés ─────────────────────────────────────────────────

    public function abonner(Observateur $obs): void
    {
        $this->observateurs[] = $obs;
    }

    public function desabonner(Observateur $obs): void
    {
        $this->observateurs = array_filter(
            $this->observateurs,
            fn(Observateur $o) => $o !== $obs
        );
    }

    public function notifier(string $evenement): void
    {
        foreach ($this->observateurs as $obs) {
            $obs->actualiser($this->produit, $evenement);
        }
    }

    // ── Actions métier (déclenchent les notifications) ──────────────────────

    public function ajouterProduit(Produit $produit): void
    {
        $this->produit = $produit;
        $this->notifier('AJOUT');
    }

    public function modifierPrix(float $nouveauPrix): void
    {
        $this->produit->prix = $nouveauPrix;
        $this->notifier('MODIFICATION_PRIX');
    }

    public function modifierStock(int $nouvelleQuantite): void
    {
        $this->produit->stock = $nouvelleQuantite;
        $evenement = $nouvelleQuantite === 0 ? 'RUPTURE_STOCK' : 'MODIFICATION_STOCK';
        $this->notifier($evenement);
    }

    public function supprimerProduit(): void
    {
        $this->notifier('SUPPRESSION');
        $this->produit = null;
    }
}