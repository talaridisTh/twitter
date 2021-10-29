<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);

        $allSlugs = $this->getRelatedSlugs($slug, $id);

        if (!$this->slugExists($slug, $allSlugs)) {
            return $slug;
        }

        return $this->createNewSlug($slug, $allSlugs);
    }

    protected function slugExists($slug, $allSlugs)
    {
        if ($allSlugs->contains('slug', $slug)) {
            return true;
        }

        return false;
    }

    protected function createNewSlug($slug, $allSlugs)
    {
        $counter = 2;

        while (true) {
            $newSlug = $slug . '-' . $counter;

            if (!$this->slugExists($newSlug, $allSlugs)) {
                return $newSlug;
            }

            $counter++;
        }



    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return $this::select('slug')
            ->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
