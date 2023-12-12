<?php

namespace App\Datatables;

use App\Models\Location;
use App\Services\LocationsService;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CountriesDataTable extends DataTable
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
            ->addColumn('action', function (Location $location) {
                return view('admin.locations.country.components._action', ['model'=>$location])->render();
            })
            ->addcolumn('title', function (Location $location) {
                return $location->title;
            });
    }


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
                ->title(trans('message.location_title')),

            Column::make('currency_code')
                ->title(trans('message.currency')),

            Column::computed('action')->title(__('message.action'))
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

