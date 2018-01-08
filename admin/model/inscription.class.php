<?php

class Inscription
{
	protected $numero;
	protected $statut;
	protected $date_inscription;



	function ajouterInscription($_statut, $_date_inscription)
	{

	}

	function modifierInscription($_statut, $_date_inscription)
	{

	}

	function supprimerInscription($_numero)
	{

	}


//  ********** DEBUT DES GETTERS ************
    public function getNumero()
    {
        return $this->numero;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getDateInscription()
    {
        return $this->date_inscription;
    }

//  ********** FIN DES GETTERS ************



}


?>