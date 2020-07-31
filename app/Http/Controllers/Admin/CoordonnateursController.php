<?php

namespace App\Http\Controllers\Admin;

use App\Coordonnateur;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCoordonnateurRequest;
use App\Http\Requests\StoreCoordonnateurRequest;
use App\Http\Requests\UpdateCoordonnateurRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoordonnateursController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coordonnateur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coordonnateurs = Coordonnateur::all();

        return view('admin.coordonnateurs.index', compact('coordonnateurs'));
    }

    public function create()
    {
        abort_if(Gate::denies('coordonnateur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.coordonnateurs.create', compact('users'));
    }

    public function store(StoreCoordonnateurRequest $request)
    {
        $coordonnateur = Coordonnateur::create($request->all());

        return redirect()->route('admin.coordonnateurs.index');
    }

    public function edit(Coordonnateur $coordonnateur)
    {
        abort_if(Gate::denies('coordonnateur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coordonnateur->load('user');

        return view('admin.coordonnateurs.edit', compact('users', 'coordonnateur'));
    }

    public function update(UpdateCoordonnateurRequest $request, Coordonnateur $coordonnateur)
    {
        $coordonnateur->update($request->all());

        return redirect()->route('admin.coordonnateurs.index');
    }

    public function show(Coordonnateur $coordonnateur)
    {
        abort_if(Gate::denies('coordonnateur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coordonnateur->load('user');

        return view('admin.coordonnateurs.show', compact('coordonnateur'));
    }

    public function destroy(Coordonnateur $coordonnateur)
    {
        abort_if(Gate::denies('coordonnateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coordonnateur->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoordonnateurRequest $request)
    {
        Coordonnateur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
