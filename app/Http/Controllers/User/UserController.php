<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\GeneralRepository;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserIdRequest;
use App\Http\Requests\User\UserPassRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type_user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     /**
     * UserController constructor.
     *
     * @param UserRepository $UserRepository
     */
    public function __construct(UserRepository $UserRepository,GeneralRepository $GeneralRepository)
    {
        $this->UserRepository = $UserRepository;
        $this->GeneralRepository = $GeneralRepository;
        $this->menu_id =2;
        $this->module_name ='User';
        $this->text_module = ['Created','Updated','Update Password','Deleted','Restored','Actived','Deactived'];
    }

    public function locationMenu(Request $request){
        return response()->json($this->GeneralRepository->get_location_and_menu($this->menu_id));
    }

     /**
     * function index.
     *
     */
    public function index(UserRequest $request){


            $search = trim($request->search);
            $criterion = trim($request->criterion);
            $status = ($request->status)? $request->status : 1;
            $profile = ($request->profilesearch)? $request->profilesearch : 'all';
            $location = ($request->location >0)? $request->location : 'all';
            $data = $this->UserRepository->getSearchPaginated($criterion, $search,$status,$profile,$location);
            $typeU = Auth::user()->type_user_id == 1?Type_user::all():Type_user::whereIn('id',[3,5])->get();


            if ($request->ajax()) {
                return view('Users.items.table',['data'=>$data,'dm'=>accesUrl(Auth::user(),$this->menu_id,$location)]);
            }
                return view('Users.index',['data'=>$data,'dm'=>accesUrl(Auth::user(),$this->menu_id,$location),'tu'=>$typeU]);
    }

    /**
     *
     * Return view create
     *
     */
    public function create(UserRequest $request)
    {
        if ($request->ajax()) {
            $type =  Auth::user()->type_user_id == 1?Type_user::all():Type_user::whereIn('id',[2,3])->get();

            return view('Users.create',['type'=>$type,]);
        }
    }

    /**
     * function store for create item.
     *
     */
    public function store(UserStoreRequest $request){
        $data = $this->UserRepository->create($request->input());

        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[0],
                                        "success",
                                        'green',
                                        '1'));
    }

     /**
     *
     * Return view detail
     *
     */
    public function detail(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = User::withTrashed()->find($id);
            return view('Users.detail',['data'=>$data]);
        }
    }

    /**
     *
     * Return view update
     *
     */
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {

            $data = User::find($id);
            $type =  Auth::user()->type_user_id == 1?Type_user::all():Type_user::whereIn('id',[2,3])->get();
            //take locations
           /* $user_locations= User_location::where('user_id',$id)->get();
            $usl = [];
            foreach ($user_locations as $ul) {
               array_push($usl,$ul['location_id']);
            }
            $countries['my'] = Location::whereIn('id',$usl)->get();
            $countries['notMy'] = Location::whereNotIn('id',$usl)->get();*/

            return view('Users.update',['data'=>$data,'type'=>$type]);
        }
    }

     /**
     * function update for update item.
     *
     */
    public function update(UserUpdateRequest $request,$id){

        $data = $this->UserRepository->update($id, $request->only(
            'name',
            'type',
            'last_name',
            'phone',
            'email',
            'locations',
        ));
        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[1],
                                        "success",
                                        'yellow',
                                        '1'));
    }

    /**
     *
     * Return view update Password
     *
     */
    public function editPassword(Request $request,$id)
    {
        if ($request->ajax()) {

            $data = User::where('id',$id)->first();

            return view('Users.password',['data'=>$data]);
        }
    }

     /**
     * function update for update item.
     *
     */
    public function updatePassword(UserPassRequest $request,$id){

        $data = $this->UserRepository->updatePass($id, $request->only(
                    'password',
                ));

        return response()->json(Answer( $data['id'],
                                        $this->module_name,
                                        $this->text_module[2],
                                        "success",
                                        'yellow',
                                        '1'));
    }

    public function change_status(UserIdRequest $request,$id)
    {
        return response()->json($this->UserRepository->updateStatus($request->id));
    }

    public function deleteOrResotore(Request $request,$id)
    {
        $state = $this->UserRepository->deleteOrResotore($id);
        return response()->json(Answer( $id,
                                        $this->module_name,
                                        $this->text_module[$state],
                                        "success",
                                        $state==4?'green':'red',
                                        $state==4?'1':'D'));
    }

    public function get_User(Request $request){
        return response()->json(Auth::user());
    }

    public function upload(Request $request)
    {
        return view('upload');
    }

    public function fromFile(Request $request)
    {
        if($request['json']){
            $data = [];
            $json = $request->file('json');
            $namejson = time().$json->getClientOriginalName();
            $file_path ='/json';
            $json->move(public_path().'/json',$namejson);
            $decode = json_decode(file_get_contents(public_path() . "/json"."/".$namejson), true);
            foreach ($decode as $value) {
                $user = $this->UserRepository->createJson($value);
                array_push($data,$user);
            }
            return response()->json($data, 200);
        }
    }
}
