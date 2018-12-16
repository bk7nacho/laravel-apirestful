<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data,$code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collecion, $code = 200)
    {
        if ($collecion->isEmpty()){
            return $this->successResponse(['data'=>$collecion], $code);
        }

        $collecion = $this->sortData($collecion);
        $collecion = $this->paginate($collecion);

        return $this->successResponse(['data'=>$collecion], $code);
    }

    Protected function showAllwithouPaginate(Collection $collecion, $code = 200) {
        return $this->successResponse(['data'=>$collecion], $code);
    }

    protected function sortData(Collection $collection){

        if (request()->has('sort_by')){
            $collection = $collection->sortBy->{request()->sort_by};
        }
        return $collection;
    }

    protected function paginate(Collection $collection){
        $rules = [
            'per_page' => 'integer|min:1|max:50'
        ];

        Validator::validate(request()->all(),$rules);

        $page = LengthAwarePaginator::resolveCurrentPage();

        $currentPage = (int) app('request')->get('page', $default = '0');

        $perPage = 10;
        if (request()->has('per_page')){
            $perPage = (int) request()->per_page;
        }

        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated -> appends(request()->all());

        return $paginated;
    }

    protected function showOne(Model $instance, $code = 200){
        return $this->successResponse(['data'=> $instance], $code);
    }

    protected function showMessage($message, $code = 200){
        return $this->successResponse(['data'=> $message], $code);
    }
}
