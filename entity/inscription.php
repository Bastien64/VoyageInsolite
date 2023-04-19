<?php 
class inscription {
    private $id ;
    private $nom ; 
    private $prenom ; 
    private $adresseemail ;
    private $numerodetelephone ;

    public function __construct(array $data) {
        $this->hydrate($data);
    }
        
        public function hydrate (array $data) : void {
           foreach ($data as $key => $value) {
              $method = "set" . ucfirst($key); 
              if (method_exists ($this, $method)) {
                 $this->$method ($value);
              }
           }
          }



          

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresseemail
     */ 
    public function getAdresseemail()
    {
        return $this->adresseemail;
    }

    /**
     * Set the value of adresseemail
     *
     * @return  self
     */ 
    public function setAdresseemail($adresseemail)
    {
        $this->adresseemail = $adresseemail;

        return $this;
    }

    /**
     * Get the value of numerodetelephone
     */ 
    public function getNumerodetelephone()
    {
        return $this->numerodetelephone;
    }

    /**
     * Set the value of numerodetelephone
     *
     * @return  self
     */ 
    public function setNumerodetelephone($numerodetelephone)
    {
        $this->numerodetelephone = $numerodetelephone;

        return $this;
    }
}