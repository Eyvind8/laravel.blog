<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\FormRequest;

class AdminRootController
{
    protected function getSessionPaginatorData(FormRequest $request): array
    {
        $currentUrl = str_replace('/', '-', request()->path());
        $sessionKey = 'requestData_' . $currentUrl;
        $requestData = session()->get($sessionKey, []);

        $limit = $request->input('limit', $requestData['limit'] ?? 10);
        $sortField = $request->input('sort', $requestData['sortField'] ?? 'created');
        $sortDirection = $request->input('sort_dir', $requestData['sortDirection'] ?? 'desc');

        session()->put($sessionKey, [
            'limit' => $limit,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection,
        ]);

        $requestData = $request->all();
        $requestData['limit'] = $limit;
        $requestData['sortField'] = $sortField;
        $requestData['sortDirection'] = $sortDirection;

        return $requestData;
    }
}
