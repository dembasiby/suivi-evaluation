<?php

namespace App\Http\Controllers\Admin;

use App\EffetImmediat;
use App\Extrant;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExtrantRequest;
use App\Http\Requests\StoreExtrantRequest;
use App\Http\Requests\UpdateExtrantRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ExtrantsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('extrant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Extrant::with(['effet_immediat'])->select(sprintf('%s.*', (new Extrant)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'extrant_show';
                $editGate      = 'extrant_edit';
                $deleteGate    = 'extrant_delete';
                $crudRoutePart = 'extrants';

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
            $table->editColumn('code_extrant', function ($row) {
                return $row->code_extrant ? $row->code_extrant : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->addColumn('effet_immediat_description', function ($row) {
                return $row->effet_immediat ? $row->effet_immediat->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'effet_immediat']);

            return $table->make(true);
        }

        return view('admin.extrants.index');
    }

    public function create()
    {
        abort_if(Gate::denies('extrant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_immediats = EffetImmediat::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.extrants.create', compact('effet_immediats'));
    }

    public function store(StoreExtrantRequest $request)
    {
        $extrant = Extrant::create($request->all());

        return redirect()->route('admin.extrants.index');
    }

    public function edit(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_immediats = EffetImmediat::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrant->load('effet_immediat');

        return view('admin.extrants.edit', compact('effet_immediats', 'extrant'));
    }

    public function update(UpdateExtrantRequest $request, Extrant $extrant)
    {
        $extrant->update($request->all());

        return redirect()->route('admin.extrants.index');
    }

    public function show(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrant->load('effet_immediat', 'extrantIndicateurs');

        return view('admin.extrants.show', compact('extrant'));
    }

    public function destroy(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrant->delete();

        return back();
    }

    public function massDestroy(MassDestroyExtrantRequest $request)
    {
        Extrant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
