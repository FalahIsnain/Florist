<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\floristModel;
use App\Modules\Admin\Models\buketModel;
use App\Modules\Admin\Models\jenisModel;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use function PHPUnit\Framework\returnSelf;

class Florist extends BaseController
{
	protected $floristModel;
	protected $jenisModel;
	protected $buketModel;
	public function __construct()
	{
		$this->floristModel = new floristModel();
		$this->buketModel = new buketModel();
		$this->jenisModel = new jenisModel();
	}

	public function index()
	{
		helper(['form', 'url']);
		$currPage = $this->request->getVar('page_bunga') ? $this->request->getVar('page_bunga') : 1;
		$data = [
			'title' => 'Data Penjualan',
			'florist' => $this->floristModel->getBunga(),
			'pager' => $this->floristModel->pager,
			'currentPage' => $currPage

		];
		return view('App\Modules\Admin\Views\florist\index', $data);
	}


	public function create()
	{
		helper(['form', 'url']);
		$data = [
			'title' => 'tambah data penjualan',
			'validation' => \Config\Services::validation(),
			'jenis' => $this->floristModel->getJenis(),
			'buket' => $this->floristModel->getBuket(),

		];
		return view('App\Modules\Admin\Views\florist\create', $data);
	}

	public function save()
	{
		helper(['form', 'url']);
		if (!$this->validate([
			'nama_produk' => [
				'rules' => 'required|is_unique[bunga.nama_produk]',
				'errors' => [
					'required' => 'nama produk harus diisi',
					'is_unique'	=> 'nama produk sudah ada'
				]
			],
			'harga' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'nama produk harus diisi',
					'numeric'	=> 'pastikan menginput angka'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
				'errors' => [
					'max_size'	=> 'Ukuran terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]

			],
			'detail_lengkap' => [
				'rules' => 'max_size[detail_lengkap,5024]|ext_in[detail_lengkap,pdf,docx]',
				'errors' => [
					'max_size'	=> 'Ukuran terlalu besar',
					'ext_in' => 'Yang anda pilih bukan pdf/docx'
				]
			]


		])) {
			return redirect()->to(base_url('Florist/create'))->withInput();
		}
		//gambar
		$fileGambar = $this->request->getFile('gambar');


		if ($fileGambar->getError() == 4) {
			$namaGambar = 'default.png';
		} else {
			$namaGambar = $fileGambar->getRandomName();
			$fileGambar->move('img/upload', $namaGambar);
		}

		//dokumen
		$filedetail = $this->request->getFile('detail_lengkap');
		if ($filedetail->getError() == 4) {
			$namadetail = 'detail tidak ada';
		} else {
			$namadetail = $filedetail->getRandomName();
			$filedetail->move('img/pdf', $namadetail);
		}


		$slug = url_title($this->request->getVar('nama_produk'), '-', true);
		$dataInput = [
			'nama_produk' => $this->request->getVar('nama_produk'),
			'slug' => $slug,
			'id_jenis' => $this->request->getVar('jenis'),
			'id_buket' => $this->request->getVar('buket'),
			'harga' => $this->request->getVar('harga'),
			'detail_lengkap' => $namadetail,
			'gambar' => $namaGambar
		];

		$this->floristModel->save($dataInput);
		session()->setFlashdata('pesan', 'data berhasil di save');
		return redirect()->to(base_url('Florist'));
	}


