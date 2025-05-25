<?php
namespace App\Controllers;

use App\Models\{UserModel, DetailAplikanModel, DetailAsesorModel};
use App\Models\View\ViewAplikan;

use Dompdf\Dompdf;
use Dompdf\Options;

class ExportController extends BaseController
{
    public function exportPdf()
    {
        $data = [
            'judul' => 'Surat Keputusan Pimpinan',
            'tanggal' => $this->request->getPost('date'),
            'payment_type' => $this->request->getPost('payment_type')
        ];

        // Load view jadi HTML
        $html = view('export_template', $data);

        // Setup Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setBody($dompdf->output());
    }
}