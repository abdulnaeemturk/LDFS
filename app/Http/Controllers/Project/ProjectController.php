<?php

namespace App\Http\Controllers\Project;


use App\RepositoryInterfaces\Project\ProjectRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectrepository;
    protected $perpage;
    /**
     * @param: LeaveTypeRepositoryInterface  $LeaveTypeRepository;
     */
    public function __construct(ProjectRepositoryInterface $projectrepository)
    {
        $this->projectrepository = $projectrepository;
        $this->perpage = 2;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = $this->projectrepository->all();
        return view('Project.index', [
            'data' => $data
        ]);
        
        // return $result;
        //
        // $data = [
            //     "name"=>"Naeem",
            //     "kobo_form_id"=>"k34324kk",
            //     "village"=>"435gfdvxg34",
            // ];
            
            // $result = $this->projectrepository->create($data);
            // return $result;
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public  function create()
        {
            //
            
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        // return "Comming here";
        //
        $data = $request->only($this->projectrepository->fillables());
        
        $result = $this->projectrepository->create($data);
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // abort("not working");
        $result = $this->projectrepository->show($id);
        return $result;
        
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
        
        $data = $request->only($this->projectrepository->fillables());        
        $result = $this->projectrepository->update($data, $id);
        return response()->json("Updated");
        return $result;
        
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->projectrepository->delete($id);
        return response()->json("Deleted");
    }
    
    public function fetchRecords($perpage = 10, $pagenumber =1 , $fulltableorrecords = 0)
    {

        $data = $this->projectrepository->recordsWithPagination($perpage, ['*'], 'page', $pagenumber);
        // return response()->json($data['links']);
        return response()->json(view('Project.partials.table',[
            'data' => $data
        ])->render());
        // return $this->projectrepository->recordsWithPagination($perpage, ['*'], 'page', $pagenumber);
    }
}
    