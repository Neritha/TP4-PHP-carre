
<?php
class Nationalite {

        /**
         * Numero du Nationalite
         *
         * @var int
         */
    private $num;

        /**
         * Libelle du Nationalite
         *
         * @var string
         */
    private $libelle;
    
    /**
     * Get numero du Nationalite
     *
     * @return  int
     */ 
    public function getNum2()
    {
        return $this->num;
    }

    /**
     * Get libelle du Nationalite
     *
     * @return  string
     */ 
    public function getLibelle2() : string
    {
        return $this->libelle;
    }

    /**
     * Set libelle du Nationalite
     *
     * @param  string  $libelle  Libelle du Nationalite
     *
     * @return  self
     */ 
    public function setLibelle2(string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Set numero du Nationalite
     *
     * @param  int  $num  Numero du Nationalite
     *
     * @return  self
     */ 
    public function setNum2(int $num) :self
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Retourne l'ensemble des Nationalites
     *
     * @return Nationalite[] tableau d'objet Nationalite
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve une Nationalite par son num
     *
     * @param integer $id numéro du Nationalite
     * @return Nationalite objet Nationalite trouvé
     */
    public static function findById(int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultats=$req->fetch();
        return $leResultats;
    }

    /**
     * Permet d'ajouter une Nationalite
     *
     * @param Nationalite $Nationalite Nationalite à ajouter
     * @return integer resultat (1 si l'opération a réussi, 0 sinon)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle) values(:libelle)");
        $libelle=$nationalite->getLibelle2();
        $req->bindParam(':libelle', $libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier une Nationalite
     *
     * @param Nationalite $Nationalite Nationalite à modifier
     * @return integer (1 si l'opération a réussi, 0 sinon)
     */
    public static function update(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle where num= :id");
        $num=$nationalite->getNum2();
        $libelle=$nationalite->getLibelle2();
        $req->bindParam(':id', $num);
        $req->bindParam(':libelle', $libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer une Nationalite
     *
     * @param Nationalite $Nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $num=$nationalite->getNum2();
        $req->bindParam(':id', $num);
        $nb=$req->execute();
        return $nb;
    }
}
?>
