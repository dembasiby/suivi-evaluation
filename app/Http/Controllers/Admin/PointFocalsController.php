<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPointFocalRequest;
use App\Http\Requests\StorePointFocalRequest;
use App\Http\Requests\UpdatePointFocalRequest;
use App\PointFocal;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PointFocalsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('point_focal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointFocals = PointFocal::all();

        return view('admin.pointFocals.index', compact('pointFocals'));
    }

    public function create()
    {
        abort_if(Gate::denies('point_focal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('prenom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pointFocals.create', compact('users'));
    }

    public function store(StorePointFocalRequest $request)
    {
        $pointFocal = PointFocal::create($request->all());

        return redirect()->route('admin.point-focals.index');
    }

    public function edit(PointFocal $pointFocal)
    {
        abort_if(Gate::denies('point_focal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('prenom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pointFocal->load('user');

        return view('admin.pointFocals.edit', compact('users', 'pointFocal'));
    }

    public function update(UpdatePointFocalRequest $request, PointFocal $pointFocal)
    {
        $pointFocal->update($request->all());

        return redirect()->route('admin.point-focals.index');
    }

    public function show(PointFocal $pointFocal)
    {
        abort_if(Gate::denies('point_focal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointFocal->load('user');

        return view('admin.pointFocals.show', compact('pointFocal'));
    }

    public function destroy(PointFocal $pointFocal)
    {
        abort_if(Gate::denies('point_focal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pointFocal->delete();

        return back();
    }

    public function massDestroy(MassDestroyPointFocalRequest $request)
    {
        PointFocal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
