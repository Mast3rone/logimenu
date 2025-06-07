<?php

namespace App\Helpers;

require_once '../src/lib/phpqrcode/qrlib.php';


class QrHelper
{
    /**
     * Genera un QR code PNG per l'URL fornito.
     *
     * @param string $linkslug Lo slug del ristorante/menu.
     * @param bool $outputImage Se true, stampa direttamente l'immagine PNG. Altrimenti restituisce il path temporaneo.
     * @return string|null
     */
    public static function generateQr(string $linkslug, bool $outputImage = true): ?string
    {
        $url = "https://www.menuviel.com/menu/" . urlencode($linkslug);
        $tempFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'qrcode_' . md5($url) . '.png';

        if (!file_exists($tempFile)) {
            \QRcode::png($url, $tempFile, QR_ECLEVEL_H, 6);
        }

        if ($outputImage) {
            header('Content-Type: image/png');
            readfile($tempFile);
            exit;
        }

        return $tempFile;
    }
}
