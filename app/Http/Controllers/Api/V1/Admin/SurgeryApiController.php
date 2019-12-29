<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurgeryRequest;
use App\Http\Requests\UpdateSurgeryRequest;
use App\Http\Resources\Admin\SurgeryResource;
use App\Surgery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SurgeryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('surgery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurgeryResource(Surgery::with(['patient', 'department', 'creator'])->get());
    }

    public function store(StoreSurgeryRequest $request)
    {
        $surgery = Surgery::create($request->all());

        return (new SurgeryResource($surgery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Surgery $surgery)
    {
        abort_if(Gate::denies('surgery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SurgeryResource($surgery->load(['patient', 'department', 'creator']));
    }

    public function update(UpdateSurgeryRequest $request, Surgery $surgery)
    {
        $surgery->update($request->all());

        return (new SurgeryResource($surgery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Surgery $surgery)
    {
        abort_if(Gate::denies('surgery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surgery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
