<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->hasRole('faculty')) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'material_index' => 'required|string|max:255',
            'material_type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'course_id' => 'required|integer|max:255',
            'lecture_link' => 'nullable|url',
            'assignment_link' => 'nullable|url',
        ];

        if ($this->input('material_type') == 'Lecture') {
            $rules['lecture_link'] = 'required|url';
        } elseif ($this->input('material_type') == 'Assignment') {
            $rules['assignment_link'] = 'required|url';
        }

        return [
            $rules
        ];
    }
}
