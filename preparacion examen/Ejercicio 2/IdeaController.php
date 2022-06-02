<?php


class IdeaController{
    private $ideaService;

    public function __construct(){
        $this->ideaService=new IdeaService();
    }
    public function addIdea(String $punto){
        $puntos=array($punto);
        $idea=new Idea($puntos);
        $idea2=$this->ideaService->insert($idea);
        $json=$idea2->toJson();
        echo $json;
        return $json;
    }


}


?>