<?php

interface Sujet
{
    public function abonner(Observateur $obs): void;
    public function desabonner(Observateur $obs): void;
    public function notifier(string $evenement): void;
}
