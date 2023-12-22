<?php

namespace App\Datatables\Location;

use App\Models\Location;
use App\Services\LocationsService;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CitiesDataTable extends DataTable
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
            ->editColumn('title', function (Location $location) {
                return $location->getTranslation('title', app()->getLocale());
            })->editColumn('parent_id', function (Location $location) {
                return $location->parent->title;
            })->editColumn('status', function (Location $location) {
                $classes = $location->status ? 'badge-success' : 'badge-danger';
                $content = $location->status ? __('message.Active') : __('message.Not Active') ;
                return view('admin.components._badge',['classes' => $classes,'content' => $content]);
            })->addColumn('action', function (Location $model) {
                return view('admin.locations.city.components._action', compact('model'));
            });
    }

    /**
     * @param LocationsService $locationService
     * @return mixed
     */
    public function query(LocationsService $locationService)
    {
        return $locationService->datatable($this->filters);

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

            Column::make('title')
                ->title(__('message.location_title'))
                ->orderable(false),

            Column::make('parent_id')
                ->title(__('message.country'))
                ->orderable(false)
                ->searchable(false),

            Column::make('status')
                ->title(__('message.Status'))
                ->orderable(false)
                ->searchable(false),

            Column::computed('action')->title(__('message.action'))
                ->exportable(false)
                ->printable(false),
        ];
    }
}