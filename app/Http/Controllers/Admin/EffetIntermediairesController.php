<?php

namespace App\Http\Controllers\Admin;

use App\EffetIntermediaire;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEffetIntermediaireRequest;
use App\Http\Requests\StoreEffetIntermediaireRequest;
use App\Http\Requests\UpdateEffetIntermediaireRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EffetIntermediairesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('effet_intermediaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EffetIntermediaire::query()->select(sprintf('%s.*', (new EffetIntermediaire)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'effet_intermediaire_show';
                $editGate      = 'effet_intermediaire_edit';
                $deleteGate    = 'effet_intermediaire_delete';
                $crudRoutePart = 'effet-intermediaires';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.effetIntermediaires.index');
    }

    public function create()
    {
        abort_if(Gate::denies('effet_intermediaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.create');
    }

    public function store(StoreEffetIntermediaireRequest $request)
    {
        $effetIntermediaire = EffetIntermediaire::create($request->all());

        return redirect()->route('admin.effet-intermediaires.index');
    }

    public function edit(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.edit', compact('effetIntermediaire'));
    }

    public function update(UpdateEffetIntermediaireRequest $request, EffetIntermediaire $effetIntermediaire)
    {
        $effetIntermediaire->update($request->all());

        return redirect()->route('admin.effet-intermediaires.index');
    }

    public function show(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.show', compact('effetIntermediaire'));
    }

    public function destroy(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetIntermediaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyEffetIntermediaireRequest $request)
    {
        EffetIntermediaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