	public function delete()
	{
		helper(['form', 'url']);
		$id = $this->request->uri->getSegment(2);
		$florist = $this->floristModel->find($id);

		if ($florist['gambar'] != 'default.png') {

			unlink('img/upload/' . $florist['gambar']);
		}

		if ($florist['detail_lengkap'] != 'detail tidak ada') {

			unlink('img/pdf/' . $florist['detail_lengkap']);
		}

		$this->floristModel->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('Florist'));
	}


	public function edit()
	{
		$id = $this->request->uri->getSegment(3);
		helper(['form', 'url']);
		$jumlahRecord = $this->floristModel->where('id', $id)->countAllResults();

		if ($jumlahRecord == 1) {

			$dataEdit = [
				'dataEdit' => $this->floristModel->getOne($id),
				'title' => "form update data",
				'validation' => \Config\Services::validation(),
				'jenis' => $this->floristModel->getJenis(),
				'buket' => $this->floristModel->getBuket(),

			];
			return view('App\Modules\Admin\Views\florist\edit', $dataEdit);
		} else {
			session()->setFlashdata('pesan', 'data tidak ada di database');
			return redirect()->to(base_url('Florist'));
		}
	}


	public function update($id)
	{
		helper(['form', 'url']);
		$validation = $this->validate([
			'nama_produk' => [
				'rules' => 'required|is_unique[bunga.nama_produk,id,' . $id . ']',
				'errors' => [
					'required' => 'nama produk harus diisi',
					'is_unique'	=> 'nama produk sudah ada'
				]
			],
			'harga' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'nama produk harus diisi',
					'numeric'	=> 'pastikan menginput angka'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,5024]|is_image[gambar]|mime_in[gambar,image/png,image/jpg]',
				'errors' => [
					'max_size'	=> 'Ukuran terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan png/jpg'
				]

			],
			'detail_lengkap' => [
				'rules' => 'max_size[detail_lengkap,5024]|ext_in[detail_lengkap,pdf,docx]',
				'errors' => [
					'max_size'	=> 'Ukuran terlalu besar',
					'ext_in' => 'Yang anda pilih bukan pdf/docx'
				]
			]
		]);

		if (!$validation) {

			$dataEdit = [
				'dataEdit' => $this->floristModel->getOne($id),
				'title' => "form update data",
				'validation' => \Config\Services::validation(),
				'jenis' => $this->floristModel->getJenis(),
				'buket' => $this->floristModel->getBuket(),

			];

			return view("App\Modules\Admin\Views\florist\edit", $dataEdit);
		} else {

			$fileGambar = $this->request->getFile('gambar');
			if ($fileGambar->getError() == 4) {
				$namaGambar = $this->request->getVar('gambarLama');
			} else {
				//generate nama file
				$namaGambar = $fileGambar->getRandomName();
				//pindahkan 
				$fileGambar->move('img/upload', $namaGambar);
				//hapus file lama
				unlink('img/upload/' . $this->request->getVar('gambarLama'));
			}


			$filedetail = $this->request->getFile('detail_lengkap');
			if ($filedetail->getError() == 4) {
				$namadetail = $this->request->getVar('detailLama');
			} else {
				//generate nama file
				$namadetail = $filedetail->getRandomName();
				//pindahkan 
				$filedetail->move('img/pdf', $namadetail);
				//hapus file lama
				unlink('img/pdf/' . $this->request->getVar('detailLama'));
			}


			$slug = url_title($this->request->getVar('nama_produk'), '-', true);
			$dataUpdate = [
				'id' => $this->request->getVar('id'),
				'nama_produk' => $this->request->getVar('nama_produk'),
				'slug' => $slug,
				'id_jenis' => $this->request->getVar('jenis'),
				'id_buket' => $this->request->getVar('buket'),
				'harga' => $this->request->getVar('harga'),
				'detail_lengkap' => $namadetail,
				'gambar' => $namaGambar
			];

			$jumlahRecord = $this->floristModel->where('id', $dataUpdate['id'])->countAllResults();

			if ($jumlahRecord == 1) {
				$this->floristModel->update($dataUpdate['id'], $dataUpdate);
			} else {
				session()->setFlashdata('pesan', 'data tidak ada di database');
				return redirect()->to(base_url('florist'));
			}
			session()->setFlashdata('pesan', 'data berhasil di save');

			return redirect()->to(base_url('Florist'));;
		}
	}


	public function downloading($detailLengkap, $slug)
	{
		try {
			helper('download');
			return $this->response->download('img/pdf/' . $detailLengkap, NULL);
			return redirect()->to(base_url('Florist/' . $slug));
		} catch (\Exception $e) {
			session()->setFlashdata('pesan', 'detail tidak ada');
			return redirect()->to(base_url('Florist/' . $slug));
			die($e->getMessage());
		}
	}

	public function home()
	{
		helper(['form', 'url']);
		$floristModel = new floristModel();
		$data = [
			'title' => 'Home',
			'florist' => $floristModel->getBunga()
		];

		return view('App\Modules\Admin\Views\florist\home', $data);
	}

	public function about()
	{
		helper(['form', 'url']);
		$data = [
			'title' => 'About me'
		];
		return view('App\Modules\Admin\Views\florist\about', $data);
	}

	public function contact()
	{
		helper(['form', 'url']);
		$data = [
			'title' => "contact Us"

		];
		return view('App\Modules\Admin\Views\florist\contact', $data);
	}
}
