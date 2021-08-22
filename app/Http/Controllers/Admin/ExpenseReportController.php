<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenseReportRequest;
use App\Http\Requests\StoreExpenseReportRequest;
use App\Http\Requests\UpdateExpenseReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpenseReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expense_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('expense_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseReports.create');
    }

    public function store(StoreExpenseReportRequest $request)
    {
        $expenseReport = ExpenseReport::create($request->all());

        return redirect()->route('admin.expense-reports.index');
    }

    public function edit(ExpenseReport $expenseReport)
    {
        abort_if(Gate::denies('expense_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseReports.edit', compact('expenseReport'));
    }

    public function update(UpdateExpenseReportRequest $request, ExpenseReport $expenseReport)
    {
        $expenseReport->update($request->all());

        return redirect()->route('admin.expense-reports.index');
    }

    public function show(ExpenseReport $expenseReport)
    {
        abort_if(Gate::denies('expense_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseReports.show', compact('expenseReport'));
    }

    public function destroy(ExpenseReport $expenseReport)
    {
        abort_if(Gate::denies('expense_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseReportRequest $request)
    {
        ExpenseReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
