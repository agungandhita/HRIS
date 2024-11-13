<?php 

namespace App\Repositories\Manajer;

interface ManajerInterface
{
    public function store(array $data);
    public function update(int $id, array $data);
}
