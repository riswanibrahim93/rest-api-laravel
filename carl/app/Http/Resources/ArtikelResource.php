<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'published' => $this->created_at->diffForHumans(),
            'subjek' => $this->subjek->nama,
            'author' => $this->user->name,
        ];
    }

    public function with($request){
        return ['status' => 'success'];
    }
}
