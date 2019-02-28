<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
            'movie_id' => $this->movie_id,
            'movie_name' => $this->movie_name,
            'movie_genere' => $this->movie_genere,
            'movie_description' => $this->movie_description,
            'movie_price' => $this->movie_price,
            'movie_language' => $this->movie_language,
            'movie_dir' => $this->movie_dir,
            'movie_cast' => $this->movie_cast,
            'img1' => $this->img1,
            'img2' => $this->img2,
            'img3' => $this->img3
        ];
    }


}
