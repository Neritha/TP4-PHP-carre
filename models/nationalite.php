<?php
class Nationalite{
    /**
     * numero de la nationalite
     *
     * @var int
     */
    private $num;

    /**
     * libelle de la nationalite
     *
     * @var string
     */
    private $libelle;

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * lit le libellé
     *
     * @return string
     */
        public function getLibelle() : string
        {
            return $this->libelle;
        }

    /**
     * ecrit dans le liebellé
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }


    /**
     * num continent (clef etrangère) relier à num de cintinent
     *
     * @var int
     */

    private $numContinent;

    /**
     * renvoie l'objet continent associé
     *
     * @return Continent
     */
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrit le num continent 
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }



    /**
     * Returne l'ensemble des nationalites
     *
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll() :array //pour dire que la fonction renvoie un tableau
    {  
        $req=MonPdo::getInstance()->prepare("Select n.num as nupero, n.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute(); 
        $lesResultats=$req->fethAll();
        return $lesResultats;
    } 


    /**
     * trouve une nationalite par sont num
     *
     * @param integer $id numéro de la nationalite
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById (int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare('Select * from nationalite where num= :id');
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->binParam(':id', $id);
        $req->execute(); 
        $leResultat=$req->feth();
        return $leResultat;
    }

    /**
     * permet d'ajouter un continant
     *
     * @param Nationalite $continant nationalite à ajouter
     * @return integer resultat (1 si l'operation a reussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare('insert into nationalite (libelle,numContinent) values(:libelle,numContinent)');
        $req->binParam(':libelle', $nationalite->getLibelle());
        $req->binParam(':numContinent', $nationalite->numContinent());
        $nb=$req->execute(); 
        return $nb;
    }
    
    /**
     * permet de mofifier une Nationalite
     *
     * @param Nationalite $nationalite à modifier
     * @return integer resultat (1si l'operation a reussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare('update nationalite set libelle= : libelle, numContinent= :numContinent where num= :id');
        $req->binParam(':id', $nationalite->getNum());
        $req->binParam(':libelle', $nationalite->getLibelle());
        $req->binParam(':numContinent', $nationalite->numContinent());
        $nb=$req->execute(); 
        return $nb;
    }
 
    /**
     * supprimer une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare('delete from nationalite where num= :id');
        $req->binParam(':id', $nationalite->getNum());
        $nb=$req->execute(); 
        return $nb;
    }

    
}



// video 4
// 14:35


?>




