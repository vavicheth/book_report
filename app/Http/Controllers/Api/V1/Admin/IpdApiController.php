<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIpdRequest;
use App\Http\Requests\UpdateIpdRequest;
use App\Http\Resources\Admin\IpdResource;
use App\Ipd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpdApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ipd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IpdResource(Ipd::with(['patient', 'department', 'creator'])->get());
    }

    public function store(StoreIpdRequest $request)
    {
        $ipd = Ipd::create($request->all());

        return (new IpdResource($ipd))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ipd $ipd)
    {
        abort_if(Gate::denies('ipd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IpdResource($ipd->load(['patient', 'department', 'creator']));
    }

    public function update(UpdateIpdRequest $request, Ipd $ipd)
    {
        $ipd->update($request->all());

        return (new IpdResource($ipd))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ipd $ipd)
    {
        abort_if(Gate::denies('ipd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ipd->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
