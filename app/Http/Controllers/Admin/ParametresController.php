<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParametreRequest;
use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;
use App\Indicateur;
use App\Parametre;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ParametresController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('parametre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Parametre::with(['indicateur'])->select(sprintf('%s.*', (new Parametre)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'parametre_show';
                $editGate      = 'parametre_edit';
                $deleteGate    = 'parametre_delete';
                $crudRoutePart = 'parametres';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->addColumn('indicateur_description', function ($row) {
                return $row->indicateur ? $row->indicateur->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'indicateur']);

            return $table->make(true);
        }

        return view('admin.parametres.index');
    }

    public function create()
    {
        abort_if(Gate::denies('parametre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateurs = Indicateur::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.parametres.create', compact('indicateurs'));
    }

    public function store(StoreParametreRequest $request)
    {
        $parametre = Parametre::create($request->all());

        return redirect()->route('admin.parametres.index');
    }

    public function edit(Parametre $parametre)
    {
        abort_if(Gate::denies('parametre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateurs = Indicateur::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parametre->load('indicateur');

        return view('admin.parametres.edit', compact('indicateurs', 'parametre'));
    }

    public function update(UpdateParametreRequest $request, Parametre $parametre)
    {
        $parametre->update($request->all());

        return redirect()->route('admin.parametres.index');
    }

    public function show(Parametre $parametre)
    {
        abort_if(Gate::denies('parametre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametre->load('indicateur', 'parametreQuestions');

        return view('admin.parametres.show', compact('parametre'));
    }

    public function destroy(Parametre $parametre)
    {
        abort_if(Gate::denies('parametre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parametre->delete();

        return back();
    }

    public function massDestroy(MassDestroyParametreRequest $request)
    {
        Parametre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
