<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CompaniesController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Company::query()->select(sprintf('%s.*', (new Company())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'company_show';
                $editGate = 'company_edit';
                $deleteGate = 'company_delete';
                $crudRoutePart = 'companies';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('cover_image', function ($row) {
                if ($photo = $row->cover_image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : '';
            });
            $table->editColumn('headquarters', function ($row) {
                return $row->headquarters ? $row->headquarters : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('industry', function ($row) {
                return $row->industry ? $row->industry : '';
            });
            $table->editColumn('facebook', function ($row) {
                return $row->facebook ? $row->facebook : '';
            });
            $table->editColumn('twitter', function ($row) {
                return $row->twitter ? $row->twitter : '';
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : '';
            });
            $table->editColumn('linkedin', function ($row) {
                return $row->linkedin ? $row->linkedin : '';
            });
            $table->editColumn('youtube', function ($row) {
                return $row->youtube ? $row->youtube : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('downloads', function ($row) {
                if (!$row->downloads) {
                    return '';
                }
                $links = [];
                foreach ($row->downloads as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'cover_image', 'downloads']);

            return $table->make(true);
        }

        return view('admin.companies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());

        if ($request->input('logo', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('cover_image', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
        }

        foreach ($request->input('downloads', []) as $file) {
            $company->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('downloads');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $company->id]);
        }

        return redirect()->route('admin.companies.index');
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        if ($request->input('logo', false)) {
            if (!$company->logo || $request->input('logo') !== $company->logo->file_name) {
                if ($company->logo) {
                    $company->logo->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($company->logo) {
            $company->logo->delete();
        }

        if ($request->input('cover_image', false)) {
            if (!$company->cover_image || $request->input('cover_image') !== $company->cover_image->file_name) {
                if ($company->cover_image) {
                    $company->cover_image->delete();
                }
                $company->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover_image'))))->toMediaCollection('cover_image');
            }
        } elseif ($company->cover_image) {
            $company->cover_image->delete();
        }

        if (count($company->downloads) > 0) {
            foreach ($company->downloads as $media) {
                if (!in_array($media->file_name, $request->input('downloads', []))) {
                    $media->delete();
                }
            }
        }
        $media = $company->downloads->pluck('file_name')->toArray();
        foreach ($request->input('downloads', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $company->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('downloads');
            }
        }

        return redirect()->route('admin.companies.index');
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companies.show', compact('company'));
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyRequest $request)
    {
        Company::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('company_create') && Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Company();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
