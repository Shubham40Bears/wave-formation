<?php

namespace App\Http\Controllers;

use App\Models\VcfCard;
use App\Models\VcfProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VcfCardController extends Controller
{
    public function show($profile_code)
    {
        $vcfCard = VcfProfileData::where('profile_code', $profile_code)->firstOrFail();
        $vcfData = '';
        if($vcfCard->type === 'business') {
            $vcfData = $this->generateVcf($vcfCard->toArray());
        }
        if($vcfCard->secret_mode && !Session::has('secret_verified')){
            return view('vcf_profiles.secret', compact('profile_code'));
        }
        Session::forget('secret_verified');
        return view('vcf_profiles.'.$vcfCard->card_type, compact('vcfCard','vcfData'));
    }

    /**
     * Generate the VCF data from the VcfCard model.
     *
     * @param  VcfCard  $vcfCard
     * @return string
     */
    public function generateVcf(array $data)
    {
        // Decode sns_links from JSON string to an array
        $snsLinks = is_array($data['sns_links']) ? $data['sns_links'] : json_decode($data['sns_links'], true);

        // Start building the VCF data
        $vcf = "BEGIN:VCARD\n";
        $vcf .= "VERSION:3.0\n";
        $vcf .= "N:{$data['last_name']};{$data['first_name']};;;\n";
        $vcf .= "FN:{$data['first_name']} {$data['last_name']}\n";

        // Add organization and designation
        if (!empty($data['company_name'])) {
            $vcf .= "ORG:{$data['company_name']}\n";
        }
        if (!empty($data['designation'])) {
            $vcf .= "TITLE:{$data['designation']}\n";
        }

        // Add profile description as a note
        if (!empty($data['profile_description'])) {
            $vcf .= "NOTE:{$data['profile_description']}\n";
        }

        // Add contact number
        if (!empty($data['contact_number'])) {
            $vcf .= "TEL;TYPE=CELL:{$data['contact_number']}\n";
        }

        // Add photo URL
        if (!empty($data['photo_url'])) {
            $photoUrl = base64_encode(file_get_contents($data['photo_url'])); // Generate full URL if needed
            $vcf .= "PHOTO;ENCODING=b:$photoUrl\n";
        }

        // Add social links
        if (!empty($snsLinks)) {
            foreach ($snsLinks as $sns) {
                if (!empty($sns['medium']) && !empty($sns['link'])) {
                    $medium = ucfirst($sns['medium']);
                    $vcf .= "URL;TYPE={$medium}:{$sns['link']}\n";
                }
            }
        }

        $vcf .= "END:VCARD";

        return $vcf;
    }

    public function unlock(Request $request, $vcf_code){
        $vcfCard = VcfProfileData::where('profile_code', $vcf_code)->firstOrFail();
        if(Hash::check($request->secretCode, $vcfCard->secret_code)){
            Session::put('secret_verified', true);
            return response()->json(['message' => 'Secret code matched'], 200);
        } else {
            return response()->json(['message' => 'Secret code mismatch'], 500);
        }
    }

}
