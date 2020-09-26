<?php

namespace App\DataTables;

use App\Models\Livro;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LivroDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($l) {
                return view('restrito.datatable.acoes_padrao', [
                    'editar' => route('restrito.livros.edit', $l),
                    'excluir' => route('restrito.livros.destroy', $l)
                ]);
            })
            ->addColumn('total_autores', function ($l) {
                return $l->livros()->count();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\LivroDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Livro $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('livrodatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-plus-circle"></i> Cadastrar'),
                        Button::make('print')
                            ->addClass('btn btn-primary')
                            ->text('<i class="fas fa-print"></i> Imprimir')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->title('Ações'),
            Column::make('nome'),
            Column::make('paginas'),
            Column::make('capa'),
            Column::make('descricao'),
            Column::make('valor'),
            Column::computed('total_autores')->title('Total de Autores')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Livro_' . date('YmdHis');
    }
}
