<?php

    // Reference the Dompdf namespace
    use Dompdf\Dompdf;
    
    class wisata_admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin_model');
            $this->load->library('session'); 
            $this->load->database();          
            $this->load->helper('url');
            $this->load->library('excel');            

            date_default_timezone_set('Asia/Jakarta');
        }

        public function index()
        {
            $akses_wilayah = $_SESSION['akses_wilayah'];
            $query['hasil'] = $this->admin_model->getDataWisata($akses_wilayah);

            $this->load->view('admin/header');
            $this->load->view('admin/wisata_admin', $query);
            $this->load->view('admin/footer');            
        }
        
        public function hapusWisataAdmin($idWisata)
        {         
            $id = $idWisata;   
            $data = array (
                'status' => 'hapus'
            );

            $this->admin_model->deleteDataWisata($id, $data);
            redirect('admin/wisata_admin');
        }

        public function exportExcel()
        {
            $nama_kabupaten = $_SESSION['nama_kabupaten'];

            $excel = new PHPExcel();
            
            $excel->getProperties()->setCreator('XYZ')
                        ->setLastModifiedBy('XYZ')
                        ->setTitle("Data Tempat Wisata")
                        ->setSubject("Wisata Admin")
                        ->setDescription("Semua Data Tempat Wisata")
                        ->setKeywords("Data Tempat Wisata");

            // Buat sebuah variable untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'E1E0F7')
                ),

                'font' => array('bold', true),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),

                'borders' => array(
                    'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER),
                'borders' => array(
                    'outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            // Set cell A1
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Tempat Wisata " .$nama_kabupaten);
            // Set merge cell A1 - E1
            $excel->getActiveSheet()->mergeCells('A1:K1');
            // Set bold cell A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            // Set font size 15 cell A1 
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
            // Set text center cell A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            // Set cell A3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "Tanggal Cetak : " .date("d F Y"));

            // Buat Header table pada baris 3
            // Set cell A4
            $excel->setActiveSheetIndex(0)->setCellValue('A4', "Id_wisata");
            // Set cell B4
            $excel->setActiveSheetIndex(0)->setCellValue('B4', "Id_kabupaten");
            // Set cell C4
            $excel->setActiveSheetIndex(0)->setCellValue('C4', "Id_kecamatan");
            // Set cell D4
            $excel->setActiveSheetIndex(0)->setCellValue('D4', "Id_kelurahan");
            // Set cell E4
            $excel->setActiveSheetIndex(0)->setCellValue('E4', "Nama_wisata");
            // Set cell F4
            $excel->setActiveSheetIndex(0)->setCellValue('F4', "Latitude");
            // Set cell G4
            $excel->setActiveSheetIndex(0)->setCellValue('G4', "Langitude");
            // Set cell H4
            $excel->setActiveSheetIndex(0)->setCellValue('H4', "Alamat");
            // Set cell I4
            $excel->setActiveSheetIndex(0)->setCellValue('I4', "No_tlp");
            // Set cell J4
            $excel->setActiveSheetIndex(0)->setCellValue('J4', "Tiket_dewasa");
            // Set cell K4
            $excel->setActiveSheetIndex(0)->setCellValue('K4', "Tiket_anak");

            // Apply style header yang telah dibuat ke masing2 cell header
            $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);

            $akses_wilayah = $_SESSION['akses_wilayah'];
            $dataWisata = $this->admin_model->getDataWisata($akses_wilayah);

            // Set isi table pada baris 5
            $baris = 5;

            foreach($dataWisata->result_array() as $value)
            {
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$baris, $value['id_wisata']);
                $excel->setActiveSheetIndex(0)->setCellValue('B'.$baris, $value['id_kabupaten']);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$baris, $value['id_kecamatan']);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$baris, $value['id_kelurahan']);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$baris, $value['nama_wisata']);
                $excel->setActiveSheetIndex(0)->setCellValue('F'.$baris, $value['latitude']);
                $excel->setActiveSheetIndex(0)->setCellValue('G'.$baris, $value['langitude']);
                $excel->setActiveSheetIndex(0)->setCellValue('H'.$baris, $value['alamat']);
                $excel->setActiveSheetIndex(0)->setCellValue('I'.$baris, $value['no_tlp']);
                $excel->setActiveSheetIndex(0)->setCellValue('J'.$baris, $value['tiket_dewasa']);
                $excel->setActiveSheetIndex(0)->setCellValue('K'.$baris, $value['tiket_anak']);

                $baris++;
            }
            
            // Set height semua kolom menjadi auto
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi Landscape
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel
            $excel->getActiveSheet()->setTitle("Laporan Data Tempat Wisata");
            $excel->getActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Tempat Wisata.xlsx"'); 
            header('Cache-Control: max-age=0'); 

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }

        public function exportPdf()
        {
            // Include autoloader
            require_once 'dompdf/autoload.inc.php';            

            // Instantiate and use the dompdf class
            $dompdf = new Dompdf();
            
            // Get output html
            $html = $this->output->get_output();

            // Load pdf library
            $this->load->library('pdf');
            
            // Load HTML content
            $this->dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'landscape');
            
            // Render the HTML as PDF
            $this->dompdf->render();
            
            // Output the generated PDF (1 = download and 0 = preview)
            $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        }
    }
?>