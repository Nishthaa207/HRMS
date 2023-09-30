<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\controllers\CandidateController;
use App\Models\Candidate;

use DB;
// use Auth;
class CandidateController extends Controller
{        
    public function index()
    {   //dd(1);
        $candidate = DB::table('candidate')->where('status',1)->get();
        return view('candidates\index',[
            'candidate' => $candidate
        ]);
    }
   /**
*     * Show the form for creating a new resource.
    */
    public function create() {
        //
        //dd('inside create ');
        return view ('candidates\create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //step 1 
        //get all the data from request and store it in variables
        //HAndeled !empty because a is passed from form (feilds left empty) toh database mei null chala jaaye
        $name = !empty($request->name)?$request->name:NULL;
        $email = !empty($request->email)?$request->email:NULL;
        $mobile = !empty($request->mobile)?$request->mobile:NULL;
        $gender = !empty($request->gender)?$request->gender:NULL;
        $address = !empty($request->address)?$request->address:NULL;
        $status = !empty($request->Status)?$request->Status:NULL;
        $sequence = !empty($request->sequence)?$request->sequence:NULL;
        $created_by = 1;
        $updated_by = 1;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        
        //step 2
        //create an array to store data in database
        $insert_arr = [
            'name'       => $name,
            'email'      => $email,
            'mobile'     => $mobile,
            'gender'     => $gender,
            'address'    => $address,
            'status'     => $status,
            'sequence'   => $sequence,
            'created_by' => $created_by,
            'updated_by' => $updated_by,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
        //step 3 
        //store in database , run query
        // $query = DB::table('candidate')->create($insert_arr);
        $query = DB::table('candidate')->insert($insert_arr);
        //step 4
        //check if data is inserted or not
        if($query) {
            return redirect('candidate')->with('success', 'Candidate created successfully');
        }
        else {
            return redirect()->back()->with('error', 'Error creating candidate');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Find the candidate by ID
            $candidate = candidate::findOrFail($id);
    
            // Assuming you have a 'show' view, pass the candidate data to it
            return view('candidates.show', compact('candidate'));
        } catch (\Exception $e) {
            // Log the error or handle it in a way that makes sense for your application
            return redirect()->route('candidates.index')->with('error', 'Candidate not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {  
            $candidate = Candidate::findOrFail($id);
            return view('candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $candidate = Candidate::findOrFail($id);

    $candidate->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'mobile' => $request->input('mobile'),
        'gender' => $request->input('gender'),
        'address' => $request->input('address'),
        'status' => $request->input('Status'),
        'sequence' => $request->input('sequence'),
        'updated_by' => 1,
        'updated_at' => now(),
    ]);
    return redirect()->route('candidate.index')->with('success', 'Candidate updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $candidate = Candidate::findOrFail($id);
    $candidate->delete();

    return redirect()->route('candidate.index')->with('success', 'Candidate deleted successfully');
}
}