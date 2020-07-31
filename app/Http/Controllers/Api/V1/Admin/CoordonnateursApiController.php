<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Coordonnateur;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoordonnateurRequest;
use App\Http\Requests\UpdateCoordonnateurRequest;
use App\Http\Resources\Admin\CoordonnateurResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoordonnateursApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coordonnateur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoordonnateurResource(Coordonnateur::with(['user'])->get());
    }

    public function store(StoreCoordonnateurRequest $request)
    {
        $coordonnateur = Coordonnateur::create($request->all());

        return (new CoordonnateurResource($coordonnateur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Coordonnateur $coordonnateur)
    {
        abort_if(Gate::denies('coordonnateur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoordonnateurResource($coordonnateur->load(['user']));
    }

    public function update(UpdateCoordonnateurRequest $request, Coordonnateur $coordonnateur)
    {
        $coordonnateur->update($request->all());

        return (new CoordonnateurResource($coordonnateur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Coordonnateur $coordonnateur)
    {
        abort_if(Gate::denies('coordonnateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coordonnateur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
