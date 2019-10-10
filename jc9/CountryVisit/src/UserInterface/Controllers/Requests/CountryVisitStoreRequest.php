<?php

declare(strict_types=1);

namespace Jc9\CountryVisit\UserInterface\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CountryVisitStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country_code' => 'required|string',
        ];
    }

    public function getCountryCode(): string
    {
        return $this->input('country_code');
    }
}
