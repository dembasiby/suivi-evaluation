<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrganisationRequest;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use App\Organisation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganisationsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('organisation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organisation::query()->select(sprintf('%s.*', (new Organisation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'organisation_show';
                $editGate      = 'organisation_edit';
                $deleteGate    = 'organisation_delete';
                $crudRoutePart = 'organisations';

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
            $table->editColumn('nom', function ($row) {
                return $row->nom ? $row->nom : "";
            });
            $table->editColumn('sigle', function ($row) {
                return $row->sigle ? $row->sigle : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.organisations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organisation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organisations.create');
    }

    public function store(StoreOrganisationRequest $request)
    {
        $organisation = Organisation::create($request->all());

        return redirect()->route('admin.organisations.index');
    }

    public function edit(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organisations.edit', compact('organisation'));
    }

    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
        $organisation->update($request->all());

        return redirect()->route('admin.organisations.index');
    }

    public function show(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisation->load('organisationFournisseurDonnees');

        return view('admin.organisations.show', compact('organisation'));
    }

    public function destroy(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisation->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganisationRequest $request)
    {
        Organisation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
