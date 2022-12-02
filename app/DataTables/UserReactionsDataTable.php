<?php
namespace App\DataTables;
use App\Models\Reaction;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;
use App\Models\Blog;

class UserReactionsDataTable extends DataTable
{
    	

    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.reactions.buttons.actions')
			->addColumn('user', function ($reactions) {
				return "<a href=users/".User::find($reactions->user_id)->id. ">".User::find($reactions->user_id)->user_name."</a>";	
			})
			->addColumn('blog', function ($reactions) {
				return "<a href=blogs/".$reactions->blog_id. ">".Blog::find($reactions->blog_id)->title."</a>";	
			})

   		->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')   		->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')            ->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
            ->rawColumns(['checkbox','actions','user', 'blog']);
    }
  

	public function query()
    {
		if(auth()->user()){
			return Reaction::query()->select("reactions.*")->where('user_id', auth()->user()->id);
		}
		

        //return Reaction::query()->select("reactions.*");

    }
    	

    public function html()
	    {
	      $html =  $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
               'searching'   => true,
               'paging'   => true,
               'bLengthChange'   => true,
               'bInfo'   => true,
               'responsive'   => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
                'buttons' => [
                	[
					  'extend' => 'print',
					  'className' => 'btn btn-outline',
					  'text' => '<i class="fa fa-print"></i> '.trans('admin.print')
					 ],	[
					'extend' => 'excel',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')
					],	[
					'extend' => 'csv',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv')
					],	[
					 'extend' => 'pdf',
					 'className' => 'btn btn-outline',
					 'text' => '<i class="fa fa-file-pdf"> </i> '.trans('admin.export_pdf')
					],	[
					'extend' => 'reload',
					'className' => 'btn btn-outline',
					'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')
					],
                ],
                'initComplete' => "function () {


            
            ". filterElement('1,2,3,4,5', 'input') . "

            

	            }",
                'order' => [[1, 'desc']],

                    'language' => [
                       'sProcessing' => trans('admin.sProcessing'),
							'sLengthMenu'        => trans('admin.sLengthMenu'),
							'sZeroRecords'       => trans('admin.sZeroRecords'),
							'sEmptyTable'        => trans('admin.sEmptyTable'),
							'sInfo'              => trans('admin.sInfo'),
							'sInfoEmpty'         => trans('admin.sInfoEmpty'),
							'sInfoFiltered'      => trans('admin.sInfoFiltered'),
							'sInfoPostFix'       => trans('admin.sInfoPostFix'),
							'sSearch'            => trans('admin.sSearch'),
							'sUrl'               => trans('admin.sUrl'),
							'sInfoThousands'     => trans('admin.sInfoThousands'),
							'sLoadingRecords'    => trans('admin.sLoadingRecords'),
							'oPaginate'          => [
								'sFirst'            => trans('admin.sFirst'),
								'sLast'             => trans('admin.sLast'),
								'sNext'             => trans('admin.sNext'),
								'sPrevious'         => trans('admin.sPrevious'),
							],
							'oAria'            => [
								'sSortAscending'  => trans('admin.sSortAscending'),
								'sSortDescending' => trans('admin.sSortDescending'),
							],
                    ]
                ]);

        return $html;

	    }

	protected function getColumns()
	    {
	        return [
	       	
 			[
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<div  class="icheck-danger">
                  <input type="checkbox" class="select-all" id="select-all"  onclick="select_all()" >
                  <label for="select-all"></label>
                </div>',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
			[
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
			'user' => [
				'name' => 'user',
				'data' => 'user'
				
			],
			'blog' => [
				'name' => 'blog',
				'data' => 'blog'
				
			],
				[
                 'name'=>'like',
                 'data'=>'like',
                 'title'=>trans('admin.like'),
		    ],
				[
                 'name'=>'dislike',
                 'data'=>'dislike',
                 'title'=>trans('admin.dislike'),
		    ],
				[
                 'name'=>'user_id',
                 'data'=>'user_id',
				 'visible' => false,
                 'title'=>trans('admin.user_id'),
		    ],
				[
                 'name'=>'blog_id',
                 'data'=>'blog_id',
				 'visible' => false,
                 'title'=>trans('admin.blog_id'),
		    ],
            
    	 ];
			}

	    protected function filename()
	    {
	        return 'reactions_' . time();
	    }
    	
}