<?php

namespace App\Http\Controllers\Admin\Api\Imager;

use App\Http\Controllers\Admin\Api\BaseController;
use App\Services\MediaService\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagerController extends BaseController
{
    public function store(Request $request)
    {
        $table = $request->table;
        $entityColumnName = $request->entityColumnName;
        $entityColumnValue = $request->entityColumnValue;

        $path = 'uploads/products/' . $entityColumnValue . '/' . uniqid();

        try {
            $mediaService = new MediaService($request->image);
            $filename = $mediaService->store($path);

            $createdRow = $table::create([
                $entityColumnName => $entityColumnValue,
                'filename' => $filename
            ]);
        } catch (\Exception $exception) {
            return $this->sendError('An error occurred while saving data');
        }

        return $this->sendResponse([
            'fileRow' => $createdRow
        ], 'Successful.');
    }

    public function delete(Request $request)
    {
        $table = $request->table;
        $columnId = $request->columnId ?? 'id';
        $rowId = $request->rowId;

        if (!$table) {
            return $this->sendError('No table in data.');
        }

        try {
            $fileRow = $table::where($columnId, $rowId)->first();
            $filename = $fileRow->filename;

            // Нужно ещё удалить превью у товара, если оно есть
            $fileRow->delete();
            MediaService::remove($filename);
        } catch (\Exception $exception) {
            return $this->sendError('An error occurred while deleting.');
        }

        return $this->sendResponse([], 'Successful.');
    }
}
