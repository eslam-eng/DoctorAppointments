<?php

namespace App\Datatables;

use App\Models\Location;
use App\Services\LocationsService;
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
            ->addcolumn('title', function (Location $location) {
                return $location->getTranslation('title', app()->getLocale());
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

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */

}
