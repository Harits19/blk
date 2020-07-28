<?php
class Pelatihan_model extends CI_Model
{
  var $table = 'tbl_pelatihan';

  public function get_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get($this->table)->row();
  }

  //update pelatihan
  public function update($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  public function update_status_pelatihan($id)
  {
    $sql = "UPDATE `tbl_pelatihan` SET `status` = 'tutup' WHERE `tbl_pelatihan`.`id` = $id";
    $this->db->query($sql);
  }

  //delete pelatihan
  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete($this->table);
  }

  //input data pelatihan baru
  public function insert($data)
  {
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
