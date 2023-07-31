<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    // Create a new QR code entry
    // QrCode::create([
    // 'farmers_id' => 1,
    // 'qr_image' => 'path/to/qr-image.png',
    // ]);

    // // Access the farmer profile related to a QR code entry
    // $qrCode = QrCode::find(1);
    // $farmerProfile = $qrCode->farmerProfile; // This will retrieve the related FarmersProfile instance


    protected $table = 'qr_code';

    protected $fillable = [
        'farmers_id',
        'qr_image',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmers_id', 'id');
    }
}
