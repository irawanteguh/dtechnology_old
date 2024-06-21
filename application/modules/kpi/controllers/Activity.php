<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Activity extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		rootsystem::system();
		$this->load->model("Modelactivity", "md");
	}

	public function index()
	{
		$data = $this->loadcombobox();
		$this->template->load("template/template-sidebar", "v_activity", $data);
	}

	public function loadcombobox()
	{
		$resultcekklinisid = $this->md->cekklinisid(ORG_ID, $_SESSION['userid']);
		$resultactivity = '';
		if ($resultcekklinisid->klinis_id != null) {
			$resultactivity = $this->md->activityperawatpelaksana(ORG_ID, $resultcekklinisid->klinis_id);
		}

		$activity = "";

		if ($resultactivity) {
			foreach ($resultactivity as $a) {
				$activity .= "<option value='" . $a->activity_id . "'>" . $a->activity . "</option>";
			}
		}
		$data['activity'] = $activity;

		return $data;
	}

	public function calender()
	{
		$result        = $this->md->calender();

		$events = array();

		foreach ($result as $a) {

			$data['title']     = $a->kegiatanutama;
			$data['start']     = $a->start_date;

			if (!empty($a->end_date)) {
				$data['end'] = $a->end_date;
			} else {
				$data['end'] = $a->start_date;
			}

			if ($a->status === "0") {
				$data['color']     = '#0d6efd';
			}

			if ($a->status === "1") {
				$data['color']     = '#00a65a';
			}

			if ($a->status === "2") {
				$data['color']     = '#ffc107';
			}


			if ($a->status === "9") {
				$data['color']     = '#dc3545';
			}


			$events[] = $data;
		};

		echo json_encode($events);
	}

	public function volume()
	{
		$kegiatanid      = $this->input->post('kegiatan');
		$mulaikegiatan   = $this->input->post('mulaikegiatan');
		$selesaikegiatan = $this->input->post('selesaikegiatan');

		$lisvol = $this->md->volume(ORG_ID, $kegiatanid, $mulaikegiatan, $selesaikegiatan,);
		$list   = "";

		foreach ($lisvol as $d) {
			$list .= "<option value='" . $d->vol . "'>" . $d->vol . "</option>";
		}

		echo $list;
	}

	public function insertactivity()
	{
		$atasanid = "";

		$resultcekklinisid = $this->md->cekklinisid(ORG_ID, $_SESSION['userid']);
		$resultcekatasanid = $this->md->cekatasanid(ORG_ID, $_SESSION['userid']);

		if ($resultcekklinisid->klinis_id != null) {
			$atasanid = $resultcekatasanid->atasan_id;
		}

		$data['org_id']         = $_SESSION['orgid'];
		$data['trans_id']       = generateuuid();
		$data['activity_id']    = $this->input->post("data_activity_primaryactivity_add");
		$data['activity']       = $this->input->post("data_activity_description_add");
		$data['start_date']     = DateTime::createFromFormat("d.m.Y", $this->input->post("data_activity_date_add"))->format("Y-m-d");
		$data['start_time_in']  = $this->input->post("data_activity_time_start_add");
		$data['start_time_out'] = $this->input->post("data_activity_time_end_add");
		$data['end_date']       = DateTime::createFromFormat("d.m.Y", $this->input->post("data_activity_date_add"))->format("Y-m-d");
		$data['end_time_in']    = $this->input->post("data_activity_time_start_add");
		$data['end_time_out']   = $this->input->post("data_activity_time_end_add");
		$data['qty']            = $this->input->post("data_activity_volume_add");
		$data['user_id']        = $_SESSION['userid'];
		$data['atasan_id']      = $atasanid;

		if ($this->md->insertactivity($data)) {
			$json['responCode'] = "00";
			$json['responHead'] = "success";
			$json['responDesc'] = "Tambah Activity Berhasil";
		} else {
			$json['responCode'] = "01";
			$json['responHead'] = "info";
			$json['responDesc'] = "Tambah Activity Gagal";
		}

		echo json_encode($json);
	}
}
