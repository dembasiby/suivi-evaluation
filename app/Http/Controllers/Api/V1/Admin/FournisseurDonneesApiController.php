<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\FournisseurDonnee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFournisseurDonneeRequest;
use App\Http\Requests\UpdateFournisseurDonneeRequest;
use App\Http\Resources\Admin\FournisseurDonneeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FournisseurDonneesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fournisseur_donnee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FournisseurDonneeResource(FournisseurDonnee::with(['user', 'organisation', 'point_focal'])->get());
    }

    public function store(StoreFournisseurDonneeRequest $request)
    {
        $fournisseurDonnee = FournisseurDonnee::create($request->all());

        return (new FournisseurDonneeResource($fournisseurDonnee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FournisseurDonnee $fournisseurDonnee)
    {
        abort_if(Gate::denies('fournisseur_donnee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FournisseurDonneeResource($fournisseurDonnee->load(['user', 'organisation', 'point_focal']));
    }

    public function update(UpdateFournisseurDonneeRequest $request, FournisseurDonnee $fournisseurDonnee)
    {
        $fournisseurDonnee->update($request->all());

        return (new FournisseurDonneeResource($fournisseurDonnee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FournisseurDonnee $fournisseurDonnee)
    {
        abort_if(Gate::denies('fournisseur_donnee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseurDonnee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
