<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Models\Image;

class ParameterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => ['sometimes', 'nullable', 'image'],
            'icon_title' => ['sometimes', 'nullable', 'alpha_dash'],
            'icon_extension' => ['sometimes', 'nullable', 'string'],
            'icon_path' => ['sometimes', 'nullable', 'unique:images,path'],
            'delete_icon' => ['required', 'boolean'],
            'icon_gray' => ['sometimes', 'nullable', 'image'],
            'icon_gray_title' => ['sometimes', 'nullable', 'alpha_dash'],
            'icon_gray_extension' => ['sometimes', 'nullable', 'string'],
            'icon_gray_path' => ['sometimes', 'nullable', 'unique:images,path'],
            'delete_icon_gray' => ['required', 'boolean'],
        ];
    }

    public function prepareForValidation(): void
    {
        /** При передаче изображения здесь обрабатывается его название
         *  для корректного заполнения полей таблицы в БД
         *  @var mixed $icon
         */
        $icon = $this->icon ?? null;
        if ($icon instanceof UploadedFile) {
            $fields = $this->prepareImage($icon->getClientOriginalName());

            $this->merge([
                'icon_title' => $fields['title'],
                'icon_extension' => $fields['extension'],
                'icon_path' => $fields['path'],
            ]);
        }

        /** @var mixed $iconGray */
        $iconGray = $this->icon_gray ?? null;
        if ($iconGray instanceof UploadedFile) {
            $iconPath = null;
            if (isset($fields['icon_path'])) {
                $iconPath = $fields['icon_path'];
            } 

            $fields = $this->prepareImage($this->icon_gray->getClientOriginalName(), $iconPath);

            $this->merge([
                'icon_gray_title' => $fields['title'],
                'icon_gray_extension' => $fields['extension'],
                'icon_gray_path' => $fields['path'],
            ]);
        }
    }

    private function prepareImage(string $originalName, ?string $secondImagePath = null): array
    {
        $pos = strrpos($originalName, '.');
        $title = substr($originalName, 0, $pos);
        $extension = substr($originalName, $pos + 1);
        $slug = Str::slug($title);
        $uniqueSlug = $slug;

        while($this->slugValidation($path = $uniqueSlug . '.' . $extension) || $path === $secondImagePath) {
            $uniqueSlug = $slug . '_' . rand(0, 1000);
        }

        return [
            'title' => $slug,
            'extension' => $extension,
            'path' => $path,
        ];
    }

    private function slugValidation(string $slug): bool
    {
        return Image::where('path', $slug)->exists();
    }
}
