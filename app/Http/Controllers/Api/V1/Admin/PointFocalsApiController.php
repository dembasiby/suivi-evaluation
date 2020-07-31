<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePointFocalRequest;
use App\Http\Requests\UpdatePointFocalRequest;
use App\Http\Resources\Admin\PointFocalResource;
use App\PointFocal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PointFocalsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('point_focal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointFocalResource(PointFocal::with(['user'])->get());
    }

    public function store(StorePointFocalRequest $request)
    {
        $pointFocal = PointFocal::create($request->all());

        return (new PointFocalResource($pointFocal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PointFocal $pointFocal)
    {
        abort_if(Gate::denies('point_focal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PointFocalResource($pointFocal->load(['user']));
    }

    public function update(UpdatePointFocalRequest $request, PointFocal $pointFocal)
    {
        $pointFocal->update($request->all());

        return (new PointFocalResource($pointFocal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PointFocal $pointFocal)
    {
        abort_if(Gate::denies('point_focal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointFocal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
