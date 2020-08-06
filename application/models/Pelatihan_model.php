<?php
class Pelatihan_model extends CI_Model
{
  var $table = 'tbl_pelatihan';


  public function validation($mode)
  {
    $this->load->library('form_validation');
    if ($mode == "tambah" || $mode == "edit") {
      $this->form_validation->set_rules('nama', 'Nama Pelatihan', 'required');
      $this->form_validation->set_rules('tgl_buka', 'Tanggal Buka', 'required');
      $this->form_validation->set_rules('tgl_tutup', 'Tanggal Tutup', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      $this->form_validation->set_rules('kuota_kota', 'Kuota Kota', 'required');
      $this->form_validation->set_rules('kuota_luar_kota', 'Kuota Luar Kota', 'required');
      $this->form_validation->set_rules('detail_pelatihan', 'Detail Pelatihan', 'required');
      $this->form_validation->set_rules('nama_pelatih', 'Nama Pelatih', 'required');
      $this->form_validation->set_rules('kontak_pelatih', 'Kontak Pelatih', 'required');

      if ($this->form_validation->run()) // Jika validasi benar
        return TRUE; // Maka kembalikan hasilnya dengan TRUE
      else // Jika ada data yang tidak sesuai validasi
        return FALSE; // Maka kembalikan hasilnya dengan FALSE
    } 
  }

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->row();
  }

  public function get_by_($data)
  {
    if ($this->db->where($data)) {
      return $this->db->get($this->table);
    } else {
      return false;
    }
  }

  //update pelatihan
  public function update()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'tgl_buka' => $this->input->post('tgl_buka'),
      'tgl_tutup' => $this->input->post('tgl_tutup'),
      'status' => $this->input->post('status'),
      'kuota_kota' => $this->input->post('kuota_kota'),
      'kuota_luar_kota' => $this->input->post('kuota_luar_kota'),
      'detail_pelatihan' => $this->input->post('detail_pelatihan'),
      'nama_pelatih' => $this->input->post('nama_pelatih'),
      'kontak_pelatih' => $this->input->post('kontak_pelatih'),
  );
    $this->db->where('id', $this->input->post('id'));
    return $this->db->update($this->table, $data);
  }

  // public function update_status_pelatihan($id)
  // {
  //   $sql = "UPDATE `tbl_pelatihan` SET `status` = 'tutup' WHERE `tbl_pelatihan`.`id` = $id";
  //   $this->db->query($sql);
  // }

  //delete pelatihan
  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete($this->table);
  }

  //input data pelatihan baru
  public function insert()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'tgl_buka' => $this->input->post('tgl_buka'),
      'tgl_tutup' => $this->input->post('tgl_tutup'),
      'status' => $this->input->post('status'),
      'kuota_kota' => $this->input->post('kuota_kota'),
      'kuota_luar_kota' => $this->input->post('kuota_luar_kota'),
      'detail_pelatihan' => $this->input->post('detail_pelatihan'),
      'nama_pelatih' => $this->input->post('nama_pelatih'),
      'kontak_pelatih' => $this->input->post('kontak_pelatih'),
    );
    return $this->db->insert($this->table, $data);
  }

  //ambil semua data
  public function get_all()
  {

    // SYNTAX UNTUK MELAKUKAN JOIN
    //   $this->db->select('transaksi.transaksi_id,transaksi_tgl,transaksi.nama_pegawai,mobil.mobil_merk,
    //         transaksi_tgl_pinjam,
    //         transaksi_tgldikembalikan,transaksi_status
    //         ');
    //         //  $this->db->join('kostumer','kostumer.kostumer_id = transaksi.transaksi_kostumer');
    //     $this->db->join('mobil','mobil.mobil_id = transaksi.transaksi_mobil');
    //     return $this->db->get($this->table)->result();
    return $this->db->get($this->table)->result();
  }

  // public function get_kuota($id)
  // {
  //   $sql = "SELECT tbl_pelatihan.kuota FROM tbl_pelatihan WHERE tbl_pelatihan.id =" . $id;

  //   return $this->db->query($sql)->row();
  // }




  // //pelatihan perbaris
  // public function get_pelatihan()
  // {
  //   $this->db->select('pelatihan_id,pelatihan_merk,pelatihan_status');
  //   return $this->db->get($this->table)->result();
  // }

  // //update Status ketika transaksi baru
  // public function pelatihan_status($id, $data2)
  // {
  //   $this->db->where('pelatihan_id', $id);
  //   $this->db->update($this->table, $data2);
  // }

  // //update status ketika transaksi selesai
  // public function pelatihan_status_selesai($id, $status)
  // {
  //   $this->db->where('pelatihan_id', $id);
  //   $this->db->update($this->table, $status);
  // }

  // //update ketika di pilih
  // public function update_pelatihan($id)
  // {
  //   $this->db->where('pelatihan_id', $id);
  // }

  // //menampilkan data pelatihan_merk dan pelatihan_status
  // public function get_data_pelatihan_merk()
  // {
  //   $this->db->select('pelatihan_merk,pelatihan_status');
  //   $this->db->limit(3);
  //   return $this->db->get($this->table)->result();
  // }
}
