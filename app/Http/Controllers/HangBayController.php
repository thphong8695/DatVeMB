<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HangBay;
use DB;
use Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HangBayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:hangbay-list|hangbay-create|hangbay-edit|hangbay-delete', ['only' => ['index','store']]);
         $this->middleware('permission:hangbay-create', ['only' => ['create','store']]);
         $this->middleware('permission:hangbay-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:hangbay-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $hangbay = HangBay::orderBy('id','DESC')->get();
        return view('hangbay.index',compact('hangbay'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hangbay.create');
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
            'name' => 'required|max:255',
            
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'name' => 'Tên hãng bay',
        ]
        );
        
        $input = $request->all();
        $name['slug'] = SlugService::createSlug(HangBay::class, 'slug', $input['name']);
        $hangbay = HangBay::create($input);
        return redirect()->route('hangbay.index')
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
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hangbay = HangBay::findOrFail($id);

        return view('hangbay.edit',compact('hangbay'));
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
            'name' => 'required|max:255',
        ],
        [
            'required' => ':attribute Không được để trống',
            'max' => ':attribute Tối đa :max ký tự',
        ],
        [
            'name' => 'Tên hãng bay',
        ]
        );

        $hangbay = HangBay::find($id);
        $input = $request->all();
        $name['slug'] = SlugService::createSlug(HangBay::class, 'slug', $input['name']);
        
        $hangbay->update($input);
        return redirect()->route('hangbay.index')
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
        HangBay::findOrFail($id)->delete();
        return redirect()->route('hangbay.index')
                        ->with('success','Deleted successfully');
    }
    
}