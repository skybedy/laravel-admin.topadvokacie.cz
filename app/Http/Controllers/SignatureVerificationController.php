<?php

namespace App\Http\Controllers;

use App\Models\SignatureVerification;
use Illuminate\Http\Request;

class SignatureVerificationController extends Controller
{

    private $model;

    public function __construct(SignatureVerification $model)
    {
       $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('signature-verification.index',['signatureVerifications' => $this->model->fetchAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       // dd($this->model->fetchById($request->id));
        return view('signature-verification.show',['customer' => $this->model->fetchById($request->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SignatureVerification $signatureVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SignatureVerification $signatureVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SignatureVerification $signatureVerification)
    {
        //
    }
}
