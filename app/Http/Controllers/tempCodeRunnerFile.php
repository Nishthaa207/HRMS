<?php
// public function store(Request $request)
    // {
    //     // candidatecontroller::create([
    //     //     'name' =>   $request->input('name'),
    //     //     'email'=>   $request->input('email'),
    //     //     'mobile'=>  $request->input('mobile'),
    //     //     'gender'=>  $request->input('gender'),
    //     //     'address'=> $request->input('address'),
    //     //     'status'=>  $request->input('status'),
    //     //     'sequence'=>$request->input('sequence')
    //     // ]);
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:candidates',
    //         // Add more validation rules for other fields
    //     ]);
    //     $candidate = new Candidate;
    //     $candidate->name = $validatedData['name'];
    //     $candidate->email = $validatedData['email'];
    //     return redirect()->route('candidates.index')->with('success', 'Candidate created successfully');
    // }