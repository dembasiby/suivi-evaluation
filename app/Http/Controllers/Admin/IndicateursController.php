<?php

namespace App\Http\Controllers\Admin;

use App\Extrant;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIndicateurRequest;
use App\Http\Requests\StoreIndicateurRequest;
use App\Http\Requests\UpdateIndicateurRequest;
use App\Indicateur;
use App\Organisation;
use App\ProblemeCentral;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IndicateursController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('indicateur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Indicateur::with(['probleme_central', 'extrant', 'organisations'])->select(sprintf('%s.*', (new Indicateur)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'indicateur_show';
                $editGate      = 'indicateur_edit';
                $deleteGate    = 'indicateur_delete';
                $crudRoutePart = 'indicateurs';

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
            $table->editColumn('code_indicateur', function ($row) {
                return $row->code_indicateur ? $row->code_indicateur : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->addColumn('probleme_central_description', function ($row) {
                return $row->probleme_central ? $row->probleme_central->description : '';
            });

            $table->addColumn('extrant_description', function ($row) {
                return $row->extrant ? $row->extrant->description : '';
            });

            $table->editColumn('organisation', function ($row) {
                $labels = [];

                foreach ($row->organisations as $organisation) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $organisation->sigle);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'probleme_central', 'extrant', 'organisation']);

            return $table->make(true);
        }

        return view('admin.indicateurs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('indicateur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probleme_centrals = ProblemeCentral::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrants = Extrant::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id');

        return view('admin.indicateurs.create', compact('probleme_centrals', 'extrants', 'organisations'));
    }

    public function store(StoreIndicateurRequest $request)
    {
        $indicateur = Indicateur::create($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return redirect()->route('admin.indicateurs.index');
    }

    public function edit(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probleme_centrals = ProblemeCentral::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrants = Extrant::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id');

        $indicateur->load('probleme_central', 'extrant', 'organisations');

        return view('admin.indicateurs.edit', compact('probleme_centrals', 'extrants', 'organisations', 'indicateur'));
    }

    public function update(UpdateIndicateurRequest $request, Indicateur $indicateur)
    {
        $indicateur->update($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return redirect()->route('admin.indicateurs.index');
    }

    public function show(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateur->load('probleme_central', 'extrant', 'organisations', 'indicateurParametres');

        return view('admin.indicateurs.show', compact('indicateur'));
    }

    public function destroy(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateur->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndicateurRequest $request)
    {
        Indicateur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
