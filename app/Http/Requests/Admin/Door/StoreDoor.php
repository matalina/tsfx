<?php

namespace App\Http\Requests\Admin\Door;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDoor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin.door.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'direction' => ['required', 'string'],
            'is_locked' => ['required', 'boolean'],
            'key' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            'room_a' => ['required', 'string'],
            'room_b' => ['required', 'string'],
            
        ];
    }
}
