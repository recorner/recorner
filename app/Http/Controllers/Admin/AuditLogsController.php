<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAuditLogRequest;
use App\Http\Requests\StoreAuditLogRequest;
use App\Http\Requests\UpdateAuditLogRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditLogsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('audit_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.auditLogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('audit_log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.auditLogs.create');
    }

    public function store(StoreAuditLogRequest $request)
    {
        $auditLog = AuditLog::create($request->all());

        return redirect()->route('admin.audit-logs.index');
    }

    public function edit(AuditLog $auditLog)
    {
        abort_if(Gate::denies('audit_log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.auditLogs.edit', compact('auditLog'));
    }

    public function update(UpdateAuditLogRequest $request, AuditLog $auditLog)
    {
        $auditLog->update($request->all());

        return redirect()->route('admin.audit-logs.index');
    }

    public function show(AuditLog $auditLog)
    {
        abort_if(Gate::denies('audit_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.auditLogs.show', compact('auditLog'));
    }

    public function destroy(AuditLog $auditLog)
    {
        abort_if(Gate::denies('audit_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auditLog->delete();

        return back();
    }

    public function massDestroy(MassDestroyAuditLogRequest $request)
    {
        AuditLog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
