<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class NilaiEci extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Users_model');
        $this->load->model('mapel_model');
        $this->load->model('kelas_model');
        $this->load->model('walas_model');
        $this->load->model('nilaiEci_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->Users_model->get_user_auth($this->session->userdata('username')),
            'kelas' => $this->kelas_model->get_kelas(),
            'sub_kelas' => $this->kelas_model->get_sub_kelas()
        ];

        $this->load->view('templates/_header', $data);
        $this->load->view('templates/_navbar');
        $this->load->view('templates/_sidebar');
        $this->load->view('pages/nilai_eci');
        $this->load->view('templates/_footer');
    }

    /**
     * method controller download template
     */
    public function download_template()
    {
        $kelas_id = $_GET['kelas_id'];
        $tahun_ajaran = $_GET['tahun_ajaran'];
        $semester = $_GET['semester'];
        $bulan = $_GET['bulan'];
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
            ]
        ];

        $kelas = $this->nilaiEci_model->get_identitas_kelas($kelas_id)[0]['kelas'];
        $judul = "NILAI ECI KELAS " . $kelas . " | " . strtoupper($bulan) . " SEMESTER " . $semester . " " . $tahun_ajaran;
        $sheet->setCellValue('A1', $judul);
        $sheet->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai F1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $sheet->getStyle('A1')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ],
        ]);

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "NIS");
        $sheet->setCellValue('C3', "NAMA");
        $sheet->setCellValue('D3', "LISTENING");
        $sheet->setCellValue('E3', "READING");
        $sheet->setCellValue('F3', "SPEAKING");
        $sheet->setCellValue('G3', "WRITING");
        $sheet->setCellValue('H3', "DESCRIBE/VOCAB");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        $sheet->getStyle('G3')->applyFromArray($style_col);
        $sheet->getStyle('H3')->applyFromArray($style_col);

        // Isi row dari db kelas
        $siswa = $this->nilaiEci_model->get_siswa_kelas($kelas_id);
        $no = 1;
        $row = 4;
        foreach ($siswa as $s) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $s['nis']);
            $sheet->setCellValue('C' . $row, $s['nama']);
            $sheet->setCellValue('D' . $row, '');
            $sheet->setCellValue('F' . $row, '');
            $sheet->setCellValue('G' . $row, '');
            $sheet->setCellValue('H' . $row, '');

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $row)->applyFromArray($style_row);
            $sheet->getStyle('B' . $row)->applyFromArray($style_row);
            $sheet->getStyle('C' . $row)->applyFromArray($style_row);
            $sheet->getStyle('D' . $row)->applyFromArray($style_row);
            $sheet->getStyle('E' . $row)->applyFromArray($style_row);
            $sheet->getStyle('F' . $row)->applyFromArray($style_row);
            $sheet->getStyle('G' . $row)->applyFromArray($style_row);
            $sheet->getStyle('H' . $row)->applyFromArray($style_row);

            $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

            $no++;
            $row++;
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(30);
        $sheet->getColumnDimension('C')->setWidth(45);
        $sheet->getColumnDimension('D')->setWidth(16);
        $sheet->getColumnDimension('E')->setWidth(16);
        $sheet->getColumnDimension('F')->setWidth(16);
        $sheet->getColumnDimension('G')->setWidth(16);
        $sheet->getColumnDimension('H')->setWidth(16);

        // Set judul file excel nya
        // $sheet->setTitle("Template Nilai ECI Kelas " . $kelas);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=Template Nilai ECI $kelas ($bulan $tahun_ajaran).xlsx");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
