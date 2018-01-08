<?php

class Candidat
{
	

    protected $connect ;

    protected $numero;
	protected $civilite;
	protected $nom;
	protected $prenom;
	protected $adresse;
	protected $code_postal;
	protected $ville;
	protected $contact;
	protected $email;
	protected $question1;
	protected $question2;


    function __CONSTRUCT($pdo)
    {
       
        $this->connect = $pdo;
    }

	function afficherLesCandidats()
	{
		
        try 
        {

            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql1 = "select c.civilite, c.numero, c.nom, c.prenom, c.adresse, c.code_postale, c.ville, c.pays, c.email, c.q1_pourquoi_participer,   
                    c.q2_autre_salon, i.numero, i.numeroCandidat, i.statut, i.date_inscription
                    from candidat as c, inscription as i
                    where c.numero = i.numeroCandidat
                ";
            $stm1 = $this->connect->query($sql1);

            return $stm1;


        }
        catch(PDOException $e)
        {
             echo 'Erreur : '.$e->getMessage();
        }

        

	}

    function afficherCandidat($_numero )
    {
        try 
        {

            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql1 = "select * from candidat where numero = ? ";
            $stm1 = $this->connect->prepare($sql1);

            $result = $stm1->execute(array($_numero));

            return $stm1;


        }
        catch(PDOException $e)
        {
             echo 'Erreur : '.$e->getMessage();
        }

    }




	function ajouterCandidat($_civilite, $_nom, $_prenom, $_adresse, $_code_postal, $_ville, $_contact, $_email, $_question1, $_question2)
	{
       
        try {

            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            

            $sql = "insert into candidat  values (?,?,?,?,?,?,?,?,?,?,?) ";
            $stm = $this->connect->prepare($sql);
            $stm->execute( array(0, $_civilite, $_nom, $_prenom, $_adresse, $_code_postal, $_ville, $_contact, $_email, $_question1, $_question2) ) ;

            $lastId = $this->connect->lastInsertId(); 
            
            $stm->CloseCursor();

            // deuxieme requete 

            $sql2 = "insert into inscription values (?,?,?,?)";
            $stm2 = $this->connect->prepare($sql2);
            $stm2->execute( array(0, $lastId, 0, date('Y-m-d') ) ) ;


        }
        catch(PDOException $e) {
            echo 'Erreur : '.$e->getMessage();
        }  

	}

    

	function modifierCandidat($_numero, $_civilite, $_nom, $_prenom, $_adresse, $_code_postal, $_ville, $_pays, $_email, $_question1, $_question2)
	{
           try {

            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            

            $sql = "update candidat set civilite = ? ,nom = ?, prenom = ?, adresse = ?, code_postale = ?, ville = ?, pays = ?, email = ?, q1_pourquoi_participer = ?, q2_autre_salon = ? where numero = ?";
            $stm = $this->connect->prepare($sql);
            $stm->execute( array($_civilite, $_nom, $_prenom, $_adresse, $_code_postal, $_ville, $_pays, $_email, $_question1, $_question2, $_numero) ) ;

            
            $stm->CloseCursor();

            }
            catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage();
            }  
	}

	function supprimerCandidat($numero)
	{
        try {

            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            

            $sql = "delete from candidat where numero = ?";
            $stm = $this->connect->prepare($sql);
            $stm->execute( array($numero) ) ;
            $stm->CloseCursor();

            $sql2 = "delete from inscription where numeroCandidat = ?";
            $stm2 = $this->connect->prepare($sql2);
            $stm2->execute( array($numero) ) ;
            $stm2->CloseCursor();

            }
        catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage();
            }  
	}


    function modifierStatutCandidat($statut, $id)
    {
        try {

             $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            

            $sql2 = "update inscription set statut = ? where numero = ?";
            $stm2 = $this->connect->prepare($sql2);
            $stm2->execute( array($statut, $id)) ;

         

            $stm2->CloseCursor();

            }
            catch(PDOException $e) {
                echo 'Erreur : '.$e->getMessage();
            }  

    }

    function nombreCandidatParStatut($statut)
    {
         $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if($statut == 5)
            {
                $sql2 = "select count(statut) as nb from inscription";
                $nb = $this->connect->query($sql2);
                $nb = $nb->fetch();
            }
            else
            {
                $sql2 = "select count(statut) as nb from inscription where statut = ? ";
                $stm2 = $this->connect->prepare($sql2);
                $stm2->execute(array($statut)) ;
                $nb = $stm2->fetch();
                $stm2->CloseCursor();

            }

                 

            
            return $nb;
    }



}


?>