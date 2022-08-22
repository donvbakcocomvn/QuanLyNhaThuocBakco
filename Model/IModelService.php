<?php

namespace Model;

interface IModelService {

    public function Post($model);

    public function Put($model);

    public function Delete($Id);

    public function GetById($Id); 

    public function GetItems($where, $indexPage, $pageNumber, &$total);
}
