<?php
		function generate_key_short($prefix,$nama,$bulan,$tahun)
		{
			$flag=0;
			$ambil_data=mysql_query("select * from tb_setup where nama_setup='".$nama."' ");
			while($row = mysql_fetch_array($ambil_data))
			{
				$flag=1;
				$no_id="".$prefix."".$bulan."".$tahun."".str_pad($row['ket3'], 4, 0, STR_PAD_LEFT)."";
				mysql_query("update tb_setup set ket3=".$row['ket3']."+1 where nama_setup='".$nama."'");
			}
			
			if ($flag==0)
			{
				mysql_query("insert into tb_setup values('','".$nama."','','',2) ");
				$no_id="".$prefix."".$bulan."".$tahun."0001";
			}
			return $no_id;
		}		
				
	function generate_key($prefix,$nama,$bulan,$tahun)
	{
		$flag=0;
		$ambil_data=mysql_query("select * from tb_setup where nama_setup='".$nama."' and ket1='".$bulan."' and ket2='".$tahun."'");
		while($row = mysql_fetch_array($ambil_data))
		{
			$flag=1;
			$no_id="".$prefix."".$bulan."".$tahun."".str_pad($row['ket3'], 4, 0, STR_PAD_LEFT)."";
			mysql_query("update tb_setup set ket3=".$row['ket3']."+1 where nama_setup='".$nama."' and ket1='".$bulan."' and ket2='".$tahun."' ");
		}
		
		if ($flag==0)
		{
			mysql_query("insert into tb_setup values('','".$nama."','".$bulan."','".$tahun."',2) ");
			$no_id="".$prefix."".$bulan."".$tahun."0001";
		}
		return $no_id;
	}
	
	function generate_transaction_key($prefix,$nama,$bulan,$tahun)
	{
		$flag=0;
		$ambil_data=mysql_query("select * from tb_setup where nama_setup='".$nama."' and ket1='".$bulan."' and ket2='".$tahun."'");
		while($row = mysql_fetch_array($ambil_data))
		{
			$flag=1;
			$no_id="".$prefix."/".$tahun."/".$bulan."/".str_pad($row['ket3'], 4, 0, STR_PAD_LEFT)."";
			mysql_query("update tb_setup set ket3=".$row['ket3']."+1 where nama_setup='".$nama."' and ket1='".$bulan."' and ket2='".$tahun."' ");
		}
		
		if ($flag==0)
		{
			mysql_query("insert into tb_setup values('','".$nama."','".$bulan."','".$tahun."',2) ");
			$no_id="".$prefix."/".$tahun."/".$bulan."/0001";
		}
		return $no_id;
	}
	
	function combofield($comboname,$table,$combo_id,$combo_display)
	{
		$sql="select ".$combo_id.",".$combo_display." from ".$table."";
		$data=mysql_query($sql);
		echo "<select name=".$comboname." class='cmb300'>";
		while($row = mysql_fetch_array($data))
		{
			echo "<option value=".$row["".$combo_id.""].">".$row["".$combo_display.""]."</option>";
		}
		echo "</select>";
	}
	
	
	function validasi_hak_akses($modul_id)
	{	
		global $hak_tambah,$hak_ubah,$hak_hapus;
		$hak_akses=1;
		if($_SESSION['grup']=="rs")
		{
			
			$hak_tambah=1;
			$hak_ubah=1;
			$hak_hapus=1;
		}	
		
		if($_SESSION['grup']=="rn")
		{
			$sql="select * from tb_modul_grant where id_karyawan='".$_SESSION['id_karyawan']."' and modul_id='".$modul_id."' ";
			$data=mysql_query($sql);
			while($row = mysql_fetch_array($data))
			{
				$hak_tambah=$row['tambah'];
				$hak_ubah=$row['ubah'];
				$hak_hapus=$row['hapus'];
			}
		}	
	}
	
	function validasi_hak_paket($id_reseller)
	{
		global $daftar;
		$daftar="'m0000'";
		$sql1="select * from tb_reseller where id_reseller='".$id_reseller."' ";
		$data1=mysql_query($sql1);
		while($row1 = mysql_fetch_array($data1))
		{
			if($row1['inventory']==1)
			{
				$daftar=$daftar.",'i0000'";
			}
			
			if($row1['pos']==1)
			{
				$daftar=$daftar.",'s0000'";
			}
			if($row1['hrd']==1)
			{
				$daftar=$daftar.",'h0000'";
			}
			if($row1['pusat']==1)
			{
				$daftar=$daftar.",'p0000'";
			}
			if($row1['apps']==1)
			{
				$daftar=$daftar.",'a0000'";
			}
			if($row1['website']==1)
			{
				$daftar=$daftar.",'w0000'";
			}					
		}
	}
	
	
	
	function begin()
	{
	mysql_query("BEGIN");
	}

	function commit()
	{
	mysql_query("COMMIT");
	}

	function rollback()
	{
	mysql_query("ROLLBACK");
	}
	
?>