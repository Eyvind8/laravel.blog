<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

/**
 * Class FormRequest
 * @package App\Http\Requests
 */
class FormRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (method_exists($this, 'dataPrepare')) {
            $this->dataPrepare();
        }

        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * @param string $className
     * @param mixed $default
     * @return mixed
     */
    public function getBinding(string $className, $default = null)
    {
        foreach ($this->route()->parameters() as $value) {
            if ($value instanceof $className) {
                return $value;
            }
        }

        return $default;
    }
}
