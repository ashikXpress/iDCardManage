<?php

namespace App\Http\Controllers;

use App\Models\IdCardCategory;
use App\Models\Officer;
use App\Models\OfficerWorker;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;
use Ramsey\Uuid\Uuid;

class IdCardController extends Controller
{

    public function allCategory(Request $request)
    {
        $data['page_header']='Category list';
        if($request->ajax()){
            $data=IdCardCategory::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($data){

                    $button = '<a href="#" onclick="category_edit('.$data->id.')" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="#" onclick="category_delete('.$data->id.')" class="delete btn btn-danger btn-sm">Delete</a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('id_card.category_list',$data);
    }

    public function addIdCardCategory(){
        $data['page_header']='Add ID Card Category';
        return view('id_card.id_card_categories',$data);
    }

    public function addIdCardCategorySave(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|max:100|unique:id_card_categories'
        ]);
        IdCardCategory::create([
            'category_name'=>$request->category_name
        ]);

        $notification = array(
            'message' => 'Category created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function idCardCategoryEdit(Request $request)
    {
        $data=IdCardCategory::where('id',$request->id)->first();
        return response()->json($data);
    }

    public function idCardCategoryUpdate(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|max:20|unique:id_card_categories,category_name,'.$request->category_id,
            ]);
        IdCardCategory::where('id',$request->category_id)->update([
            'category_name'=>$request->category_name
        ]);
        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function idCardCategoryDelete(Request $request)
    {
        IdCardCategory::where('id',$request->category_id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function allUnit(Request $request)
    {
        $data['page_header']='Unit list';
        if($request->ajax()){
            $data=Unit::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($data){

                    $button = '<a href="#" onclick="unit_edit('.$data->id.')" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="#" onclick="unit_delete('.$data->id.')" class="delete btn btn-danger btn-sm">Delete</a>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('id_card.unit_list',$data);
    }




    public function addUnit()
    {
        $data['page_header']='Add unit';
        return view('id_card.add_unit',$data);
    }
    public function addUnitSave(Request $request)
    {
        $this->validate($request,[
            'unit_name'=>'required|max:100|unique:units',
            'unit_photo'=>'required|image'
        ]);
        $unit_photo = $request->file('unit_photo');
        $filename1 = Uuid::uuid1()->toString().'.'.$unit_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads/unit';
        $unit_photo->move($destinationPath, $filename1);

        Unit::create([
            'unit_name'=>$request->unit_name,
            'unit_photo'=>'uploads/unit/'.$filename1
        ]);
        $notification = array(
            'message' => 'Unit created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.unit')->with($notification);

    }

    public function unitEdit(Request $request)
    {
        $data=Unit::where('id',$request->id)->first();
        return response()->json($data);
    }

    public function unitUpdate(Request $request)
    {
        $this->validate($request,[
            'unit_name'=>'required|max:20|unique:units,unit_name,'.$request->unit_id,
            'unit_photo'=>'nullable|image',
            ]);



        $data=[
            'unit_name'=>$request->unit_name
        ];

        if ($request->unit_photo){
            $unlink_image=Unit::where('id',$request->unit_id)->first();
            unlink('public/'.$unlink_image->unit_photo);
            $unit_photo = $request->file('unit_photo');
            $filename1 = Uuid::uuid1()->toString().'.'.$unit_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads/unit';
            $unit_photo->move($destinationPath, $filename1);
            $data['unit_photo']='uploads/unit/'.$filename1;
        }


        Unit::where('id',$request->unit_id)->update($data);

        $notification = array(
            'message' => 'Unit updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function unitDelete(Request $request)
    {
        $unlink_image=Unit::where('id',$request->unit_id)->first();
        unlink('public/'.$unlink_image->unit_photo);
        Unit::where('id',$request->unit_id)->delete();

        $notification = array(
            'message' => 'Unit deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function allOfficer(Request $request)
    {
        $data['page_header']='Officer list';
        if($request->ajax()){
            $data=Officer::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($data){

                    $button = '<a href="#" onclick="officer_edit('.$data->id.')" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="#" onclick="officer_delete('.$data->id.')" class="delete btn btn-danger btn-sm">Delete</a>';

                    return $button;
                })
                ->editColumn('created_at', function ($data)
                {
                    //change over here
                    return date('d-m-Y', strtotime($data->created_at) );
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('id_card.officer_list',$data);
    }

    public function addOfficer()
    {
        $data['page_header']='Add officer';
        return view('id_card.add_officer',$data);
    }

    public function addOfficerSave(Request $request)
    {

        $this->validate($request,[
            'ba_number'=>'required|max:30|unique:officers',
            'name'=>'required|max:30',
            'designation'=>'required|max:100',
            'unit_or_institute_or_center'=>'required|max:150',
            'current_address'=>'required|max:150',
            'permanent_address'=>'required|max:150',
            'mobile_number'=>'required|max:20|unique:officers',
            'email'=>'required|max:50|unique:officers',
            'service_id_card_photo'=>'required|image',
            'officer_photo'=>'required|image',
            'officer_signature_photo'=>'required|image',
        ]);

        // Upload Image
        $service_id_card_photo = $request->file('service_id_card_photo');
        $filename1 = Uuid::uuid1()->toString().'.'.$service_id_card_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads';
        $service_id_card_photo->move($destinationPath, $filename1);

        $officer_photo = $request->file('officer_photo');
        $filename2 = Uuid::uuid1()->toString().'.'.$officer_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads';
        $officer_photo->move($destinationPath, $filename2);

        $officer_signature_photo = $request->file('officer_signature_photo');
        $filename3 = Uuid::uuid1()->toString().'.'.$officer_signature_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads';
        $officer_signature_photo->move($destinationPath, $filename3);

        $officer=new Officer();
        $officer->ba_number=$request->ba_number;
        $officer->name=$request->name;
        $officer->designation=$request->designation;
        $officer->unit_or_institute_or_center=$request->unit_or_institute_or_center;
        $officer->current_address=$request->current_address;
        $officer->permanent_address=$request->permanent_address;
        $officer->mobile_number=$request->mobile_number;
        $officer->email=$request->email;
        $officer->service_id_card_photo='uploads/'.$filename1;
        $officer->officer_photo='uploads/'.$filename2;
        $officer->officer_signature_photo='uploads/'.$filename3;
        $officer->save();

        $notification = array(
            'message' => 'Officer added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.officer')->with($notification);

    }

    public function officerDelete(Request $request)
    {
        $image_unlink=Officer::where('id',$request->officer_id)->first();
       unlink('public/'.$image_unlink->service_id_card_photo);
       unlink('public/'.$image_unlink->officer_photo);
       unlink('public/'.$image_unlink->officer_signature_photo);

        Officer::where('id',$request->officer_id)->delete();
        $notification = array(
            'message' => 'Officer deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function officerEdit(Request $request)
    {
        $data=Officer::where('id',$request->id)->first();
        return response()->json($data);
    }

    public function officerUpdate(Request $request)
    {
        $this->validate($request,[
            'ba_number'=>'required|max:30|unique:officers,ba_number,'.$request->officer_id,
            'name'=>'required|max:30',
            'designation'=>'required|max:100',
            'unit_or_institute_or_center'=>'required|max:150',
            'current_address'=>'required|max:150',
            'permanent_address'=>'required|max:150',
            'mobile_number'=>'required|max:20|unique:officers,mobile_number,'.$request->officer_id,
            //'email'=>'required|max:50|unique:officers',
            'email' => 'required|max:50|unique:officers,email,'.$request->officer_id,
            'service_id_card_photo'=>'nullable|image',
            'officer_photo'=>'nullable|image',
            'officer_signature_photo'=>'nullable|image',
        ]);

        $data=[
            'ba_number'=>$request->ba_number,
            'name'=>$request->name,
            'designation'=>$request->designation,
            'unit_or_institute_or_center'=>$request->unit_or_institute_or_center,
            'current_address'=>$request->current_address,
            'permanent_address'=>$request->permanent_address,
            'mobile_number'=>$request->mobile_number,
            'email'=>$request->email,
        ];

        $image_unlink=Officer::where('id',$request->officer_id)->first();
        // Upload Image update
        if ($request->service_id_card_photo){
            unlink('public/'.$image_unlink->service_id_card_photo);
            $service_id_card_photo = $request->file('service_id_card_photo');
            $filename1 = Uuid::uuid1()->toString().'.'.$service_id_card_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads';
            $service_id_card_photo->move($destinationPath, $filename1);
            $data['service_id_card_photo']='uploads/'.$filename1;

        }
        if ($request->officer_photo){
            unlink('public/'.$image_unlink->officer_photo);
            $officer_photo = $request->file('officer_photo');
            $filename2 = Uuid::uuid1()->toString().'.'.$officer_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads';
            $officer_photo->move($destinationPath, $filename2);
            $data['officer_photo']='uploads/'.$filename2;

        }
        if ($request->officer_signature_photo){
            unlink('public/'.$image_unlink->officer_signature_photo);
            $officer_signature_photo = $request->file('officer_signature_photo');
            $filename3 = Uuid::uuid1()->toString().'.'.$officer_signature_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads';
            $officer_signature_photo->move($destinationPath, $filename3);
            $data['officer_signature_photo']='uploads/'.$filename3;

        }

        Officer::where('id',$request->officer_id)->update($data);

        $notification = array(
            'message' => 'Officer updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.officer')->with($notification);

    }



    public function officerWorkerCategory(Request $request)
    {
        $data['page_header']='Officer worker list category';

        if($request->ajax()){
            $orders=OfficerWorker::with('officer','category')->where('officer_id','!=',null)->orderBy('created_at','desc')->get();
            return DataTables::of($orders)
                ->addIndexColumn()
                ->editColumn('officer', function($order)
                {
                    return $order->officer->ba_number;
                })
                ->editColumn('category', function($order)
                {
                    return $order->category->category_name;
                })

                ->addColumn('action',function ($orders){
                    $button='<div class="btn btn-group">';
                    $button.='<a  href="#" onclick="worker_photo_link('.$orders->id.')" class="edit btn btn-info btn-sm">Link</a>';
                    $button .= '<a  href="#" onclick="officer_worker_edit('.$orders->id.')" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '<a  href="#" onclick="officer_worker_delete('.$orders->id.')" class="delete btn btn-danger btn-sm">Delete</a>';
                    $button.='</div>';
                    return $button;
                })
                ->editColumn('created_at', function ($orders)
                {
                    return date('d-m-Y', strtotime($orders->created_at) );
                })
            ->editColumn('delivery_date', function ($orders)
            {
                return date('d-m-Y', strtotime($orders->delivery_date) );
            })
                ->editColumn('expiry_date', function ($orders)
                {
                   return date('d-m-Y', strtotime($orders->expiry_date) );
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('id_card.officer_worker_list_category',$data);
    }
    public function officerWorkerUnit(Request $request)
    {
        $data['page_header']='Officer worker list unit';

        if($request->ajax()){
            $orders=OfficerWorker::with('category','unit')->where('unit_id','!=',null)->orderBy('created_at','desc')->get();
            return DataTables::of($orders)
                ->addIndexColumn()
                ->editColumn('category', function($order)
                {
                    return $order->category->category_name;
                })
                ->editColumn('unit', function($order)
                {
                    return $order->unit->unit_name;
                })
                ->addColumn('action',function ($orders){
                    $button='<div class="btn btn-group">';
                    $button.='<a href="#" onclick="worker_photo_link('.$orders->id.')" class="edit btn btn-info btn-sm">Link</a>';
                    $button .= '<a href="#" onclick="officer_worker_edit('.$orders->id.')" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '<a  href="#" onclick="officer_worker_delete('.$orders->id.')" class="delete btn btn-danger btn-sm">Delete</a>';
                    $button.='</div>';
                    return $button;
                })
                ->editColumn('created_at', function ($orders)
                {
                    return date('d-m-Y', strtotime($orders->created_at) );
                })
            ->editColumn('delivery_date', function ($orders)
            {
                return date('d-m-Y', strtotime($orders->delivery_date) );
            })
                ->editColumn('expiry_date', function ($orders)
                {
                   return date('d-m-Y', strtotime($orders->expiry_date) );
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        return view('id_card.officer_worker_list_unit',$data);
    }

    public function addOfficerWorker()
    {
        $data['page_header']='Add officer worker';
        $data['officers']=Officer::select('id','ba_number')->get();
        $data['units']=Unit::select('id','unit_name')->get();
        $data['categories']=IdCardCategory::select('id','category_name')->get();
        return view('id_card.add_officer_worker',$data);
    }

    public function addOfficerWorkerSave(Request $request)
    {
        $rules=[
            'name'=>'required|max:50',
            'id_card_category'=>'required|max:100',
            'father_or_husband'=>'required|max:50',
            'date_of_birth'=>'required|max:50',
            'designation'=>'required|max:100',
            'age'=>'required|max:20',
            'profession'=>'required|max:100',
            'current_address'=>'required|max:200',
            'permanent_address'=>'required|max:200',
            'mobile_number'=>'required|max:20|unique:officer_workers',
            'identification_sign'=>'required|max:100',
            'national_id_or_birth_certificate_no'=>'required|max:100',
            'national_id_or_birth_certificate_photo'=>'required|image',
            'worker_photo'=>'required|image',
            'worker_signature'=>'required|image',
            'delivery_date'=>'required|max:20',
            'expiry_date'=>'required|max:20',
            'ba_or_unit'=>'required',
        ];
        if ($request->ba_or_unit == 1){
            $rules['ba_number'] = 'required';
        }else if ($request->ba_or_unit == 2){
            $rules['unit_name'] = 'required';
        }
        $request->validate($rules);


        if ($request->ba_number){
            $check_body_guard=$request->id_card_category;

            $check_worker=OfficerWorker::where('id_card_category_id',$check_body_guard)->where('officer_id','!=',null)->first();


            if ($check_worker->id_card_category_id>0){

                $check_category=IdCardCategory::find($check_body_guard);

                if (strtolower($check_category->category_name)==='body guard'){

                    $officer_check=Officer::find($request->ba_number);
                    $notification = array(
                        'message' => 'Sorry,'.$officer_check->name.'  taken already body guard',
                        'alert-type' => 'error'
                    );

                    return redirect()->route('add.officer.worker')->with($notification);

                }
            }





        }



        // Upload Image
        $national_id_or_birth_certificate_photo = $request->file('national_id_or_birth_certificate_photo');
        $filename1 = Uuid::uuid1()->toString().'.'.$national_id_or_birth_certificate_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads/worker';
        $national_id_or_birth_certificate_photo->move($destinationPath, $filename1);

        $worker_photo = $request->file('worker_photo');
        $filename2 = Uuid::uuid1()->toString().'.'.$worker_photo->getClientOriginalExtension();
        $destinationPath = 'public/uploads/worker';
        $worker_photo->move($destinationPath, $filename2);

        $worker_signature = $request->file('worker_signature');
        $filename3 = Uuid::uuid1()->toString().'.'.$worker_signature->getClientOriginalExtension();
        $destinationPath = 'public/uploads/worker';
        $worker_signature->move($destinationPath, $filename3);

        OfficerWorker::create([
            'officer_id'=>$request->ba_number,
            'unit_id'=>$request->unit_name,
            'name'=>$request->name,
            'id_card_category_id'=>$request->id_card_category,
            'father_or_husband'=>$request->father_or_husband,
            'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
            'designation'=>$request->designation,
            'age'=>$request->age,
            'profession'=>$request->profession,
            'current_address'=>$request->current_address,
            'permanent_address'=>$request->permanent_address,
            'mobile_number'=>$request->mobile_number,
            'identification_sign'=>$request->identification_sign,
            'national_id_or_birth_certificate_no'=>$request->national_id_or_birth_certificate_no,
            'national_id_or_birth_certificate_photo'=>'uploads/worker/'.$filename1,
            'worker_photo'=>'uploads/worker/'.$filename2,
            'worker_signature'=>'uploads/worker/'.$filename3,
            'delivery_date'=>date('Y-m-d',strtotime($request->delivery_date)),
            'expiry_date'=>date('Y-m-d',strtotime($request->expiry_date)),
        ]);

        $notification = array(
            'message' => 'Officer worker created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.officer.worker')->with($notification);

    }

    public function officerWorkerEdit(Request $request)
    {
        $data=OfficerWorker::where('id',$request->id)->first();
        return response()->json($data);
    }


    public function officerWorkerDelete(Request $request)
    {
        $unlink_image=OfficerWorker::where('id',$request->officer_worker_id)->first();

        unlink('public/'.$unlink_image->national_id_or_birth_certificate_photo);
        unlink('public/'.$unlink_image->worker_photo);
        unlink('public/'.$unlink_image->worker_signature);

        OfficerWorker::where('id',$request->officer_worker_id)->delete();
        $notification = array(
            'message' => 'Officer Worker deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function officerWorkerUpdate(Request $request)
    {
        $rules=[
            'name'=>'required|max:50',
            'father_or_husband'=>'required|max:50',
            'date_of_birth'=>'required|max:50',
            'designation'=>'required|max:100',
            'age'=>'required|max:20',
            'profession'=>'required|max:100',
            'current_address'=>'required|max:200',
            'permanent_address'=>'required|max:200',
            'mobile_number'=>'required|max:20|unique:officer_workers,mobile_number,'.$request->officer_worker_id,
            'identification_sign'=>'required|max:100',
            'national_id_or_birth_certificate_no'=>'required|max:100',
            'national_id_or_birth_certificate_photo'=>'nullable|image',
            'worker_photo'=>'nullable|image',
            'worker_signature'=>'nullable|image',
            'delivery_date'=>'required|max:20',
            'expiry_date'=>'required|max:20',
        ];
        $request->validate($rules);
        $data=[
            'name'=>$request->name,
            'father_or_husband'=>$request->father_or_husband,
            'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
            'designation'=>$request->designation,
            'age'=>$request->age,
            'profession'=>$request->profession,
            'current_address'=>$request->current_address,
            'permanent_address'=>$request->permanent_address,
            'mobile_number'=>$request->mobile_number,
            'identification_sign'=>$request->identification_sign,
            'national_id_or_birth_certificate_no'=>$request->national_id_or_birth_certificate_no,
            'delivery_date'=>date('Y-m-d',strtotime($request->delivery_date)),
            'expiry_date'=>date('Y-m-d',strtotime($request->expiry_date)),
        ];


        $image_unlink=OfficerWorker::where('id',$request->officer_worker_id)->first();


        if ($request->national_id_or_birth_certificate_photo){
            unlink('public/'.$image_unlink->national_id_or_birth_certificate_photo);
            $national_id_or_birth_certificate_photo = $request->file('national_id_or_birth_certificate_photo');
            $filename1 = Uuid::uuid1()->toString().'.'.$national_id_or_birth_certificate_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads/worker';
            $national_id_or_birth_certificate_photo->move($destinationPath, $filename1);
            $data['national_id_or_birth_certificate_photo']='uploads/worker/'.$filename1;


        }
        if ($request->worker_photo){
            unlink('public/'.$image_unlink->worker_photo);
            $worker_photo = $request->file('worker_photo');
            $filename2 = Uuid::uuid1()->toString().'.'.$worker_photo->getClientOriginalExtension();
            $destinationPath = 'public/uploads/worker';
            $worker_photo->move($destinationPath, $filename2);
            $data['worker_photo']='uploads/worker/'.$filename2;
        }
      if ($request->worker_signature){
          unlink('public/'.$image_unlink->worker_signature);
          $worker_signature = $request->file('worker_signature');
          $filename3 = Uuid::uuid1()->toString().'.'.$worker_signature->getClientOriginalExtension();
          $destinationPath = 'public/uploads/worker';
          $worker_signature->move($destinationPath, $filename3);
          $data['worker_signature']='uploads/worker/'.$filename3;
      }

      OfficerWorker::where('id',$request->officer_worker_id)->update($data);
        $notification = array(
            'message' => 'Officer worker update successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function officerWorkerPhotoLink(Request $request)
    {
        $data=OfficerWorker::with('officer')->where('id',$request->id)->first();
        return response()->json($data);
    }
    public function unitWorkerPhotoLink(Request $request)
    {
        $data=OfficerWorker::with('unit')->where('id',$request->id)->first();
        return response()->json($data);
    }

}
