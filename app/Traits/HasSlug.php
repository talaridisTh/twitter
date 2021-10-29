<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Create new slug if exist
 *
 */
trait HasSlug {

    /**
     * Get slug
     * @param $title
     * @param int $id
     * @return string
     */
    public function createSlug($title, $id = 0): string
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (!$this->slugExists($slug, $allSlugs)) {
            return $slug;
        }

        return $this->createNewSlug($slug, $allSlugs);
    }

    /**
     * Check if slug exist
     * @param $slug
     * @param $allSlugs
     * @return bool
     */
    protected function slugExists($slug, $allSlugs): bool
    {
        if ($allSlugs->contains('slug', $slug)) {
            return true;
        }

        return false;
    }

    /**
     * Create new slug if exist
     * @param $slug
     * @param $allSlugs
     * @return string
     */
    protected function createNewSlug($slug, $allSlugs): string
    {
        $counter = 2;
        while (true) {
            $newSlug = $slug . '-' . $counter;
            if (!$this->slugExists($newSlug, $allSlugs)) {
                return $newSlug;
            }
            $counter ++;
        }
    }

    /**
     * Check for slug database
     * @param $slug
     * @param int $id
     * @return mixed
     */
    protected function getRelatedSlugs($slug, $id = 0): mixed
    {
        return $this::select('slug')
            ->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

}
