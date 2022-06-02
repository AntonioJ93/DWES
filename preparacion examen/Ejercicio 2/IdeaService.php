<?php



class IdeaService{
    private $conexion;

    public function __construct()
    {
        $this->conexion=new Conexion();
    }
    public function insert(Idea $idea): Idea{
        $this->conexion->beginTransaction();
        $sth=$this->conexion->prepare("INSERT INTO idea (votos) VALUES(?)");
        $sth->execute(array($idea->getVotos()));
        $ultimoId=$this->conexion->lastInsertId();
        $sth=$this->conexion->prepare("INSERT INTO puntos (id_idea,punto) VALUES(?,?)");
        $sth->execute(array($ultimoId,$idea->getPuntos()[0]));
        $this->conexion->commit();
        return $this->findById($ultimoId);
    }

    public function findById(int $id){
        $sth=$this->conexion->prepare("SELECT id, votos FROM idea WHERE id=:id");
        $sth->execute(array(":id"=>$id));
        $idea=$sth->fetch();

        $sth=$this->conexion->prepare("SELECT punto FROM idea JOIN puntos 
                                        ON idea.id=puntos.id_idea WHERE idea.id=:id");
        $sth->execute(array(":id"=>$id));
        $puntos=$sth->fetchAll();
                        //id //puntos //votos
        return Idea::fullConstructor($idea[0],$puntos,$idea[1]);
    }


}


?>