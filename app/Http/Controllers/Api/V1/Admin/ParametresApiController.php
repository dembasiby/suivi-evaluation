<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;
use App\Http\Resources\Admin\ParametreResource;
use App\Parametre;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParametresApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('parametre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParametreResource(Parametre::with(['indicateur'])->get());
    }

    public function store(StoreParametreRequest $request)
    {
        $parametre = Parametre::create($request->all());

        return (new ParametreResource($parametre))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Parametre $parametre)
    {
        abort_if(Gate::denies('parametre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ParametreResource($parametre->load(['indicateur']));
    }

    public function update(UpdateParametreRequest $request, Parametre $parametre)
    {
        $parametre->update($request->all());

        return (new ParametreResource($parametre))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Parametre $parametre)
    {
        abort_if(Gate::denies('parametre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametre->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
