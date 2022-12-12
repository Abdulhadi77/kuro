<?php
namespace App\DataTables;
use App\Models\Contact;
use App\Models\User;
use App\Models\VotePlan;
use App\Models\BFOTPlan;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

class ContactsDataTable extends DataTable
{
    	

    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.contacts.buttons.actions')
			->addColumn('user_id', function ($contact) {
				if (!is_null($contact->user_id))
					return "<a target=_blank href=users/".$contact->user_id. ">".User::find($contact->user_id)->user_name."</a>";
				
				
			})
			->addColumn('vote_revenue', function ($contact) {
				if (!is_null($contact->user_id))
					if (!is_null($contact->user->vote_plan_id))
						return $contact->user->vote_revenue(VotePlan::find($contact->user->vote_plan_id));
			})
			->addColumn('bfot_revenue', function ($contact) {
				if (!is_null($contact->user_id))
					if (!is_null($contact->user->b_f_o_t_plan_id))
						return $contact->user->bfot_revenue(BFOTPlan::find($contact->user->b_f_o_t_plan_id));
			})
   		->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')
		   		           ->addColumn('checkbox', '<div  class="icheck-danger">
                  <input type="checkbox" class="selected_data" name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
                  <label for="selectdata{{ $id }}"></label>
                </div>')
            ->rawColumns(['checkbox','actions','user_id',]);
    }
  

	public function query()
    {
        return Contact::query()->select("contacts.*");

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
					],	[
						'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
						'className'    => 'btn btn-outline deleteBtn',
                    ], 
                ],
                'initComplete' => "function () {


            
            ". filterElement('1,2,3,4', 'input') . "

            

            ". filterElement('7', 'select', [
            'pending'=>trans('admin.pending'),
            'done'=>trans('admin.done'),
            ]) . "
			". filterElement('5', 'select', [
				'vote_revenue'=>trans('admin.vote_revenue'),
				'bfot_revenue'=>trans('admin.bfot_revenue'),
				]) . "
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
			[
				'name'=>'user_id',
				'data'=>'user_id',
				'title'=>trans('admin.user_id'),
		   ],
				[
                 'name'=>'name',
                 'data'=>'name',
                 'title'=>trans('admin.name'),
		    ],
				[
                 'name'=>'email',
                 'data'=>'email',
                 'title'=>trans('admin.email'),
		    ],
				[
                 'name'=>'subject',
                 'data'=>'subject',
                 'title'=>trans('admin.subject'),
		    ],
				[
                 'name'=>'message',
                 'data'=>'message',
                 'title'=>trans('admin.message'),
		    ],
			[
				'name'=>'status',
				'data'=>'status',
				'title'=>trans('admin.status'),
			],
			[
				'name'=>'vote_revenue',
				'data'=>'vote_revenue',
				'title'=>trans('admin.vote_revenue'),
			],
			[
				'name'=>'bfot_revenue',
				'data'=>'bfot_revenue',
				'title'=>trans('admin.bfot_revenue'),
			],
            [
	                'name' => 'created_at',
	                'data' => 'created_at',
	                'title' => trans('admin.created_at'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
	            
	                    [
	                'name' => 'actions',
	                'data' => 'actions',
	                'title' => trans('admin.actions'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
    	 ];
			}

	protected function filename()
	    {
	        return 'contacts_' . time();
	    }
    	
}