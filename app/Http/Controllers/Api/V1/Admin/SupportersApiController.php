<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Http\Resources\Admin\SupporterResource;
use App\Models\Supporter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('supporter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupporterResource(Supporter::with(['email', 'name'])->get());
    }

    public function store(StoreSupporterRequest $request)
    {
        $supporter = Supporter::create($request->all());

        return (new SupporterResource($supporter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SupporterResource($supporter->load(['email', 'name']));
    }

    public function update(UpdateSupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->all());

        return (new SupporterResource($supporter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
