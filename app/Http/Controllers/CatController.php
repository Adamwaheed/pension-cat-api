<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCatRequest;
use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Http\Resources\CatCollection;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use App\Traits\ResponseTrait;
use http\Env\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Pipeline\Pipeline;

class CatController extends Controller
{

    use ResponseTrait;

    /**
     *
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(SearchCatRequest $request)
    {
        $cats = app(Pipeline::class)
            ->send(Cat::query())
            ->through([
                          \App\Filters\CatFilter::class,
                      ])
            ->thenReturn()
            ->paginate();

        return $this->success($cats, 'Cat Listed Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCatRequest $request
     * @return JsonResponse
     */
    public function store(StoreCatRequest $request)
    {
        $input = $request->validated();
        $cat = new Cat($input);
        if (!$cat->save()) {
            return $this->error('Cannot Create Cat for some reason');
        }

        return $this->success(new CatResource($cat), 'Cat Created Successfully', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $cat = Cat::find($id);

        if (!$cat) {
            return $this->notFound('Cat Not found');
        }

        return $this->success(new CatResource($cat), 'found cat');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCatRequest $request
     * @param \App\Models\Cat $cat
     * @return JsonResponse
     */
    public function update(UpdateCatRequest $request, $id)
    {
        $input = $request->validated();

        $cat = Cat::find($id);

        if (!$cat) {
            return $this->notFound('Cat Not Found');
        }

        $cat->fill($input);

        if (!$cat->save()) {
            return $this->error('Cannot Update Cat for some reason');
        }

        return $this->success(new CatResource($cat), 'Cat Created Successfully', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cat $cat
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $cat = Cat::find($id);

        if (!$cat) {
            return $this->notFound('Cat Not Found');
        }

        if (!$cat->delete()) {
            return $this->error('Cannot Delete cat For some reason');
        }

        return $this->success(new CatResource($cat), 'Cat deleted Successfully');
    }
}
