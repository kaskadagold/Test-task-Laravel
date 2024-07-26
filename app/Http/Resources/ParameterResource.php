<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParameterResource extends JsonResource
{
    // Подготовка данных для отображения по API
    public function toArray(Request $request): array
    {
        $fields = [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'images' => [
                'icon' => null,
                'icon gray' => null,
            ],
        ];

        if (!is_null($this->image)) {
            $fields['images']['icon'] = [
                'image_title' => $this->image->title,
                'image_extension' => $this->image->extension,
                'image_path' => $this->image->path,
            ];
        }

        if (!is_null($this->imageGray)) {
            $fields['images']['icon gray'] = [
                'image_title' => $this->imageGray->title,
                'image_extension' => $this->imageGray->extension,
                'image_path' => $this->imageGray->path,
            ];
        }

        return $fields;
    }
}
