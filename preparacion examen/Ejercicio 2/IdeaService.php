<?php



class IdeaService
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }
    public function insert(Idea $idea): Idea
    {
        $this->conexion->beginTransaction();
        try {
            $sth = $this->conexion->prepare("INSERT INTO idea (votos) VALUES(?)");
            $sth->execute(array($idea->getVotos()));
            $ultimoId = $this->conexion->lastInsertId();
            $sth = $this->conexion->prepare("INSERT INTO puntos (id_idea,punto) VALUES(?,?)");
            $sth->execute(array($ultimoId, $idea->getPuntos()[0]));
            $this->conexion->commit();
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            throw $e;
        }

        return $this->findById($ultimoId);
    }

    public function findById(int $id): Idea
    {
        $sth = $this->conexion->prepare("SELECT id, votos FROM idea WHERE id=:id");
        $sth->execute(array(":id" => $id));
        $idea = $sth->fetch();
        if (!$idea) {
            throw new PDOException("El id no esta presente en la BBDD");
        }
        $sth = $this->conexion->prepare("SELECT punto FROM puntos 
                                       WHERE id_idea=:id");
        $sth->execute(array(":id" => $id));
        $puntos = $sth->fetchAll();
        //id //puntos //votos
        return Idea::fullConstructor($idea[0], $puntos, $idea[1]);
    }

    public function deleteIdea(int $id): Idea
    {
        $this->conexion->beginTransaction();
        try {
            $idea = $this->findById($id);
            $sth = $this->conexion->prepare("DELETE FROM puntos WHERE id_idea=:id");
            $sth->execute(array(":id" => $id));

            $sth = $this->conexion->prepare("DELETE FROM idea WHERE id=:id");
            $sth->execute(array(":id" => $id));
            $this->conexion->commit();
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            throw $e;
        }
        return $idea;
    }

    public function addPunto(int $id, String $punto): Idea
    {
        try {
            $this->conexion->beginTransaction();
            $sth = $this->conexion->prepare("INSERT INTO puntos (id_idea,punto) VALUES(?,?)");
            $sth->execute(array($id, $punto));
            $this->conexion->commit();
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            throw $e;
        }

        return $this->findById($id);
    }

    public function findAll(): array
    {
        $sth = $this->conexion->prepare("SELECT id, votos FROM idea");
        $sth->execute();
        $ideas = $sth->fetchAll();
        if (count($ideas) == 0) {
            throw new PDOException("El id no esta presente en la BBDD");
        }

        $sth = $this->conexion->prepare("SELECT punto FROM puntos 
        WHERE id_idea=:id");
        foreach ($ideas as $key => $value) {
            $sth->execute(array(":id" => $value[0]));
            $puntos = $sth->fetchAll();
            $ideas[$key] = Idea::fullConstructor($value[0], $puntos, $value[1]);
        }


        //id //puntos //votos
        return $ideas;
    }

    public function addVoto(int $id): Idea
    {
        $this->conexion->beginTransaction();
        try {
            $idea = $this->findById($id);
            $sth = $this->conexion->prepare("UPDATE idea SET votos=? WHERE id=?");
            $sth->execute(array($idea->getVotos() + 1, $id));
            $this->conexion->commit();
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            throw $e;
        }

        return $this->findById($id);
    }
}
