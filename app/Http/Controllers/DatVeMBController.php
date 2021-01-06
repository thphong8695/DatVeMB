<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HangBay;
use App\DatVeMB;
use DB;
use Auth;
use Validator;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatVeExport;

class DatVeMBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:datvemb-list|datvemb-create|datvemb-edit|datvemb-delete', ['only' => ['index','store']]);
         $this->middleware('permission:datvemb-create', ['only' => ['create','store']]);
         $this->middleware('permission:datvemb-edit', ['only' => ['updateModal']]);
         $this->middleware('permission:datvemb-updatett', ['only' => ['edit','update']]);

         $this->middleware('permission:datvemb-delete', ['only' => ['destroy']]);
         $this->middleware('permission:datvemb-export', ['only' => ['getExport','postExport']]);

    }
    public function index(Request $request)
    {
        $hangbay = HangBay::orderBy('id','DESC')->pluck('name','id');
        $soluong =[0,1,2,3,4,5,6,7,8,9,10];
        $datvemb = DatVeMB::orderBy('updated_at','DESC')->paginate(10);
        if( empty($request->has( $request->all() )) )
        {
            $query = DatVeMB::orderBy('updated_at','DESC');
            $from = (isset($request->from) ? Carbon::parse($request->from)->format('Y-m-d') : NULL);
            $to = (isset($request->to) ? Carbon::parse($request->to)->format('Y-m-d') : NULL);
            if (isset($from) && isset($to)) 
            {
                $query = $query->WhereBetween('thoigiandat', [$from.' 00:00:00',$to .' 23:59:59']);
            }
            
            $sdt_goilen = $request->input('sdt_goilen');
            if (isset($sdt_goilen)) 
            {
                $query = $query->where("sdt_goilen",'like','%'.$sdt_goilen.'%');
            }
            $sdt_lienhe = $request->input('sdt_lienhe');
            if (isset($sdt_lienhe)) 
            {
                $query = $query->where("sdt_lienhe",'like','%'.$sdt_lienhe.'%');
            }
           
            $hangbay_id = $request->input('hangbay_id');
            if (isset($hangbay_id)) {
                $query = $query->whereHas('HangBay',function($q) use($hangbay_id){
                    $q->where("id",$hangbay_id);
                });
            }
            $loaive = $request->input('loaive');
            if (isset($loaive)) 
            {
                $query = $query->where("loaive",$loaive);
            }
            $soluong_nguoilon = $request->input('soluong_nguoilon');
            if (isset($soluong_nguoilon)) 
            {
                $query = $query->where("soluong_nguoilon",$soluong_nguoilon);
            }
            $soluong_treem = $request->input('soluong_treem');
            if (isset($soluong_treem)) 
            {
                $query = $query->where("soluong_treem",$soluong_treem);
            }
            $soluong_embe = $request->input('soluong_embe');
            if (isset($soluong_embe)) 
            {
                $query = $query->where("soluong_embe",$soluong_embe);
            }
            $madatcho = $request->input('madatcho');
            if (isset($madatcho)) 
            {
                $query = $query->where("madatcho",'like','%'.$madatcho.'%');
            }
            $taikhoanthanhtoan = $request->input('taikhoanthanhtoan');
            if (isset($taikhoanthanhtoan)) 
            {
                $query = $query->where("taikhoanthanhtoan",'like','%'.$taikhoanthanhtoan.'%');
            }
            $tenkhachhang = $request->input('tenkhachhang');
            if (isset($tenkhachhang)) 
            {
                $query = $query->where("tenkhachhang",'like','%'.$tenkhachhang.'%');
            }
            $tinhtrangve = $request->input('tinhtrangve');
            if (isset($tinhtrangve)) 
            {
                $query = $query->where("tinhtrangve",$tinhtrangve);
            }
            $thongtinkhac = $request->input('thongtinkhac');
            if (isset($thongtinkhac)) 
            {
                $query = $query->where("thongtinkhac",'like','%'.$thongtinkhac.'%');
            }

            $datvemb = $query->paginate(10);
            $querystringArray = $request->only([
                                'from',
                                'to',
                                'sdt_goilen',
                                'sdt_lienhe',
                                'hangbay_id',
                                'loaive',
                                'soluong_nguoilon',
                                'soluong_treem',
                                'soluong_embe',
                                'madatcho',
                                'taikhoanthanhtoan',
                                'tenkhachhang',
                                'tinhtrangve',
                                'thongtinkhac'
                            ]);
            $datvemb->appends($querystringArray);   
        }
        return view('datvemb.index',compact('hangbay','soluong','datvemb'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hangbay = DatVeMB::orderBy('id','DESC')->get();
        return view('datvemb.create',compact('hangbay'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sdt_goilen' => 'required|max:255',
            'tenkhachhang' => 'required|max:255',
            'hangbay_id'  => 'required|max:255',
            'loaive'=> 'required|max:255',
            'tinhtrangve'=> 'required|max:255',
            
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'sdt_goilen' => 'Số điện thoại gọi lên',
            'tenkhachhang' => 'Tên khách hàng',
            'hangbay_id' =>'Hãng bay',
            'loaive'=> 'Loại vé',
            'tinhtrangve'=> 'Tình trạng vé',
        ]
        );
        
        $input = $request->all();
        
        $input['thoigiandat'] = Carbon::now();
        $input['soluong_nguoilon'] = (isset($request->soluong_nguoilon) ? $request->soluong_nguoilon : 0);
        $input['soluong_treem'] = (isset($request->soluong_treem) ? $request->soluong_treem : 0);
        $input['soluong_embe'] = (isset($request->soluong_embe) ? $request->soluong_embe : 0);
        $input['lichsutraodoi'] = Auth::user()->username.' ['.Carbon::now()->format('Y/m/Y H:i:s a').']: Thêm mới thuê bao: '.$request->sdt_goilen.'<br>';
        $input['ketqua'] = 'Mới nhập';
        $input['user_id'] = Auth::user()->id;
        $datvemb = DatVeMB::create($input);
        return redirect()->route('datvemb.index')
                    ->with('success','Created successfully');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datvemb = DatVeMB::findOrFail($id);
        $hangbay = HangBay::where('id',$datvemb->hangbay_id)->first();
        return response()->json(['datvemb' => $datvemb, 'hangbay' => $hangbay]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hangbay = HangBay::orderBy('id','DESC')->pluck('name','id');
        $soluong =[0,1,2,3,4,5,6,7,8,9,10];
        $datvemb = DatVeMB::findOrFail($id);

        return view('datvemb.edit',compact('hangbay','soluong','datvemb'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sdt_goilen' => 'required|max:255',
            'tenkhachhang' => 'required|max:255',
            'hangbay_id'  => 'required|max:255',
            'loaive'=> 'required|max:255',
            'tinhtrangve'=> 'required|max:255',
            
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'sdt_goilen' => 'Số điện thoại gọi lên',
            'tenkhachhang' => 'Tên khách hàng',
            'hangbay_id' =>'Hãng bay',
            'loaive'=> 'Loại vé',
            'tinhtrangve'=> 'Tình trạng vé',
        ]
        );
        $datvemb = DatVeMB::find($id);
        $input = $request->all();
        
        $input['soluong_nguoilon'] = (isset($request->soluong_nguoilon) ? $request->soluong_nguoilon : 0);
        $input['soluong_treem'] = (isset($request->soluong_treem) ? $request->soluong_treem : 0);
        $input['soluong_embe'] = (isset($request->soluong_embe) ? $request->soluong_embe : 0);
        
        
        $datvemb->update($input);
        return redirect()->route('datvemb.index')
                        ->with('success','Updated successfully');
    }
    public function updateModal(Request $request)
    {
        $this->validate($request, [
            'ketqua' => 'required|max:255',
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'ketqua' => 'Kết quả',
        ]
        );

        $datvemb = DatVeMB::findOrFail($request->id);
        if($request->ketqua && $request->ketqua != $datvemb->ketqua)
        {
            $datvemb->lichsutraodoi = $datvemb->lichsutraodoi.''.Auth::user()->username.' ['.Carbon::now()->format('Y/m/Y H:i:s a').']: chuyển kết quả từ ' .$datvemb->ketqua.' thành '.$request->ketqua.'<br>';
            $datvemb->ketqua = $request->ketqua;
        }

        if($request->lichsutraodoi)
        {
            $datvemb->lichsutraodoi = $datvemb->lichsutraodoi.''.Auth::user()->username.' ['.Carbon::now()->format('Y/m/Y H:i:s a').']: '.$request->lichsutraodoi.'<br>';
        }
        $datvemb->updated_at = Carbon::now();
        $datvemb->save();
        return redirect()->route('datvemb.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DatVeMB::findOrFail($id)->delete();
        return redirect()->route('datvemb.index')
                        ->with('success','Deleted successfully');
    }
    public function getExport()
    {
        return view('datvemb.export');
    }
    public function postExport(Request $request)
    {
        $this->validate($request, [
            'from' => 'required|max:255',
            'to' => 'required|max:255',
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'from' => 'Ngày bắt đầu',
            'to' => 'Ngày kết thúc',
        ]
        );
        var_dump(libxml_use_internal_errors(true));
        ob_end_clean(); // this
        ob_start(); 
        $from = (isset($request->from) ? Carbon::parse($request->from)->format('Y-m-d') : NULL);
        $to = (isset($request->to) ? Carbon::parse($request->to)->format('Y-m-d') : NULL);
        $datve = DatVeMB::WhereBetween('created_at', [$from,$to])->orWhereBetween('created_at', [$to,$from])->get();
        if($datve->count() > 0)
        {    
            try{
                return Excel::download(new DatVeExport($from,$to), 'Danh sách đặt lịch từ '.($from).' - '.($to).'.xlsx');
            }
            catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $exception) {
                return back()->withError($exception->getMessage())->withInput();
            }
        }
        else
        {
            return back()->with('error','Không có lượt đặt tồn tại theo ngày đã chọn');
        }    
    }

    
}