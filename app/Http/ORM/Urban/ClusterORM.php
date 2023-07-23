<?php

namespace App\Http\ORM\Urban;

use App\Http\ORM\iORM;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\Collection;

class ClusterORM implements iORM
{

    public function all(): Collection
    {
        return Cluster::query()->where('active', 1)->get();
    }

    public function find(int $id): Cluster
    {
        return Cluster::find($id);
    }

    public function findActive(int $id)
    {
        return Cluster::query()->where('id', $id)->where('active', 1)->first();
    }

    /**
     * @param Cluster $template
     * @return void
     */
    public function save(mixed $template): Cluster
    {
        $cluster = new Cluster();
        $cluster->id = $template->id ?? $cluster->id ?? null;
        $cluster->name = $template->name ?? $cluster->name ?? null;
        $cluster->description = $template->description ?? $cluster->description ?? null;
        $cluster->active = $template->active ?? $cluster->active ?? null;

        $cluster->save();
        return $cluster;


    }


    public function delete(int $id): void
    {
        $cluster = $this->find($id);
        $cluster->delete();
    }

    public function deactivate(int $id): Cluster
    {
        $cluster = $this->find($id);
        $cluster->active = 1;

        return $this->save($cluster);
    }

    public function activate(int $id): Cluster
    {
        $cluster = $this->find($id);
        $cluster->active = 0;

        return $this->save($cluster);
    }
}
