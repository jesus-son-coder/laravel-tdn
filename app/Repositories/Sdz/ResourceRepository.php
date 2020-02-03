<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 27/01/2020
 * Time: 13:33
 **/

namespace App\Repositories\Sdz;


abstract class ResourceRepository
{
    protected $model;

    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    public function store(Array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}