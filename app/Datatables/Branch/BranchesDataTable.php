<?php

namespace App\Datatables\Branch;

use App\Models\Branch;
use App\Services\BranchesService;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BranchesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('name', function (Branch $branch) {
                return $branch->name;
            })
            ->editColumn('city_id', function (Branch $branch) {
                return $branch->city->title;
            })->editColumn('status', function (Branch $branch) {
                $classes = $branch->status ? 'badge-success' : 'badge-danger';
                $content = $branch->status ? __('message.Active') : __('message.Not Active');
                return view('admin.components._badge', ['classes' => $classes, 'content' => $content]);
            })->addColumn('action', function (Branch $branch) {
                return view('admin.branch.components._action', ['model' => $branch])->render();
            });
    }


    public function query(BranchesService $branchesService)
    {
        return $branchesService->datatable($this->filters);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->title("#"),

            Column::make('name')
                ->title(__('message.location_title'))
                ->orderable(false),

            Column::make('phone')
                ->title(__('message.Phone'))
                ->orderable(false),

            Column::make('city_id')
                ->title(__('message.location'))
                ->orderable(false)
                ->searchable(false),

            Column::make('address')
                ->title(__('message.address'))
                ->orderable(false)
                ->searchable(false),

            Column::make('status')
                ->title(__('message.Status'))
                ->searchable(false),

            Column::computed('action')
                ->title(__('message.action'))
                ->exportable(false)
                ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */

}

