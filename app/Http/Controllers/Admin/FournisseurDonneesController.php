<?php

namespace App\Http\Controllers\Admin;

use App\FournisseurDonnee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFournisseurDonneeRequest;
use App\Http\Requests\StoreFournisseurDonneeRequest;
use App\Http\Requests\UpdateFournisseurDonneeRequest;
use App\Organisation;
use App\PointFocal;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FournisseurDonneesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fournisseur_donnee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseurDonnees = FournisseurDonnee::all();

        return view('admin.fournisseurDonnees.index', compact('fournisseurDonnees'));
    }

    public function create()
    {
        abort_if(Gate::denies('fournisseur_donnee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $point_focals = PointFocal::all()->pluck('descritpion', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fournisseurDonnees.create', compact('users', 'organisations', 'point_focals'));
    }

    public function store(StoreFournisseurDonneeRequest $request)
    {
        $fournisseurDonnee = FournisseurDonnee::create($request->all());

        return redirect()->route('admin.fournisseur-donnees.index');
    }

    public function edit(FournisseurDonnee $fournisseurDonnee)
    {
        abort_if(Gate::denies('fournisseur_donnee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $point_focals = PointFocal::all()->pluck('descritpion', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fournisseurDonnee->load('user', 'organisation', 'point_focal');

        return view('admin.fournisseurDonnees.edit', compact('users', 'organisations', 'point_focals', 'fournisseurDonnee'));
    }

    public function update(UpdateFournisseurDonneeRequest $request, FournisseurDonnee $fournisseurDonnee)
    {
        $fournisseurDonnee->update($request->all());

        return redirect()->route('admin.fournisseur-donnees.index');
    }

    public function show(FournisseurDonnee $fournisseurDonnee)
    {
        abort_if(Gate::denies('fournisseur_donnee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseurDonnee->load('user', 'organisation', 'point_focal');

        return view('admin.fournisseurDonnees.show', compact('fournisseurDonnee'));
    }

    public function destroy(FournisseurDonnee $fournisseurDonnee)
    {
        abort_if(Gate::denies('fournisseur_donnee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fournisseurDonnee->delete();

        return back();
    }

    public function massDestroy(MassDestroyFournisseurDonneeRequest $request)
    {
        FournisseurDonnee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
