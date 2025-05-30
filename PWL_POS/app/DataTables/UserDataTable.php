<?php

namespace App\DataTables;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\UserDataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $editUrl = url('/users/edit', $row->user_id);
                $deleteUrl = url('/users/delete', $row->user_id);
                $csrfToken = csrf_token();

                return '
                <div class="d-flex gap-2">
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm d-flex align-items-center px-3">
                        Edit
                    </a>
                    <form action="' . $deleteUrl . '" method="POST" style="margin:0;">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="' . $csrfToken . '">
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center px-3"
                            onclick="return confirm(\'Yakin ingin menghapus?\')">
                            Delete
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('user_id')->title('User ID'),
            Column::make('level_id')->title('Level ID'),
            Column::make('username')->title('Username'),
            Column::make('nama')->title('Nama'),
            Column::make('password')->title('Password'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}