<?php

use PhpParser\Node\Expr\Cast\String_;

class IdeaController
{
    private $ideaService;

    public function __construct()
    {
        $this->ideaService = new IdeaService();
    }
    public function addIdea(String $punto): String
    {

        try {
            $puntos = array($punto);
            $idea = new Idea($puntos);
            $idea2 = $this->ideaService->insert($idea);
            $json = $idea2->toJson();
            return $json;
        } catch (Exception $e) {
            return "{}";
        }
    }

    public function delIdea(String $idIdea): String
    {
        if(!is_numeric($idIdea))
        return "{}";
        try {
            $idea = $this->ideaService->deleteIdea($idIdea);
            $json = $idea->toJson();
            return $json;
        } catch (Exception $e) {
            return "{}";
        }
    }

    public function addPunto(String $id, String $punto): String
    {
        if(!is_numeric($id))
        return "{}";
        try {
            $idea = $this->ideaService->addPunto($id, $punto);
            return $idea->toJson();
        } catch (Exception $e) {
            return "{}";
        }
    }

    public function listar(): String
    {

        try {
            $ideas = $this->ideaService->findAll();
            $ideasJson = [];
            foreach ($ideas as $key => $value) {
                array_push($ideasJson, json_encode($value->toJson()));
            }
            return implode($ideasJson);
        } catch (Exception $e) {
            return "{}";
        }
    }

    public function findById(String $id): String
    {
        if(!is_numeric($id))
        return "{}";
        try {
            return $this->ideaService->findById($id)->toJson();
        } catch (Exception $e) {
            return "{}";
        }
    }

    public function addVoto(String $id): String
    {
        if(!is_numeric($id))
        return "{}";
        try {
            return $this->ideaService->addVoto($id)->toJson();
        } catch (Exception $e) {
            return "{}";
        }
    }
}
