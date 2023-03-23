<?php
class Continent{
    /**
     * numero du continent
     *
     * @var int
     */
    private $num;

    /**
     * libelle du continent
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
     * Returne l'ensemble des continents
     *
     * @return Continent[] tableau d'objet continent
     */
    public static function findAll() :array //pour dir que la fonction renvoie un tableau
    {  
        $req=MonPdo::getInstance()->prepare('Select * from continent');
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute(); 
        $lesResultats=$req->fethAll();
        return $lesResultats;
    } 


    /**
     * trouve un continent par sont num
     *
     * @param integer $id numéro du continent
     * @return Continent objet continent trouvé
     */
    public static function findById (int $id) :Continent
    {
        $req=MonPdo::getInstance()->prepare('Select * from continent where num= :id');
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->binParam(':id', $id);
        $req->execute(); 
        $leResultat=$req->feth();
        return $leResultat;
    }

    /**
     * permet d'ajouter un continant
     *
     * @param Continent $continant continent à ajouter
     * @return integer resultat (1si l'operation a reussi, 0 sinon)
     */
    public static function add(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare('insert into continent (libelle) values(:libelle)');
        $libelle=$continent->getLibelle();
        $req->binParam(':libelle', $continent->getLibelle());
        $nb=$req->execute(); 
        return $nb;
    }
    
    /**
     * permet de mofifier un continent
     *
     * @param Continent $continent continent à modifier
     * @return integer resultat (1si l'operation a reussi, 0 sinon)
     */
    public static function update(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare('update continent set libelle= : libelle where num= :id');
        $num=$continent->getNUm();
        $libelle=$continent->getLibelle();
        $req->binParam(':id', $continent->getNum());
        $req->binParam(':libelle', $continent->getLibelle());
        $nb=$req->execute(); 
        return $nb;
    }

    /**
     * supprimer un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare('delete from continent where num= :id');
        $req->binParam(':id', $continent->getNum());
        $nb=$req->execute(); 
        return $nb;
    }

    /**
     * Set numero du continent
     *
     * @param  int  $num  numero du continent
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }
}

?>
