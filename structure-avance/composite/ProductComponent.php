<?php

/*
 * PATTERN : Composite (interface)
 * ---------------------------------
 * Définit le contrat commun pour les feuilles (ProductLeaf)
 * et les composites (ProductComposite), permettant de les
 * traiter de manière uniforme.
 */
interface ProductComponent
{
    public function getInfo(): string;
}
