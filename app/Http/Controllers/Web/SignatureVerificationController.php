<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SignatureVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignatureVerificationController extends Controller
{

    private $model;

    public function __construct(SignatureVerification $model)
    {
       $this->model = $model;
    }

   
    /**
    * Display rozcestnik
    */
    public function home()
    {

        return view('signature-verification.home');
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
        //dd($request->input('signatures'));  
        
        

$signatureId = DB::table('books_on_signature_authenticity_declarations')->insertGetId([
    'signature_created_date' => date('Y-m-d'),
]);

foreach ($request->input('signatures') as $data) {
    
    if (isset($data['id'])) {
        // UPDATE stávajícího člověka
        DB::table('customers')
            ->where('id', $data['id'])
            ->update([
                'lastname' => $data['lastname'],
                'firstname' => $data['firstname'],
                'dob' => date('Y-m-d', strtotime($data['dob'])),
                'pob' => $data['pob'],
                'street' => $data['street'],
                'city' => $data['city'],
                'gender' => $data['gender'],
                'postcode' => $data['postcode'],
                'document_type' => $data['document_type'],
                'document_number' => $data['document_number'],
            ]);
        $customerId = $data['id'];

    } else {
        // INSERT nového člověka
        $customerId = DB::table('customers')->insertGetId([
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'dob' => date('Y-m-d', strtotime($data['dob'])),
            'pob' => $data['pob'],
            'street' => $data['street'],
            'city' => $data['city'],
            'gender' => $data['gender'],
            'postcode' => $data['postcode'],
            'document_type' => $data['document_type'],
            'document_number' => $data['document_number'],
        ]);
    }

    // Vložení do pivot tabulky
    DB::table('signature_customer')->insert([
        'customer_id' => $customerId,
        'signature_id' => $signatureId,
    ]);



 
 //$signatureId = 123; // ID konkrétní smlouvy, kterou hledáš

}

$data = DB::select("
    SELECT 
        s.id AS smlouva_id,
        DATE_FORMAT(s.signature_created_date, '%e. %c. %Y') AS signature_created_date,
        c.id AS customer_id,
        c.firstname,
        c.lastname,
        c.dob,
        DATE_FORMAT(c.dob, '%e. %c. %Y') AS dob,
        c.street,
        c.city,
        c.postcode,
        c.pob,
        c.document_number,
        c.gender,
        dt.name AS document_type
    FROM books_on_signature_authenticity_declarations s
    JOIN signature_customer sc ON s.id = sc.signature_id
    JOIN customers c ON sc.customer_id = c.id
    JOIN document_types dt ON c.document_type = dt.id
    WHERE s.id = ?
", [$signatureId]);



 return view('signature-verification.show',['customers' => $data]);

        
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
