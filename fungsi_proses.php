<?php
function dec(){
	return 4;
}

function jumlah_data_latih($db_object, $where=null){
	$sql = "SELECT COUNT(*) FROM data_latih ".$where;
	$res = $db_object->db_query($sql);
	$rows = $db_object->db_fetch_array($res);
	return $rows[0];
}

/**
 * 
 * @param type $db_object
 * @param type $id_data_uji
 * @param type $jenis_kelamin
 * @param type $usia
 * @param type $jurusan
 * @param type $jawaban_a
 * @param type $jawaban_b
 * @param type $jawaban_c
 * @param type $jawaban_d
 * @return array
 */
function ProsesNaiveBayesattr($db_object, $id_data_uji=0, $jenis_kelamin, $usia, $jurusan, 
        $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $show_perhitungan=true){
	
	$jumlah_data = jumlah_data_latih($db_object);//jumlah data latih
	$jumlah_sanguin = jumlah_data_latih($db_object, " WHERE kelas_asli='Sanguin'");//jumlah sanguin
	$jumlah_koleris = jumlah_data_latih($db_object, " WHERE kelas_asli='Koleris'");//jumlah koleris
        $jumlah_melankolis = jumlah_data_latih($db_object, " WHERE kelas_asli='Melankolis'");//jumlah melankolis
        $jumlah_plegmatis = jumlah_data_latih($db_object, " WHERE kelas_asli='Plegmatis'");//jumlah plegmatis

	$p_sanguin = $jumlah_sanguin/$jumlah_data;
	$p_koleris = $jumlah_koleris/$jumlah_data;
        $p_melankolis = $jumlah_melankolis/$jumlah_data;
        $p_plegmatis = $jumlah_plegmatis/$jumlah_data;

	//jumlah atribut jenis kelamin
	$jumlah_jenis_kelamin_laki_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_laki_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_laki_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_laki_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Plegmatis'");
        
	$jumlah_jenis_kelamin_perempuan_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_perempuan_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_perempuan_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_perempuan_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jenis_kelamin
	$p_jenis_kelamin_laki_sanguin = $jumlah_jenis_kelamin_laki_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_laki_koleris = $jumlah_jenis_kelamin_laki_koleris/$jumlah_koleris;
        $p_jenis_kelamin_laki_melankolis = $jumlah_jenis_kelamin_laki_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_laki_plegmatis = $jumlah_jenis_kelamin_laki_plegmatis/$jumlah_plegmatis;
        
	$p_jenis_kelamin_perempuan_sanguin = $jumlah_jenis_kelamin_perempuan_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_perempuan_koleris = $jumlah_jenis_kelamin_perempuan_koleris/$jumlah_koleris;
        $p_jenis_kelamin_perempuan_melankolis = $jumlah_jenis_kelamin_perempuan_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_perempuan_plegmatis = $jumlah_jenis_kelamin_perempuan_plegmatis/$jumlah_plegmatis;
        
	//display table probabilitas jenis_kelamin
       
	//------------------------------------------------------------------------------
	//jumlah atribut jurusan
	$jumlah_jurusan_IPS_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Sanguin'");
        $jumlah_jurusan_IPS_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPS_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPS_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Plegmatis'");
        
        $jumlah_jurusan_IPA_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Sanguin'");
	$jumlah_jurusan_IPA_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPA_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPA_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jurusan
	$p_jurusan_IPS_sanguin = $jumlah_jurusan_IPS_sanguin/$jumlah_sanguin;
	$p_jurusan_IPS_koleris = $jumlah_jurusan_IPS_koleris/$jumlah_koleris;
        $p_jurusan_IPS_melankolis = $jumlah_jurusan_IPS_melankolis/$jumlah_melankolis;
        $p_jurusan_IPS_plegmatis = $jumlah_jurusan_IPS_plegmatis/$jumlah_plegmatis;
        
	$p_jurusan_IPA_sanguin = $jumlah_jurusan_IPA_sanguin/$jumlah_sanguin;
	$p_jurusan_IPA_koleris = $jumlah_jurusan_IPA_koleris/$jumlah_koleris;
	$p_jurusan_IPA_melankolis = $jumlah_jurusan_IPA_melankolis/$jumlah_melankolis;
	$p_jurusan_IPA_plegmatis = $jumlah_jurusan_IPA_plegmatis/$jumlah_plegmatis;
	//display table probabilitas jurusan
      //xusia sanguin
	$jumlah_usia_sanguin = get_jumlah_sum_atribut($db_object, "usia", "Sanguin");
	$x_usia_sanguin = $jumlah_usia_sanguin/$jumlah_sanguin;
	//xusia  koleris
	$jumlah_usia_koleris = get_jumlah_sum_atribut($db_object, "usia", "Koleris");
	$x_usia_koleris = $jumlah_usia_koleris/$jumlah_koleris;
        //xusia  melankolis
	$jumlah_usia_melankolis = get_jumlah_sum_atribut($db_object, "usia", "Melankolis");
	$x_usia_melankolis = $jumlah_usia_melankolis/$jumlah_melankolis;
        //xusia  plegmatis
	$jumlah_usia_plegmatis = get_jumlah_sum_atribut($db_object, "usia", "Plegmatis");
	$x_usia_plegmatis = $jumlah_usia_plegmatis/$jumlah_plegmatis;
        
	//S2usia Sanguin
	$s2_usia_sanguin = get_s2_populasi($db_object, 'usia', 'Sanguin', $x_usia_sanguin, $jumlah_sanguin);
	//S2usia Koleris
	$s2_usia_koleris = get_s2_populasi($db_object, 'usia', 'Koleris', $x_usia_koleris, $jumlah_koleris);
        //S2usia Melankolis
	$s2_usia_melankolis = get_s2_populasi($db_object, 'usia', 'Melankolis', $x_usia_melankolis, $jumlah_melankolis);
        //S2usia Plegmatis
	$s2_usia_plegmatis = get_s2_populasi($db_object, 'usia', 'Plegmatis', $x_usia_plegmatis, $jumlah_plegmatis);
       
	//S usia Sanguin
	$s_usia_sanguin = sqrt($s2_usia_sanguin);
	//S usia Koleris
	$s_usia_koleris = sqrt($s2_usia_koleris);
        //S usia Melankolis
	$s_usia_melankolis = sqrt($s2_usia_melankolis);
        //S usia Plegmatis
	$s_usia_plegmatis = sqrt($s2_usia_plegmatis);
        
        //s2 ^2 usia sanguin
        $s2_pangkat2_usia_sanguin = pow($s2_usia_sanguin, 2);
        //s2 ^2 usia koleris
        $s2_pangkat2_usia_koleris = pow($s2_usia_koleris, 2);
        //s2 ^2 usia melankolis
        $s2_pangkat2_usia_melankolis = pow($s2_usia_melankolis, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_usia_plegmatis = pow($s2_usia_plegmatis, 2);
        
        //======================================================================
        //jawaban_a
        //x jawaban_a sanguin
	$jumlah_jawaban_a_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_a", "Sanguin");
	$x_jawaban_a_sanguin = $jumlah_jawaban_a_sanguin/$jumlah_sanguin;
	//x jawaban_a  koleris
	$jumlah_jawaban_a_koleris = get_jumlah_sum_atribut($db_object, "jawaban_a", "Koleris");
	$x_jawaban_a_koleris = $jumlah_jawaban_a_koleris/$jumlah_koleris;
        //x jawaban_a  melankolis
	$jumlah_jawaban_a_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Melankolis");
	$x_jawaban_a_melankolis = $jumlah_jawaban_a_melankolis/$jumlah_melankolis;
        //x jawaban_a  plegmatis
	$jumlah_jawaban_a_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Plegmatis");
	$x_jawaban_a_plegmatis = $jumlah_jawaban_a_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_a Sanguin
	$s2_jawaban_a_sanguin = get_s2_populasi($db_object, 'jawaban_a', 'Sanguin', $x_jawaban_a_sanguin, $jumlah_sanguin);
	//S2 jawaban_a Koleris
	$s2_jawaban_a_koleris = get_s2_populasi($db_object, 'jawaban_a', 'Koleris', $x_jawaban_a_koleris, $jumlah_koleris);
        //S2 jawaban_a Melankolis
	$s2_jawaban_a_melankolis = get_s2_populasi($db_object, 'jawaban_a', 'Melankolis', $x_jawaban_a_melankolis, $jumlah_melankolis);
        //S2 jawaban_a Koleris
	$s2_jawaban_a_plegmatis = get_s2_populasi($db_object, 'jawaban_a', 'Plegmatis', $x_jawaban_a_plegmatis, $jumlah_plegmatis);
        //S jawaban_a Sanguin
	$s_jawaban_a_sanguin = sqrt($s2_jawaban_a_sanguin);
	//S jawaban_a Koleris
	$s_jawaban_a_koleris = sqrt($s2_jawaban_a_koleris);
        //S jawaban_a Melankolis
	$s_jawaban_a_melankolis = sqrt($s2_jawaban_a_melankolis);
        //S jawaban_a Plegmatis
	$s_jawaban_a_plegmatis = sqrt($s2_jawaban_a_plegmatis);
        //s2 ^2 jawaban_a sanguin
        $s2_pangkat2_jawaban_a_sanguin = pow($s2_jawaban_a_sanguin, 2);
        //s2 ^2 jawaban_a koleris
        $s2_pangkat2_jawaban_a_koleris = pow($s2_jawaban_a_koleris, 2);
        //s2 ^2 jawaban_a melankolis
        $s2_pangkat2_jawaban_a_melankolis = pow($s2_jawaban_a_melankolis, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_jawaban_a_plegmatis = pow($s2_jawaban_a_plegmatis, 2);
        
        
        //==================================================
        //jawaban_b
        //x jawaban_b sanguin
	$jumlah_jawaban_b_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_b", "Sanguin");
	$x_jawaban_b_sanguin = $jumlah_jawaban_b_sanguin/$jumlah_sanguin;
	//x jawaban_b  koleris
	$jumlah_jawaban_b_koleris = get_jumlah_sum_atribut($db_object, "jawaban_b", "Koleris");
	$x_jawaban_b_koleris = $jumlah_jawaban_b_koleris/$jumlah_koleris;
        //x jawaban_b  melankolis
	$jumlah_jawaban_b_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Melankolis");
	$x_jawaban_b_melankolis = $jumlah_jawaban_b_melankolis/$jumlah_melankolis;
        //x jawaban_b  plegmatis
	$jumlah_jawaban_b_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Plegmatis");
	$x_jawaban_b_plegmatis = $jumlah_jawaban_b_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_b Sanguin
	$s2_jawaban_b_sanguin = get_s2_populasi($db_object, 'jawaban_b', 'Sanguin', $x_jawaban_b_sanguin, $jumlah_sanguin);
	//S2 jawaban_b Koleris
	$s2_jawaban_b_koleris = get_s2_populasi($db_object, 'jawaban_b', 'Koleris', $x_jawaban_b_koleris, $jumlah_koleris);
        //S2 jawaban_b Melankolis
	$s2_jawaban_b_melankolis = get_s2_populasi($db_object, 'jawaban_b', 'Melankolis', $x_jawaban_b_melankolis, $jumlah_melankolis);
        //S2 jawaban_b Koleris
	$s2_jawaban_b_plegmatis = get_s2_populasi($db_object, 'jawaban_b', 'Plegmatis', $x_jawaban_b_plegmatis, $jumlah_plegmatis);
        //S jawaban_b Sanguin
	$s_jawaban_b_sanguin = sqrt($s2_jawaban_b_sanguin);
	//S jawaban_b Koleris
	$s_jawaban_b_koleris = sqrt($s2_jawaban_b_koleris);
        //S jawaban_b Melankolis
	$s_jawaban_b_melankolis = sqrt($s2_jawaban_b_melankolis);
        //S jawaban_b Plegmatis
	$s_jawaban_b_plegmatis = sqrt($s2_jawaban_b_plegmatis);
        
        //s2 ^2 jawaban_b sanguin
        $s2_pangkat2_jawaban_b_sanguin = pow($s2_jawaban_b_sanguin, 2);
        //s2 ^2 jawaban_b koleris
        $s2_pangkat2_jawaban_b_koleris = pow($s2_jawaban_b_koleris, 2);
        //s2 ^2 jawaban_b melankolis
        $s2_pangkat2_jawaban_b_melankolis = pow($s2_jawaban_b_melankolis, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_jawaban_b_plegmatis = pow($s2_jawaban_b_plegmatis, 2);
        //jawaban_c
        //x jawaban_c sanguin
	$jumlah_jawaban_c_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_c", "Sanguin");
	$x_jawaban_c_sanguin = $jumlah_jawaban_c_sanguin/$jumlah_sanguin;
	//x jawaban_c  koleris
	$jumlah_jawaban_c_koleris = get_jumlah_sum_atribut($db_object, "jawaban_c", "Koleris");
	$x_jawaban_c_koleris = $jumlah_jawaban_c_koleris/$jumlah_koleris;
        //x jawaban_c  melankolis
	$jumlah_jawaban_c_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Melankolis");
	$x_jawaban_c_melankolis = $jumlah_jawaban_c_melankolis/$jumlah_melankolis;
        //x jawaban_c  plegmatis
	$jumlah_jawaban_c_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Plegmatis");
	$x_jawaban_c_plegmatis = $jumlah_jawaban_c_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_c Sanguin
	$s2_jawaban_c_sanguin = get_s2_populasi($db_object, 'jawaban_c', 'Sanguin', $x_jawaban_c_sanguin, $jumlah_sanguin);
	//S2 jawaban_c Koleris
	$s2_jawaban_c_koleris = get_s2_populasi($db_object, 'jawaban_c', 'Koleris', $x_jawaban_c_koleris, $jumlah_koleris);
        //S2 jawaban_c Melankolis
	$s2_jawaban_c_melankolis = get_s2_populasi($db_object, 'jawaban_c', 'Melankolis', $x_jawaban_c_melankolis, $jumlah_melankolis);
        //S2 jawaban_c Koleris
	$s2_jawaban_c_plegmatis = get_s2_populasi($db_object, 'jawaban_c', 'Plegmatis', $x_jawaban_c_plegmatis, $jumlah_plegmatis);
        //S jawaban_c Sanguin
	$s_jawaban_c_sanguin = sqrt($s2_jawaban_c_sanguin);
	//S jawaban_c Koleris
	$s_jawaban_c_koleris = sqrt($s2_jawaban_c_koleris);
        //S jawaban_c Melankolis
	$s_jawaban_c_melankolis = sqrt($s2_jawaban_c_melankolis);
        //S jawaban_c Plegmatis
	$s_jawaban_c_plegmatis = sqrt($s2_jawaban_c_plegmatis);
         
        //s2 ^2 jawaban_c sanguin
        $s2_pangkat2_jawaban_c_sanguin = pow($s2_jawaban_c_sanguin, 2);
        //s2 ^2 jawaban_c koleris
        $s2_pangkat2_jawaban_c_koleris = pow($s2_jawaban_c_koleris, 2);
        //s2 ^2 jawaban_c melankolis
        $s2_pangkat2_jawaban_c_melankolis = pow($s2_jawaban_c_melankolis, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_jawaban_c_plegmatis = pow($s2_jawaban_c_plegmatis, 2);
        //x jawaban_d sanguin
	$jumlah_jawaban_d_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_d", "Sanguin");
	$x_jawaban_d_sanguin = $jumlah_jawaban_d_sanguin/$jumlah_sanguin;
	//x jawaban_d  koleris
	$jumlah_jawaban_d_koleris = get_jumlah_sum_atribut($db_object, "jawaban_d", "Koleris");
	$x_jawaban_d_koleris = $jumlah_jawaban_d_koleris/$jumlah_koleris;
        //x jawaban_d  melankolis
	$jumlah_jawaban_d_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Melankolis");
	$x_jawaban_d_melankolis = $jumlah_jawaban_d_melankolis/$jumlah_melankolis;
        //x jawaban_d  plegmatis
	$jumlah_jawaban_d_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Plegmatis");
	$x_jawaban_d_plegmatis = $jumlah_jawaban_d_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_d Sanguin
	$s2_jawaban_d_sanguin = get_s2_populasi($db_object, 'jawaban_d', 'Sanguin', $x_jawaban_d_sanguin, $jumlah_sanguin);
	//S2 jawaban_d Koleris
	$s2_jawaban_d_koleris = get_s2_populasi($db_object, 'jawaban_d', 'Koleris', $x_jawaban_d_koleris, $jumlah_koleris);
        //S2 jawaban_d Melankolis
	$s2_jawaban_d_melankolis = get_s2_populasi($db_object, 'jawaban_d', 'Melankolis', $x_jawaban_d_melankolis, $jumlah_melankolis);
        //S2 jawaban_d Koleris
	$s2_jawaban_d_plegmatis = get_s2_populasi($db_object, 'jawaban_d', 'Plegmatis', $x_jawaban_d_plegmatis, $jumlah_plegmatis);
        //S jawaban_d Sanguin
	$s_jawaban_d_sanguin = sqrt($s2_jawaban_d_sanguin);
	//S jawaban_d Koleris
	$s_jawaban_d_koleris = sqrt($s2_jawaban_d_koleris);
        //S jawaban_d Melankolis
	$s_jawaban_d_melankolis = sqrt($s2_jawaban_d_melankolis);
        //S jawaban_d Plegmatis
	$s_jawaban_d_plegmatis = sqrt($s2_jawaban_d_plegmatis);
         
        //s2 ^2 jawaban_d sanguin
        $s2_pangkat2_jawaban_d_sanguin = pow($s2_jawaban_d_sanguin, 2);
        //s2 ^2 jawaban_d koleris
        $s2_pangkat2_jawaban_d_koleris = pow($s2_jawaban_d_koleris, 2);
        //s2 ^2 jawaban_d melankolis
        $s2_pangkat2_jawaban_d_melankolis = pow($s2_jawaban_d_melankolis, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_jawaban_d_plegmatis = pow($s2_jawaban_d_plegmatis, 2);
        //======================================================================
       
        if($show_perhitungan){
        echo "<table class='table table-bordered table-striped table-hover' style='width:100%; margin-bottom:20px; table-layout:fixed;'>";
                echo "<thead style='background:#f5f5f5'>";
                echo "<tr>";
                        echo "<th style='width:16%'>Atribut</th>";
                        echo "<th style='width:16%'>Keterangan</th>";
                        echo "<th style='width:17%'>Sanguin</th>";
                        echo "<th style='width:17%'>Koleris</th>";
                        echo "<th style='width:17%'>Melankolis</th>";
                        echo "<th style='width:17%'>Plegmatis</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr>";
                        echo "<td rowspan='2' style='vertical-align:middle'>Jenis Kelamin</td>";
                        echo "<td>Probabilitas Laki-laki</td>";
                        echo "<td>".number_format($p_jenis_kelamin_laki_sanguin, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_laki_koleris, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_laki_melankolis, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_laki_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>Probabilitas Perempuan</td>";
                        echo "<td>".number_format($p_jenis_kelamin_perempuan_sanguin, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_perempuan_koleris, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_perempuan_melankolis, dec())."</td>";
                        echo "<td>".number_format($p_jenis_kelamin_perempuan_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td rowspan='2' style='vertical-align:middle'>Jurusan</td>";
                        echo "<td>Probabilitas IPS</td>";
                        echo "<td>".number_format($p_jurusan_IPS_sanguin, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPS_koleris, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPS_melankolis, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPS_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>Probabilitas IPA</td>";
                        echo "<td>".number_format($p_jurusan_IPA_sanguin, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPA_koleris, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPA_melankolis, dec())."</td>";
                        echo "<td>".number_format($p_jurusan_IPA_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr style='background:#f9f9f9'>";
                        echo "<td rowspan='3' style='vertical-align:middle'>Usia</td>";
                        echo "<td>Rata-Rata Usia</td>";
                        echo "<td>".number_format($x_usia_sanguin, dec())."</td>";
                        echo "<td>".number_format($x_usia_koleris, dec())."</td>";
                        echo "<td>".number_format($x_usia_melankolis, dec())."</td>";
                        echo "<td>".number_format($x_usia_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr style='background:#f9f9f9'>";
                        echo "<td>Variansi Usia</td>";
                        echo "<td>".number_format($s2_usia_sanguin, dec())."</td>";
                        echo "<td>".number_format($s2_usia_koleris, dec())."</td>";
                        echo "<td>".number_format($s2_usia_melankolis, dec())."</td>";
                        echo "<td>".number_format($s2_usia_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr style='background:#f9f9f9'>";
                                echo "<td>Standar Deviasi Usia</td>";
                                echo "<td>".number_format($s_usia_sanguin, dec())."</td>";
                                echo "<td>".number_format($s_usia_koleris, dec())."</td>";
                                echo "<td>".number_format($s_usia_melankolis, dec())."</td>";
                                echo "<td>".number_format($s_usia_plegmatis, dec())."</td>";
                echo "</tr>";

                // Jawaban A
                echo "<tr>";
                                echo "<td rowspan='3' style='vertical-align:middle'>Jawaban A</td>";
                                echo "<td>Rata-Rata A</td>";
                                echo "<td>".number_format($x_jawaban_a_sanguin, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_a_koleris, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_a_melankolis, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_a_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Variansi A</td>";
                                echo "<td>".number_format($s2_jawaban_a_sanguin, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_a_koleris, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_a_melankolis, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_a_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Standar Deviasi A</td>";
                                echo "<td>".number_format($s_jawaban_a_sanguin, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_a_koleris, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_a_melankolis, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_a_plegmatis, dec())."</td>";
                echo "</tr>";

                // B
                echo "<tr>";
                                echo "<td rowspan='3' style='vertical-align:middle'>Jawaban B</td>";
                                echo "<td>Rata-Rata B</td>";
                                echo "<td>".number_format($x_jawaban_b_sanguin, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_b_koleris, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_b_melankolis, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_b_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Variansi B</td>";
                                echo "<td>".number_format($s2_jawaban_b_sanguin, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_b_koleris, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_b_melankolis, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_b_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Standar Deviasi B</td>";
                                echo "<td>".number_format($s_jawaban_b_sanguin, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_b_koleris, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_b_melankolis, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_b_plegmatis, dec())."</td>";
                echo "</tr>";

                // C
                echo "<tr>";
                                echo "<td rowspan='3' style='vertical-align:middle'>Jawaban C</td>";
                                echo "<td>Rata-Rata C</td>";
                                echo "<td>".number_format($x_jawaban_c_sanguin, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_c_koleris, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_c_melankolis, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_c_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Variansi C</td>";
                                echo "<td>".number_format($s2_jawaban_c_sanguin, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_c_koleris, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_c_melankolis, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_c_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Standar Deviasi C</td>";
                                echo "<td>".number_format($s_jawaban_c_sanguin, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_c_koleris, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_c_melankolis, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_c_plegmatis, dec())."</td>";
                echo "</tr>";

                // D
                echo "<tr>";
                                echo "<td rowspan='3' style='vertical-align:middle'>Jawaban D</td>";
                                echo "<td>Rata-Rata D</td>";
                                echo "<td>".number_format($x_jawaban_d_sanguin, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_d_koleris, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_d_melankolis, dec())."</td>";
                                echo "<td>".number_format($x_jawaban_d_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Variansi D</td>";
                                echo "<td>".number_format($s2_jawaban_d_sanguin, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_d_koleris, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_d_melankolis, dec())."</td>";
                                echo "<td>".number_format($s2_jawaban_d_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                                echo "<td>Standar Deviasi D</td>";
                                echo "<td>".number_format($s_jawaban_d_sanguin, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_d_koleris, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_d_melankolis, dec())."</td>";
                                echo "<td>".number_format($s_jawaban_d_plegmatis, dec())."</td>";
                echo "</tr>";

                echo "</tbody>";
        echo "</table>";

echo "<br>";
}
       
}
function ProsesNaiveBayesprob($db_object, $id_data_uji=0, $jenis_kelamin, $usia, $jurusan, 
        $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $show_perhitungan=true){
	
	$jumlah_data = jumlah_data_latih($db_object);//jumlah data latih
	$jumlah_sanguin = jumlah_data_latih($db_object, " WHERE kelas_asli='Sanguin'");//jumlah sanguin
	$jumlah_koleris = jumlah_data_latih($db_object, " WHERE kelas_asli='Koleris'");//jumlah koleris
        $jumlah_melankolis = jumlah_data_latih($db_object, " WHERE kelas_asli='Melankolis'");//jumlah melankolis
        $jumlah_plegmatis = jumlah_data_latih($db_object, " WHERE kelas_asli='Plegmatis'");//jumlah plegmatis

	$p_sanguin = $jumlah_sanguin/$jumlah_data;
	$p_koleris = $jumlah_koleris/$jumlah_data;
        $p_melankolis = $jumlah_melankolis/$jumlah_data;
        $p_plegmatis = $jumlah_plegmatis/$jumlah_data;

	//jumlah atribut jenis kelamin
	$jumlah_jenis_kelamin_laki_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_laki_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_laki_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_laki_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Plegmatis'");
        
	$jumlah_jenis_kelamin_perempuan_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_perempuan_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_perempuan_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_perempuan_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jenis_kelamin
	$p_jenis_kelamin_laki_sanguin = $jumlah_jenis_kelamin_laki_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_laki_koleris = $jumlah_jenis_kelamin_laki_koleris/$jumlah_koleris;
        $p_jenis_kelamin_laki_melankolis = $jumlah_jenis_kelamin_laki_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_laki_plegmatis = $jumlah_jenis_kelamin_laki_plegmatis/$jumlah_plegmatis;
        
	$p_jenis_kelamin_perempuan_sanguin = $jumlah_jenis_kelamin_perempuan_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_perempuan_koleris = $jumlah_jenis_kelamin_perempuan_koleris/$jumlah_koleris;
        $p_jenis_kelamin_perempuan_melankolis = $jumlah_jenis_kelamin_perempuan_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_perempuan_plegmatis = $jumlah_jenis_kelamin_perempuan_plegmatis/$jumlah_plegmatis;
        
	//------------------------------------------------------------------------------
	//jumlah atribut jurusan
	$jumlah_jurusan_IPS_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Sanguin'");
        $jumlah_jurusan_IPS_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPS_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPS_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Plegmatis'");
        
        $jumlah_jurusan_IPA_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Sanguin'");
	$jumlah_jurusan_IPA_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPA_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPA_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jurusan
	$p_jurusan_IPS_sanguin = $jumlah_jurusan_IPS_sanguin/$jumlah_sanguin;
	$p_jurusan_IPS_koleris = $jumlah_jurusan_IPS_koleris/$jumlah_koleris;
        $p_jurusan_IPS_melankolis = $jumlah_jurusan_IPS_melankolis/$jumlah_melankolis;
        $p_jurusan_IPS_plegmatis = $jumlah_jurusan_IPS_plegmatis/$jumlah_plegmatis;
        
	$p_jurusan_IPA_sanguin = $jumlah_jurusan_IPA_sanguin/$jumlah_sanguin;
	$p_jurusan_IPA_koleris = $jumlah_jurusan_IPA_koleris/$jumlah_koleris;
	$p_jurusan_IPA_melankolis = $jumlah_jurusan_IPA_melankolis/$jumlah_melankolis;
	$p_jurusan_IPA_plegmatis = $jumlah_jurusan_IPA_plegmatis/$jumlah_plegmatis;
	//display table probabilitas jurusan
        
	//xusia sanguin
	$jumlah_usia_sanguin = get_jumlah_sum_atribut($db_object, "usia", "Sanguin");
	$x_usia_sanguin = $jumlah_usia_sanguin/$jumlah_sanguin;
	//xusia  koleris
	$jumlah_usia_koleris = get_jumlah_sum_atribut($db_object, "usia", "Koleris");
	$x_usia_koleris = $jumlah_usia_koleris/$jumlah_koleris;
        //xusia  melankolis
	$jumlah_usia_melankolis = get_jumlah_sum_atribut($db_object, "usia", "Melankolis");
	$x_usia_melankolis = $jumlah_usia_melankolis/$jumlah_melankolis;
        //xusia  plegmatis
	$jumlah_usia_plegmatis = get_jumlah_sum_atribut($db_object, "usia", "Plegmatis");
	$x_usia_plegmatis = $jumlah_usia_plegmatis/$jumlah_plegmatis;
        
        //S2usia Sanguin
	$s2_usia_sanguin = get_s2_populasi($db_object, 'usia', 'Sanguin', $x_usia_sanguin, $jumlah_sanguin);
	//S2usia Koleris
	$s2_usia_koleris = get_s2_populasi($db_object, 'usia', 'Koleris', $x_usia_koleris, $jumlah_koleris);
        //S2usia Melankolis
	$s2_usia_melankolis = get_s2_populasi($db_object, 'usia', 'Melankolis', $x_usia_melankolis, $jumlah_melankolis);
        //S2usia Plegmatis
	$s2_usia_plegmatis = get_s2_populasi($db_object, 'usia', 'Plegmatis', $x_usia_plegmatis, $jumlah_plegmatis);
        //S usia Sanguin
	$s_usia_sanguin = sqrt($s2_usia_sanguin);
	//S usia Koleris
	$s_usia_koleris = sqrt($s2_usia_koleris);
        //S usia Melankolis
	$s_usia_melankolis = sqrt($s2_usia_melankolis);
        //S usia Plegmatis
	$s_usia_plegmatis = sqrt($s2_usia_plegmatis);
        
        //s2 ^2 usia sanguin
        $s2_pangkat2_usia_sanguin = pow($s2_usia_sanguin, 2);
        //s2 ^2 usia koleris
        $s2_pangkat2_usia_koleris = pow($s2_usia_koleris, 2);
        //s2 ^2 usia melankolis
        $s2_pangkat2_usia_melankolis = pow($s2_usia_melankolis, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_usia_plegmatis = pow($s2_usia_plegmatis, 2);
        
        //======================================================================
        //jawaban_a
        //x jawaban_a sanguin
	$jumlah_jawaban_a_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_a", "Sanguin");
	$x_jawaban_a_sanguin = $jumlah_jawaban_a_sanguin/$jumlah_sanguin;
	//x jawaban_a  koleris
	$jumlah_jawaban_a_koleris = get_jumlah_sum_atribut($db_object, "jawaban_a", "Koleris");
	$x_jawaban_a_koleris = $jumlah_jawaban_a_koleris/$jumlah_koleris;
        //x jawaban_a  melankolis
	$jumlah_jawaban_a_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Melankolis");
	$x_jawaban_a_melankolis = $jumlah_jawaban_a_melankolis/$jumlah_melankolis;
        //x jawaban_a  plegmatis
	$jumlah_jawaban_a_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Plegmatis");
	$x_jawaban_a_plegmatis = $jumlah_jawaban_a_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_a Sanguin
	$s2_jawaban_a_sanguin = get_s2_populasi($db_object, 'jawaban_a', 'Sanguin', $x_jawaban_a_sanguin, $jumlah_sanguin);
	//S2 jawaban_a Koleris
	$s2_jawaban_a_koleris = get_s2_populasi($db_object, 'jawaban_a', 'Koleris', $x_jawaban_a_koleris, $jumlah_koleris);
        //S2 jawaban_a Melankolis
	$s2_jawaban_a_melankolis = get_s2_populasi($db_object, 'jawaban_a', 'Melankolis', $x_jawaban_a_melankolis, $jumlah_melankolis);
        //S2 jawaban_a Koleris
	$s2_jawaban_a_plegmatis = get_s2_populasi($db_object, 'jawaban_a', 'Plegmatis', $x_jawaban_a_plegmatis, $jumlah_plegmatis);
        //S jawaban_a Sanguin
	$s_jawaban_a_sanguin = sqrt($s2_jawaban_a_sanguin);
	//S jawaban_a Koleris
	$s_jawaban_a_koleris = sqrt($s2_jawaban_a_koleris);
        //S jawaban_a Melankolis
	$s_jawaban_a_melankolis = sqrt($s2_jawaban_a_melankolis);
        //S jawaban_a Plegmatis
	$s_jawaban_a_plegmatis = sqrt($s2_jawaban_a_plegmatis);
        //s2 ^2 jawaban_a sanguin
        $s2_pangkat2_jawaban_a_sanguin = pow($s2_jawaban_a_sanguin, 2);
        //s2 ^2 jawaban_a koleris
        $s2_pangkat2_jawaban_a_koleris = pow($s2_jawaban_a_koleris, 2);
        //s2 ^2 jawaban_a melankolis
        $s2_pangkat2_jawaban_a_melankolis = pow($s2_jawaban_a_melankolis, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_jawaban_a_plegmatis = pow($s2_jawaban_a_plegmatis, 2);
        
        //==================================================
        //jawaban_b
        //x jawaban_b sanguin
	$jumlah_jawaban_b_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_b", "Sanguin");
	$x_jawaban_b_sanguin = $jumlah_jawaban_b_sanguin/$jumlah_sanguin;
	//x jawaban_b  koleris
	$jumlah_jawaban_b_koleris = get_jumlah_sum_atribut($db_object, "jawaban_b", "Koleris");
	$x_jawaban_b_koleris = $jumlah_jawaban_b_koleris/$jumlah_koleris;
        //x jawaban_b  melankolis
	$jumlah_jawaban_b_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Melankolis");
	$x_jawaban_b_melankolis = $jumlah_jawaban_b_melankolis/$jumlah_melankolis;
        //x jawaban_b  plegmatis
	$jumlah_jawaban_b_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Plegmatis");
	$x_jawaban_b_plegmatis = $jumlah_jawaban_b_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_b Sanguin
	$s2_jawaban_b_sanguin = get_s2_populasi($db_object, 'jawaban_b', 'Sanguin', $x_jawaban_b_sanguin, $jumlah_sanguin);
	//S2 jawaban_b Koleris
	$s2_jawaban_b_koleris = get_s2_populasi($db_object, 'jawaban_b', 'Koleris', $x_jawaban_b_koleris, $jumlah_koleris);
        //S2 jawaban_b Melankolis
	$s2_jawaban_b_melankolis = get_s2_populasi($db_object, 'jawaban_b', 'Melankolis', $x_jawaban_b_melankolis, $jumlah_melankolis);
        //S2 jawaban_b Koleris
	$s2_jawaban_b_plegmatis = get_s2_populasi($db_object, 'jawaban_b', 'Plegmatis', $x_jawaban_b_plegmatis, $jumlah_plegmatis);
        //S jawaban_b Sanguin
	$s_jawaban_b_sanguin = sqrt($s2_jawaban_b_sanguin);
	//S jawaban_b Koleris
	$s_jawaban_b_koleris = sqrt($s2_jawaban_b_koleris);
        //S jawaban_b Melankolis
	$s_jawaban_b_melankolis = sqrt($s2_jawaban_b_melankolis);
        //S jawaban_b Plegmatis
	$s_jawaban_b_plegmatis = sqrt($s2_jawaban_b_plegmatis);
        
        //s2 ^2 jawaban_b sanguin
        $s2_pangkat2_jawaban_b_sanguin = pow($s2_jawaban_b_sanguin, 2);
        //s2 ^2 jawaban_b koleris
        $s2_pangkat2_jawaban_b_koleris = pow($s2_jawaban_b_koleris, 2);
        //s2 ^2 jawaban_b melankolis
        $s2_pangkat2_jawaban_b_melankolis = pow($s2_jawaban_b_melankolis, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_jawaban_b_plegmatis = pow($s2_jawaban_b_plegmatis, 2);
        //========================================================
        //jawaban_c
        //x jawaban_c sanguin
	$jumlah_jawaban_c_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_c", "Sanguin");
	$x_jawaban_c_sanguin = $jumlah_jawaban_c_sanguin/$jumlah_sanguin;
	//x jawaban_c  koleris
	$jumlah_jawaban_c_koleris = get_jumlah_sum_atribut($db_object, "jawaban_c", "Koleris");
	$x_jawaban_c_koleris = $jumlah_jawaban_c_koleris/$jumlah_koleris;
        //x jawaban_c  melankolis
	$jumlah_jawaban_c_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Melankolis");
	$x_jawaban_c_melankolis = $jumlah_jawaban_c_melankolis/$jumlah_melankolis;
        //x jawaban_c  plegmatis
	$jumlah_jawaban_c_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Plegmatis");
	$x_jawaban_c_plegmatis = $jumlah_jawaban_c_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_c Sanguin
	$s2_jawaban_c_sanguin = get_s2_populasi($db_object, 'jawaban_c', 'Sanguin', $x_jawaban_c_sanguin, $jumlah_sanguin);
	//S2 jawaban_c Koleris
	$s2_jawaban_c_koleris = get_s2_populasi($db_object, 'jawaban_c', 'Koleris', $x_jawaban_c_koleris, $jumlah_koleris);
        //S2 jawaban_c Melankolis
	$s2_jawaban_c_melankolis = get_s2_populasi($db_object, 'jawaban_c', 'Melankolis', $x_jawaban_c_melankolis, $jumlah_melankolis);
        //S2 jawaban_c Koleris
	$s2_jawaban_c_plegmatis = get_s2_populasi($db_object, 'jawaban_c', 'Plegmatis', $x_jawaban_c_plegmatis, $jumlah_plegmatis);
        //S jawaban_c Sanguin
	$s_jawaban_c_sanguin = sqrt($s2_jawaban_c_sanguin);
	//S jawaban_c Koleris
	$s_jawaban_c_koleris = sqrt($s2_jawaban_c_koleris);
        //S jawaban_c Melankolis
	$s_jawaban_c_melankolis = sqrt($s2_jawaban_c_melankolis);
        //S jawaban_c Plegmatis
	$s_jawaban_c_plegmatis = sqrt($s2_jawaban_c_plegmatis);
        //s2 ^2 jawaban_c sanguin
        $s2_pangkat2_jawaban_c_sanguin = pow($s2_jawaban_c_sanguin, 2);
        //s2 ^2 jawaban_c koleris
        $s2_pangkat2_jawaban_c_koleris = pow($s2_jawaban_c_koleris, 2);
        //s2 ^2 jawaban_c melankolis
        $s2_pangkat2_jawaban_c_melankolis = pow($s2_jawaban_c_melankolis, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_jawaban_c_plegmatis = pow($s2_jawaban_c_plegmatis, 2);
        //===============================================================
        //x jawaban_d sanguin
	$jumlah_jawaban_d_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_d", "Sanguin");
	$x_jawaban_d_sanguin = $jumlah_jawaban_d_sanguin/$jumlah_sanguin;
	//x jawaban_d  koleris
	$jumlah_jawaban_d_koleris = get_jumlah_sum_atribut($db_object, "jawaban_d", "Koleris");
	$x_jawaban_d_koleris = $jumlah_jawaban_d_koleris/$jumlah_koleris;
        //x jawaban_d  melankolis
	$jumlah_jawaban_d_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Melankolis");
	$x_jawaban_d_melankolis = $jumlah_jawaban_d_melankolis/$jumlah_melankolis;
        //x jawaban_d  plegmatis
	$jumlah_jawaban_d_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Plegmatis");
	$x_jawaban_d_plegmatis = $jumlah_jawaban_d_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_d Sanguin
	$s2_jawaban_d_sanguin = get_s2_populasi($db_object, 'jawaban_d', 'Sanguin', $x_jawaban_d_sanguin, $jumlah_sanguin);
	//S2 jawaban_d Koleris
	$s2_jawaban_d_koleris = get_s2_populasi($db_object, 'jawaban_d', 'Koleris', $x_jawaban_d_koleris, $jumlah_koleris);
        //S2 jawaban_d Melankolis
	$s2_jawaban_d_melankolis = get_s2_populasi($db_object, 'jawaban_d', 'Melankolis', $x_jawaban_d_melankolis, $jumlah_melankolis);
        //S2 jawaban_d Koleris
	$s2_jawaban_d_plegmatis = get_s2_populasi($db_object, 'jawaban_d', 'Plegmatis', $x_jawaban_d_plegmatis, $jumlah_plegmatis);
        //S jawaban_d Sanguin
	$s_jawaban_d_sanguin = sqrt($s2_jawaban_d_sanguin);
	//S jawaban_d Koleris
	$s_jawaban_d_koleris = sqrt($s2_jawaban_d_koleris);
        //S jawaban_d Melankolis
	$s_jawaban_d_melankolis = sqrt($s2_jawaban_d_melankolis);
        //S jawaban_d Plegmatis
	$s_jawaban_d_plegmatis = sqrt($s2_jawaban_d_plegmatis);
        
        //s2 ^2 jawaban_d sanguin
        $s2_pangkat2_jawaban_d_sanguin = pow($s2_jawaban_d_sanguin, 2);
        //s2 ^2 jawaban_d koleris
        $s2_pangkat2_jawaban_d_koleris = pow($s2_jawaban_d_koleris, 2);
        //s2 ^2 jawaban_d melankolis
        $s2_pangkat2_jawaban_d_melankolis = pow($s2_jawaban_d_melankolis, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_jawaban_d_plegmatis = pow($s2_jawaban_d_plegmatis, 2);
        //======================================================================
        //#HITUNG PROBABILITAS DENGAN DATA UJI
        
	$dua_phi = (2*3.14);
        //#usia
        //sanguin
	$depan_usia_sanguin = sqrt($dua_phi*$s2_usia_sanguin);
	$belakang_usia_sanguin = exp( ((pow($usia-$x_usia_sanguin,2)) / (2*$s2_pangkat2_usia_sanguin)));
	$prob_usia_sanguin = 1/($depan_usia_sanguin * $belakang_usia_sanguin);
        //koleris
	$depan_usia_koleris = sqrt($dua_phi*$s2_usia_koleris);
	$belakang_usia_koleris = exp( ((pow($usia-$x_usia_koleris,2)) / (2*$s2_pangkat2_usia_koleris)));
	$prob_usia_koleris = 1/($depan_usia_koleris * $belakang_usia_koleris);
        //melankolis
	$depan_usia_melankolis = sqrt($dua_phi*$s2_usia_melankolis);
	$belakang_usia_melankolis = exp( ((pow($usia-$x_usia_melankolis,2)) / (2*$s2_pangkat2_usia_melankolis)));
	$prob_usia_melankolis = 1/($depan_usia_melankolis * $belakang_usia_melankolis);
        //plegmatis
	$depan_usia_plegmatis = sqrt($dua_phi*$s2_usia_plegmatis);
	$belakang_usia_plegmatis = exp( ((pow($usia-$x_usia_plegmatis,2)) / (2*$s2_pangkat2_usia_plegmatis)));
	$prob_usia_plegmatis = 1/($depan_usia_plegmatis * $belakang_usia_plegmatis);
        //display
        //probablitas jenis_kelamin
	$prob_jenis_kelamin_sanguin = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Sanguin") / $jumlah_sanguin;
	$prob_jenis_kelamin_koleris = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Koleris") / $jumlah_koleris;
        $prob_jenis_kelamin_melankolis = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Melankolis") / $jumlah_melankolis;
        $prob_jenis_kelamin_plegmatis = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Plegmatis") / $jumlah_plegmatis;
	//probablitas jurusan
	$prob_jurusan_sanguin = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Sanguin") / $jumlah_sanguin;
	$prob_jurusan_koleris = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Koleris") / $jumlah_koleris;
        $prob_jurusan_melankolis = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Melankolis") / $jumlah_melankolis;
        $prob_jurusan_plegmatis = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Plegmatis") / $jumlah_plegmatis;
	
        //#jawaban_a
        //sanguin
        //	$depan_usia_sanguin = sqrt($dua_phi*$s2_usia_sanguin);
        //	$belakang_usia_sanguin = exp( ((pow($usia-$x_usia_sanguin,2)) / (2*$s2_pangkat2_usia_sanguin)));
        //	$prob_usia_sanguin = 1/($depan_usia_sanguin * $belakang_usia_sanguin);
        //sanguin
	$depan_jawaban_a_sanguin = sqrt($dua_phi*$s2_jawaban_a_sanguin);
	$belakang_jawaban_a_sanguin = exp( ((pow($jawaban_a-$x_jawaban_a_sanguin,2)) / (2*$s2_pangkat2_jawaban_a_sanguin)));
	$prob_jawaban_a_sanguin = 1/($depan_jawaban_a_sanguin * $belakang_jawaban_a_sanguin);
        //koleris
	$depan_jawaban_a_koleris = sqrt($dua_phi*$s2_jawaban_a_koleris);
	$belakang_jawaban_a_koleris = exp( ((pow($jawaban_a-$x_jawaban_a_koleris,2)) / (2*$s2_pangkat2_jawaban_a_koleris)));
	$prob_jawaban_a_koleris = 1/($depan_jawaban_a_koleris * $belakang_jawaban_a_koleris);
        //melankolis
	$depan_jawaban_a_melankolis = sqrt($dua_phi*$s2_jawaban_a_melankolis);
	$belakang_jawaban_a_melankolis = exp( ((pow($jawaban_a-$x_jawaban_a_melankolis,2)) / (2*$s2_pangkat2_jawaban_a_melankolis)));
	$prob_jawaban_a_melankolis = 1/($depan_jawaban_a_melankolis * $belakang_jawaban_a_melankolis);
        //plegmatis
	$depan_jawaban_a_plegmatis = sqrt($dua_phi*$s2_jawaban_a_plegmatis);
	$belakang_jawaban_a_plegmatis = exp( ((pow($jawaban_a-$x_jawaban_a_plegmatis,2)) / (2*$s2_pangkat2_jawaban_a_plegmatis)));
	$prob_jawaban_a_plegmatis = 1/($depan_jawaban_a_plegmatis * $belakang_jawaban_a_plegmatis);
        //display
        //#jawaban_b
        //sanguin
	$depan_jawaban_b_sanguin = sqrt($dua_phi*$s2_jawaban_b_sanguin);
	$belakang_jawaban_b_sanguin = exp( ((pow($jawaban_b-$x_jawaban_b_sanguin,2)) / (2*$s2_pangkat2_jawaban_b_sanguin)));
	$prob_jawaban_b_sanguin = 1/($depan_jawaban_b_sanguin * $belakang_jawaban_b_sanguin);
        //koleris
	$depan_jawaban_b_koleris = sqrt($dua_phi*$s2_jawaban_b_koleris);
	$belakang_jawaban_b_koleris = exp( ((pow($jawaban_b-$x_jawaban_b_koleris,2)) / (2*$s2_pangkat2_jawaban_b_koleris)));
	$prob_jawaban_b_koleris = 1/($depan_jawaban_b_koleris * $belakang_jawaban_b_koleris);
        //melankolis
	$depan_jawaban_b_melankolis = sqrt($dua_phi*$s2_jawaban_b_melankolis);
	$belakang_jawaban_b_melankolis = exp( ((pow($jawaban_b-$x_jawaban_b_melankolis,2)) / (2*$s2_pangkat2_jawaban_b_melankolis)));
	$prob_jawaban_b_melankolis = 1/($depan_jawaban_b_melankolis * $belakang_jawaban_b_melankolis);
        //plegmatis
	$depan_jawaban_b_plegmatis = sqrt($dua_phi*$s2_jawaban_b_plegmatis);
	$belakang_jawaban_b_plegmatis = exp( ((pow($jawaban_b-$x_jawaban_b_plegmatis,2)) / (2*$s2_pangkat2_jawaban_b_plegmatis)));
	$prob_jawaban_b_plegmatis = 1/($depan_jawaban_b_plegmatis * $belakang_jawaban_b_plegmatis);
        //display
        //#jawaban_c
        //sanguin
	$depan_jawaban_c_sanguin = sqrt($dua_phi*$s2_jawaban_c_sanguin);
	$belakang_jawaban_c_sanguin = exp( ((pow($jawaban_c-$x_jawaban_c_sanguin,2)) / (2*$s2_pangkat2_jawaban_c_sanguin)));
	$prob_jawaban_c_sanguin = 1/($depan_jawaban_c_sanguin * $belakang_jawaban_c_sanguin);
        //koleris
	$depan_jawaban_c_koleris = sqrt($dua_phi*$s2_jawaban_c_koleris);
	$belakang_jawaban_c_koleris = exp( ((pow($jawaban_c-$x_jawaban_c_koleris,2)) / (2*$s2_pangkat2_jawaban_c_koleris)));
	$prob_jawaban_c_koleris = 1/($depan_jawaban_c_koleris * $belakang_jawaban_c_koleris);
        //melankolis
	$depan_jawaban_c_melankolis = sqrt($dua_phi*$s2_jawaban_c_melankolis);
	$belakang_jawaban_c_melankolis = exp( ((pow($jawaban_c-$x_jawaban_c_melankolis,2)) / (2*$s2_pangkat2_jawaban_c_melankolis)));
	$prob_jawaban_c_melankolis = 1/($depan_jawaban_c_melankolis * $belakang_jawaban_c_melankolis);
        //plegmatis
	$depan_jawaban_c_plegmatis = sqrt($dua_phi*$s2_jawaban_c_plegmatis);
	$belakang_jawaban_c_plegmatis = exp( ((pow($jawaban_c-$x_jawaban_c_plegmatis,2)) / (2*$s2_pangkat2_jawaban_c_plegmatis)));
	$prob_jawaban_c_plegmatis = 1/($depan_jawaban_c_plegmatis * $belakang_jawaban_c_plegmatis);
        //display
        //======================================================================
        //#jawaban_d
        //sanguin
        //        $depan_jawaban_a_plegmatis = sqrt($dua_phi*$s2_jawaban_a_plegmatis);
        //	$belakang_jawaban_a_plegmatis = exp( ((pow($jawaban_a-$x_jawaban_a_plegmatis,2)) / (2*$s2_pangkat2_jawaban_a_plegmatis)));
        //	$prob_jawaban_a_plegmatis = 1/($depan_jawaban_a_plegmatis * $belakang_jawaban_a_plegmatis);
	$depan_jawaban_d_sanguin = sqrt($dua_phi*$s2_jawaban_d_sanguin);
	$belakang_jawaban_d_sanguin = exp( ((pow($jawaban_d-$x_jawaban_d_sanguin,2)) / (2*$s2_pangkat2_jawaban_d_sanguin)));
	$prob_jawaban_d_sanguin = 1/($depan_jawaban_d_sanguin * $belakang_jawaban_d_sanguin);
        //koleris
	$depan_jawaban_d_koleris = sqrt($dua_phi*$s2_jawaban_d_koleris);
	$belakang_jawaban_d_koleris = exp( ((pow($jawaban_d-$x_jawaban_d_koleris,2)) / (2*$s2_pangkat2_jawaban_d_koleris)));
	$prob_jawaban_d_koleris = 1/($depan_jawaban_d_koleris * $belakang_jawaban_d_koleris);
        //melankolis
	$depan_jawaban_d_melankolis = sqrt($dua_phi*$s2_jawaban_d_melankolis);
	$belakang_jawaban_d_melankolis = exp( ((pow($jawaban_d-$x_jawaban_d_melankolis,2)) / (2*$s2_pangkat2_jawaban_d_melankolis)));
	$prob_jawaban_d_melankolis = 1/($depan_jawaban_d_melankolis * $belakang_jawaban_d_melankolis);
        //plegmatis
	$depan_jawaban_d_plegmatis = sqrt($dua_phi*$s2_jawaban_d_plegmatis);
	$belakang_jawaban_d_plegmatis = exp( ((pow($jawaban_d-$x_jawaban_d_plegmatis,2)) / (2*$s2_pangkat2_jawaban_d_plegmatis)));
	$prob_jawaban_d_plegmatis = 1/($depan_jawaban_d_plegmatis * $belakang_jawaban_d_plegmatis);
        $nilai_sanguin = $p_sanguin * $prob_jenis_kelamin_sanguin * $prob_jurusan_sanguin *
					$prob_usia_sanguin * $prob_jawaban_a_sanguin * $prob_jawaban_b_sanguin * 
                                        $prob_jawaban_c_sanguin * $prob_jawaban_d_sanguin;
        	    //===============================
        $nilai_koleris = $p_koleris * $prob_jenis_kelamin_koleris * $prob_jurusan_koleris *
					$prob_usia_koleris * $prob_jawaban_a_koleris * $prob_jawaban_b_koleris * 
                                        $prob_jawaban_c_koleris * $prob_jawaban_d_koleris;
	    //===============================
        $nilai_melankolis = $p_melankolis * $prob_jenis_kelamin_melankolis * $prob_jurusan_melankolis *
					$prob_usia_melankolis * $prob_jawaban_a_melankolis * $prob_jawaban_b_melankolis * 
                                        $prob_jawaban_c_melankolis * $prob_jawaban_d_melankolis;
	    $nilai_plegmatis = $p_plegmatis * $prob_jenis_kelamin_plegmatis * $prob_jurusan_plegmatis *
					$prob_usia_plegmatis * $prob_jawaban_a_plegmatis * $prob_jawaban_b_plegmatis * 
                                        $prob_jawaban_c_plegmatis * $prob_jawaban_d_plegmatis;
	$hasil_prediksi = '';
    if($nilai_sanguin>=$nilai_koleris && $nilai_sanguin>=$nilai_melankolis && $nilai_sanguin>=$nilai_plegmatis){
        $hasil_prediksi = 'Sanguin';
    }
    elseif($nilai_koleris>=$nilai_sanguin && $nilai_koleris>=$nilai_melankolis && $nilai_koleris>=$nilai_plegmatis){
    	$hasil_prediksi = 'Koleris';
    }
    elseif($nilai_melankolis>=$nilai_sanguin && $nilai_melankolis>=$nilai_koleris && $nilai_melankolis>=$nilai_plegmatis){
    	$hasil_prediksi = 'Melankolis';
    }
    elseif($nilai_plegmatis>=$nilai_sanguin && $nilai_plegmatis>=$nilai_koleris && $nilai_plegmatis>=$nilai_melankolis){
    	$hasil_prediksi = 'Plegmatis';
    }
    
        if($show_perhitungan){

    echo "<h2>Hasil prediksi = ".$hasil_prediksi."</h2>";
	 echo "<table class='table table-bordered table-striped table-hover' style='width:100%; margin-bottom:20px; table-layout:fixed;'>";
                echo "<thead style='background:#f5f5f5'>";
                echo "<tr>";
                        echo "<th style='width:32%'>Atribut</th>";
                        echo "<th style='width:17%'>Sanguin</th>";
                        echo "<th style='width:17%'>Koleris</th>";
                        echo "<th style='width:17%'>Melankolis</th>";
                        echo "<th style='width:17%'>Plegmatis</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr>";
                        echo "<td>Usia</td>";
                        echo "<td>".number_format($prob_usia_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_usia_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_usia_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_usia_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>Jenis Kelamin</td>";
                        echo "<td>".number_format($prob_jenis_kelamin_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jenis_kelamin_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jenis_kelamin_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jenis_kelamin_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>Jurusan</td>";
                        echo "<td>".number_format($prob_jurusan_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jurusan_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jurusan_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jurusan_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>A</td>";
                        echo "<td>".number_format($prob_jawaban_a_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_a_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_a_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_a_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>B</td>";
                        echo "<td>".number_format($prob_jawaban_b_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_b_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_b_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_b_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>C</td>";
                        echo "<td>".number_format($prob_jawaban_c_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_c_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_c_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_c_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>D</td>";
                        echo "<td>".number_format($prob_jawaban_d_sanguin, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_d_koleris, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_d_melankolis, dec())."</td>";
                        echo "<td>".number_format($prob_jawaban_d_plegmatis, dec())."</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>Nilai Akhir</td>";
                        echo "<td>".number_format($nilai_sanguin, 20)."</td>";
                        echo "<td>".number_format($nilai_koleris, 20)."</td>";
                        echo "<td>".number_format($nilai_melankolis, 20)."</td>";
                        echo "<td>".number_format($nilai_plegmatis, 20)."</td>";
                echo "</tr>";
                echo "</tbody>";
        echo "</table>";
        }
	
    echo "<br>";

        //    $nilai_sanguin = number_format($nilai_sanguin, 50);
        //    $nilai_koleris = number_format($nilai_koleris, 50);
    if($id_data_uji>0){
        $res_hasil = update_hasil_prediksi($db_object, $id_data_uji, $hasil_prediksi, 
                $nilai_sanguin, $nilai_koleris, $nilai_melankolis, $nilai_plegmatis);
    }
    return array($hasil_prediksi, $nilai_sanguin, $nilai_koleris, $nilai_melankolis, $nilai_plegmatis);
      
}
function ProsesNaiveBayes($db_object, $id_data_uji=0, $jenis_kelamin, $usia, $jurusan, 
        $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $show_perhitungan=true){
	
	$jumlah_data = jumlah_data_latih($db_object);//jumlah data latih
	$jumlah_sanguin = jumlah_data_latih($db_object, " WHERE kelas_asli='Sanguin'");//jumlah sanguin
	$jumlah_koleris = jumlah_data_latih($db_object, " WHERE kelas_asli='Koleris'");//jumlah koleris
        $jumlah_melankolis = jumlah_data_latih($db_object, " WHERE kelas_asli='Melankolis'");//jumlah melankolis
        $jumlah_plegmatis = jumlah_data_latih($db_object, " WHERE kelas_asli='Plegmatis'");//jumlah plegmatis

	$p_sanguin = $jumlah_sanguin/$jumlah_data;
	$p_koleris = $jumlah_koleris/$jumlah_data;
        $p_melankolis = $jumlah_melankolis/$jumlah_data;
        $p_plegmatis = $jumlah_plegmatis/$jumlah_data;

	//jumlah atribut jenis kelamin
	$jumlah_jenis_kelamin_laki_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_laki_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_laki_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_laki_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='L' AND kelas_asli='Plegmatis'");
        
	$jumlah_jenis_kelamin_perempuan_sanguin = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Sanguin'");
	$jumlah_jenis_kelamin_perempuan_koleris = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Koleris'");
        $jumlah_jenis_kelamin_perempuan_melankolis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Melankolis'");
        $jumlah_jenis_kelamin_perempuan_plegmatis = jumlah_data_latih($db_object, " WHERE jenis_kelamin='P' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jenis_kelamin
	$p_jenis_kelamin_laki_sanguin = $jumlah_jenis_kelamin_laki_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_laki_koleris = $jumlah_jenis_kelamin_laki_koleris/$jumlah_koleris;
        $p_jenis_kelamin_laki_melankolis = $jumlah_jenis_kelamin_laki_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_laki_plegmatis = $jumlah_jenis_kelamin_laki_plegmatis/$jumlah_plegmatis;
        
	$p_jenis_kelamin_perempuan_sanguin = $jumlah_jenis_kelamin_perempuan_sanguin/$jumlah_sanguin;
	$p_jenis_kelamin_perempuan_koleris = $jumlah_jenis_kelamin_perempuan_koleris/$jumlah_koleris;
        $p_jenis_kelamin_perempuan_melankolis = $jumlah_jenis_kelamin_perempuan_melankolis/$jumlah_melankolis;
        $p_jenis_kelamin_perempuan_plegmatis = $jumlah_jenis_kelamin_perempuan_plegmatis/$jumlah_plegmatis;
        
	//------------------------------------------------------------------------------
	//jumlah atribut jurusan
	$jumlah_jurusan_IPS_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Sanguin'");
        $jumlah_jurusan_IPS_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPS_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPS_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPS' AND kelas_asli='Plegmatis'");
        
        $jumlah_jurusan_IPA_sanguin = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Sanguin'");
	$jumlah_jurusan_IPA_koleris = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Koleris'");
        $jumlah_jurusan_IPA_melankolis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Melankolis'");
        $jumlah_jurusan_IPA_plegmatis = jumlah_data_latih($db_object, " WHERE jurusan='IPA' AND kelas_asli='Plegmatis'");
        
	//probabilitas atribut jurusan
	$p_jurusan_IPS_sanguin = $jumlah_jurusan_IPS_sanguin/$jumlah_sanguin;
	$p_jurusan_IPS_koleris = $jumlah_jurusan_IPS_koleris/$jumlah_koleris;
        $p_jurusan_IPS_melankolis = $jumlah_jurusan_IPS_melankolis/$jumlah_melankolis;
        $p_jurusan_IPS_plegmatis = $jumlah_jurusan_IPS_plegmatis/$jumlah_plegmatis;
        
	$p_jurusan_IPA_sanguin = $jumlah_jurusan_IPA_sanguin/$jumlah_sanguin;
	$p_jurusan_IPA_koleris = $jumlah_jurusan_IPA_koleris/$jumlah_koleris;
	$p_jurusan_IPA_melankolis = $jumlah_jurusan_IPA_melankolis/$jumlah_melankolis;
	$p_jurusan_IPA_plegmatis = $jumlah_jurusan_IPA_plegmatis/$jumlah_plegmatis;
	//display table probabilitas jurusan
        
	//xusia sanguin
	$jumlah_usia_sanguin = get_jumlah_sum_atribut($db_object, "usia", "Sanguin");
	$x_usia_sanguin = $jumlah_usia_sanguin/$jumlah_sanguin;
	//xusia  koleris
	$jumlah_usia_koleris = get_jumlah_sum_atribut($db_object, "usia", "Koleris");
	$x_usia_koleris = $jumlah_usia_koleris/$jumlah_koleris;
        //xusia  melankolis
	$jumlah_usia_melankolis = get_jumlah_sum_atribut($db_object, "usia", "Melankolis");
	$x_usia_melankolis = $jumlah_usia_melankolis/$jumlah_melankolis;
        //xusia  plegmatis
	$jumlah_usia_plegmatis = get_jumlah_sum_atribut($db_object, "usia", "Plegmatis");
	$x_usia_plegmatis = $jumlah_usia_plegmatis/$jumlah_plegmatis;
        
        //S2usia Sanguin
	$s2_usia_sanguin = get_s2_populasi($db_object, 'usia', 'Sanguin', $x_usia_sanguin, $jumlah_sanguin);
	//S2usia Koleris
	$s2_usia_koleris = get_s2_populasi($db_object, 'usia', 'Koleris', $x_usia_koleris, $jumlah_koleris);
        //S2usia Melankolis
	$s2_usia_melankolis = get_s2_populasi($db_object, 'usia', 'Melankolis', $x_usia_melankolis, $jumlah_melankolis);
        //S2usia Plegmatis
	$s2_usia_plegmatis = get_s2_populasi($db_object, 'usia', 'Plegmatis', $x_usia_plegmatis, $jumlah_plegmatis);
        //S usia Sanguin
	$s_usia_sanguin = sqrt($s2_usia_sanguin);
	//S usia Koleris
	$s_usia_koleris = sqrt($s2_usia_koleris);
        //S usia Melankolis
	$s_usia_melankolis = sqrt($s2_usia_melankolis);
        //S usia Plegmatis
	$s_usia_plegmatis = sqrt($s2_usia_plegmatis);
        
        //s2 ^2 usia sanguin
        $s2_pangkat2_usia_sanguin = pow($s2_usia_sanguin, 2);
        //s2 ^2 usia koleris
        $s2_pangkat2_usia_koleris = pow($s2_usia_koleris, 2);
        //s2 ^2 usia melankolis
        $s2_pangkat2_usia_melankolis = pow($s2_usia_melankolis, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_usia_plegmatis = pow($s2_usia_plegmatis, 2);
        
        //======================================================================
        //jawaban_a
        //x jawaban_a sanguin
	$jumlah_jawaban_a_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_a", "Sanguin");
	$x_jawaban_a_sanguin = $jumlah_jawaban_a_sanguin/$jumlah_sanguin;
	//x jawaban_a  koleris
	$jumlah_jawaban_a_koleris = get_jumlah_sum_atribut($db_object, "jawaban_a", "Koleris");
	$x_jawaban_a_koleris = $jumlah_jawaban_a_koleris/$jumlah_koleris;
        //x jawaban_a  melankolis
	$jumlah_jawaban_a_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Melankolis");
	$x_jawaban_a_melankolis = $jumlah_jawaban_a_melankolis/$jumlah_melankolis;
        //x jawaban_a  plegmatis
	$jumlah_jawaban_a_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_a", "Plegmatis");
	$x_jawaban_a_plegmatis = $jumlah_jawaban_a_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_a Sanguin
	$s2_jawaban_a_sanguin = get_s2_populasi($db_object, 'jawaban_a', 'Sanguin', $x_jawaban_a_sanguin, $jumlah_sanguin);
	//S2 jawaban_a Koleris
	$s2_jawaban_a_koleris = get_s2_populasi($db_object, 'jawaban_a', 'Koleris', $x_jawaban_a_koleris, $jumlah_koleris);
        //S2 jawaban_a Melankolis
	$s2_jawaban_a_melankolis = get_s2_populasi($db_object, 'jawaban_a', 'Melankolis', $x_jawaban_a_melankolis, $jumlah_melankolis);
        //S2 jawaban_a Koleris
	$s2_jawaban_a_plegmatis = get_s2_populasi($db_object, 'jawaban_a', 'Plegmatis', $x_jawaban_a_plegmatis, $jumlah_plegmatis);
        //S jawaban_a Sanguin
	$s_jawaban_a_sanguin = sqrt($s2_jawaban_a_sanguin);
	//S jawaban_a Koleris
	$s_jawaban_a_koleris = sqrt($s2_jawaban_a_koleris);
        //S jawaban_a Melankolis
	$s_jawaban_a_melankolis = sqrt($s2_jawaban_a_melankolis);
        //S jawaban_a Plegmatis
	$s_jawaban_a_plegmatis = sqrt($s2_jawaban_a_plegmatis);
        //s2 ^2 jawaban_a sanguin
        $s2_pangkat2_jawaban_a_sanguin = pow($s2_jawaban_a_sanguin, 2);
        //s2 ^2 jawaban_a koleris
        $s2_pangkat2_jawaban_a_koleris = pow($s2_jawaban_a_koleris, 2);
        //s2 ^2 jawaban_a melankolis
        $s2_pangkat2_jawaban_a_melankolis = pow($s2_jawaban_a_melankolis, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_jawaban_a_plegmatis = pow($s2_jawaban_a_plegmatis, 2);
        
        //==================================================
        //jawaban_b
        //x jawaban_b sanguin
	$jumlah_jawaban_b_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_b", "Sanguin");
	$x_jawaban_b_sanguin = $jumlah_jawaban_b_sanguin/$jumlah_sanguin;
	//x jawaban_b  koleris
	$jumlah_jawaban_b_koleris = get_jumlah_sum_atribut($db_object, "jawaban_b", "Koleris");
	$x_jawaban_b_koleris = $jumlah_jawaban_b_koleris/$jumlah_koleris;
        //x jawaban_b  melankolis
	$jumlah_jawaban_b_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Melankolis");
	$x_jawaban_b_melankolis = $jumlah_jawaban_b_melankolis/$jumlah_melankolis;
        //x jawaban_b  plegmatis
	$jumlah_jawaban_b_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_b", "Plegmatis");
	$x_jawaban_b_plegmatis = $jumlah_jawaban_b_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_b Sanguin
	$s2_jawaban_b_sanguin = get_s2_populasi($db_object, 'jawaban_b', 'Sanguin', $x_jawaban_b_sanguin, $jumlah_sanguin);
	//S2 jawaban_b Koleris
	$s2_jawaban_b_koleris = get_s2_populasi($db_object, 'jawaban_b', 'Koleris', $x_jawaban_b_koleris, $jumlah_koleris);
        //S2 jawaban_b Melankolis
	$s2_jawaban_b_melankolis = get_s2_populasi($db_object, 'jawaban_b', 'Melankolis', $x_jawaban_b_melankolis, $jumlah_melankolis);
        //S2 jawaban_b Koleris
	$s2_jawaban_b_plegmatis = get_s2_populasi($db_object, 'jawaban_b', 'Plegmatis', $x_jawaban_b_plegmatis, $jumlah_plegmatis);
        //S jawaban_b Sanguin
	$s_jawaban_b_sanguin = sqrt($s2_jawaban_b_sanguin);
	//S jawaban_b Koleris
	$s_jawaban_b_koleris = sqrt($s2_jawaban_b_koleris);
        //S jawaban_b Melankolis
	$s_jawaban_b_melankolis = sqrt($s2_jawaban_b_melankolis);
        //S jawaban_b Plegmatis
	$s_jawaban_b_plegmatis = sqrt($s2_jawaban_b_plegmatis);
        
        //s2 ^2 jawaban_b sanguin
        $s2_pangkat2_jawaban_b_sanguin = pow($s2_jawaban_b_sanguin, 2);
        //s2 ^2 jawaban_b koleris
        $s2_pangkat2_jawaban_b_koleris = pow($s2_jawaban_b_koleris, 2);
        //s2 ^2 jawaban_b melankolis
        $s2_pangkat2_jawaban_b_melankolis = pow($s2_jawaban_b_melankolis, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_jawaban_b_plegmatis = pow($s2_jawaban_b_plegmatis, 2);
        //========================================================
        //jawaban_c
        //x jawaban_c sanguin
	$jumlah_jawaban_c_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_c", "Sanguin");
	$x_jawaban_c_sanguin = $jumlah_jawaban_c_sanguin/$jumlah_sanguin;
	//x jawaban_c  koleris
	$jumlah_jawaban_c_koleris = get_jumlah_sum_atribut($db_object, "jawaban_c", "Koleris");
	$x_jawaban_c_koleris = $jumlah_jawaban_c_koleris/$jumlah_koleris;
        //x jawaban_c  melankolis
	$jumlah_jawaban_c_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Melankolis");
	$x_jawaban_c_melankolis = $jumlah_jawaban_c_melankolis/$jumlah_melankolis;
        //x jawaban_c  plegmatis
	$jumlah_jawaban_c_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_c", "Plegmatis");
	$x_jawaban_c_plegmatis = $jumlah_jawaban_c_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_c Sanguin
	$s2_jawaban_c_sanguin = get_s2_populasi($db_object, 'jawaban_c', 'Sanguin', $x_jawaban_c_sanguin, $jumlah_sanguin);
	//S2 jawaban_c Koleris
	$s2_jawaban_c_koleris = get_s2_populasi($db_object, 'jawaban_c', 'Koleris', $x_jawaban_c_koleris, $jumlah_koleris);
        //S2 jawaban_c Melankolis
	$s2_jawaban_c_melankolis = get_s2_populasi($db_object, 'jawaban_c', 'Melankolis', $x_jawaban_c_melankolis, $jumlah_melankolis);
        //S2 jawaban_c Koleris
	$s2_jawaban_c_plegmatis = get_s2_populasi($db_object, 'jawaban_c', 'Plegmatis', $x_jawaban_c_plegmatis, $jumlah_plegmatis);
        //S jawaban_c Sanguin
	$s_jawaban_c_sanguin = sqrt($s2_jawaban_c_sanguin);
	//S jawaban_c Koleris
	$s_jawaban_c_koleris = sqrt($s2_jawaban_c_koleris);
        //S jawaban_c Melankolis
	$s_jawaban_c_melankolis = sqrt($s2_jawaban_c_melankolis);
        //S jawaban_c Plegmatis
	$s_jawaban_c_plegmatis = sqrt($s2_jawaban_c_plegmatis);
        //s2 ^2 jawaban_c sanguin
        $s2_pangkat2_jawaban_c_sanguin = pow($s2_jawaban_c_sanguin, 2);
        //s2 ^2 jawaban_c koleris
        $s2_pangkat2_jawaban_c_koleris = pow($s2_jawaban_c_koleris, 2);
        //s2 ^2 jawaban_c melankolis
        $s2_pangkat2_jawaban_c_melankolis = pow($s2_jawaban_c_melankolis, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_jawaban_c_plegmatis = pow($s2_jawaban_c_plegmatis, 2);
        //===============================================================
        //x jawaban_d sanguin
	$jumlah_jawaban_d_sanguin = get_jumlah_sum_atribut($db_object, "jawaban_d", "Sanguin");
	$x_jawaban_d_sanguin = $jumlah_jawaban_d_sanguin/$jumlah_sanguin;
	//x jawaban_d  koleris
	$jumlah_jawaban_d_koleris = get_jumlah_sum_atribut($db_object, "jawaban_d", "Koleris");
	$x_jawaban_d_koleris = $jumlah_jawaban_d_koleris/$jumlah_koleris;
        //x jawaban_d  melankolis
	$jumlah_jawaban_d_melankolis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Melankolis");
	$x_jawaban_d_melankolis = $jumlah_jawaban_d_melankolis/$jumlah_melankolis;
        //x jawaban_d  plegmatis
	$jumlah_jawaban_d_plegmatis = get_jumlah_sum_atribut($db_object, "jawaban_d", "Plegmatis");
	$x_jawaban_d_plegmatis = $jumlah_jawaban_d_plegmatis/$jumlah_plegmatis;
        //S2 jawaban_d Sanguin
	$s2_jawaban_d_sanguin = get_s2_populasi($db_object, 'jawaban_d', 'Sanguin', $x_jawaban_d_sanguin, $jumlah_sanguin);
	//S2 jawaban_d Koleris
	$s2_jawaban_d_koleris = get_s2_populasi($db_object, 'jawaban_d', 'Koleris', $x_jawaban_d_koleris, $jumlah_koleris);
        //S2 jawaban_d Melankolis
	$s2_jawaban_d_melankolis = get_s2_populasi($db_object, 'jawaban_d', 'Melankolis', $x_jawaban_d_melankolis, $jumlah_melankolis);
        //S2 jawaban_d Koleris
	$s2_jawaban_d_plegmatis = get_s2_populasi($db_object, 'jawaban_d', 'Plegmatis', $x_jawaban_d_plegmatis, $jumlah_plegmatis);
        //S jawaban_d Sanguin
	$s_jawaban_d_sanguin = sqrt($s2_jawaban_d_sanguin);
	//S jawaban_d Koleris
	$s_jawaban_d_koleris = sqrt($s2_jawaban_d_koleris);
        //S jawaban_d Melankolis
	$s_jawaban_d_melankolis = sqrt($s2_jawaban_d_melankolis);
        //S jawaban_d Plegmatis
	$s_jawaban_d_plegmatis = sqrt($s2_jawaban_d_plegmatis);
        
        //s2 ^2 jawaban_d sanguin
        $s2_pangkat2_jawaban_d_sanguin = pow($s2_jawaban_d_sanguin, 2);
        //s2 ^2 jawaban_d koleris
        $s2_pangkat2_jawaban_d_koleris = pow($s2_jawaban_d_koleris, 2);
        //s2 ^2 jawaban_d melankolis
        $s2_pangkat2_jawaban_d_melankolis = pow($s2_jawaban_d_melankolis, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_jawaban_d_plegmatis = pow($s2_jawaban_d_plegmatis, 2);
        //======================================================================
        //#HITUNG PROBABILITAS DENGAN DATA UJI
        if($show_perhitungan){
        echo "<strong><h3>Probabilitas<br></h3></strong>";
        }
	$dua_phi = (2*3.14);
        //#usia
        //sanguin
	$depan_usia_sanguin = sqrt($dua_phi*$s2_usia_sanguin);
	$belakang_usia_sanguin = exp( ((pow($usia-$x_usia_sanguin,2)) / (2*$s2_pangkat2_usia_sanguin)));
	$prob_usia_sanguin = 1/($depan_usia_sanguin * $belakang_usia_sanguin);
        //koleris
	$depan_usia_koleris = sqrt($dua_phi*$s2_usia_koleris);
	$belakang_usia_koleris = exp( ((pow($usia-$x_usia_koleris,2)) / (2*$s2_pangkat2_usia_koleris)));
	$prob_usia_koleris = 1/($depan_usia_koleris * $belakang_usia_koleris);
        //melankolis
	$depan_usia_melankolis = sqrt($dua_phi*$s2_usia_melankolis);
	$belakang_usia_melankolis = exp( ((pow($usia-$x_usia_melankolis,2)) / (2*$s2_pangkat2_usia_melankolis)));
	$prob_usia_melankolis = 1/($depan_usia_melankolis * $belakang_usia_melankolis);
        //plegmatis
	$depan_usia_plegmatis = sqrt($dua_phi*$s2_usia_plegmatis);
	$belakang_usia_plegmatis = exp( ((pow($usia-$x_usia_plegmatis,2)) / (2*$s2_pangkat2_usia_plegmatis)));
	$prob_usia_plegmatis = 1/($depan_usia_plegmatis * $belakang_usia_plegmatis);
        //display
        if($show_perhitungan){
	echo "<br>";
        //	echo "P(usia|Sanguin)=".number_format($prob_usia_sanguin, dec())."<br>";
        //	echo "P(usia|Koleris)=".number_format($prob_usia_koleris, dec())."<br>";
        //        echo "P(usia|Melankolis)=".number_format($prob_usia_melankolis, dec())."<br>";
        //        echo "P(usia|Plegmatis)=".number_format($prob_usia_plegmatis, dec())."<br>";
        echo "P(usia|Sanguin)=".($prob_usia_sanguin)."<br>";
	echo "P(usia|Koleris)=".($prob_usia_koleris)."<br>";
        echo "P(usia|Melankolis)=".($prob_usia_melankolis)."<br>";
        echo "P(usia|Plegmatis)=".($prob_usia_plegmatis)."<br>";
        
        }
	//probablitas jenis_kelamin
	$prob_jenis_kelamin_sanguin = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Sanguin") / $jumlah_sanguin;
	$prob_jenis_kelamin_koleris = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Koleris") / $jumlah_koleris;
        $prob_jenis_kelamin_melankolis = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Melankolis") / $jumlah_melankolis;
        $prob_jenis_kelamin_plegmatis = get_jumlah_atribut($db_object, "jenis_kelamin", $jenis_kelamin, "Plegmatis") / $jumlah_plegmatis;
	if($show_perhitungan){
        echo "<br>";
	echo "P(jenis_kelamin|Sanguin)=".number_format($prob_jenis_kelamin_sanguin, dec())."<br>";
	echo "P(jenis_kelamin|Koleris)=".number_format($prob_jenis_kelamin_koleris, dec())."<br>";
        echo "P(jenis_kelamin|Melankolis)=".number_format($prob_jenis_kelamin_melankolis, dec())."<br>";
        echo "P(jenis_kelamin|Plegmatis)=".number_format($prob_jenis_kelamin_plegmatis, dec())."<br>";
        }
	//probablitas jurusan
	$prob_jurusan_sanguin = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Sanguin") / $jumlah_sanguin;
	$prob_jurusan_koleris = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Koleris") / $jumlah_koleris;
        $prob_jurusan_melankolis = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Melankolis") / $jumlah_melankolis;
        $prob_jurusan_plegmatis = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Plegmatis") / $jumlah_plegmatis;
	if($show_perhitungan){
        echo "<br>";
	echo "P(jurusan|Sanguin)=".number_format($prob_jurusan_sanguin, dec())."<br>";
	echo "P(jurusan|Koleris)=".number_format($prob_jurusan_koleris, dec())."<br>";
        echo "P(jurusan|Melankolis)=".number_format($prob_jurusan_melankolis, dec())."<br>";
        echo "P(jurusan|Plegmatis)=".number_format($prob_jurusan_plegmatis, dec())."<br>";
        }
        
        //#jawaban_a
        //sanguin
        //	$depan_usia_sanguin = sqrt($dua_phi*$s2_usia_sanguin);
        //	$belakang_usia_sanguin = exp( ((pow($usia-$x_usia_sanguin,2)) / (2*$s2_pangkat2_usia_sanguin)));
        //	$prob_usia_sanguin = 1/($depan_usia_sanguin * $belakang_usia_sanguin);
        //sanguin
	$depan_jawaban_a_sanguin = sqrt($dua_phi*$s2_jawaban_a_sanguin);
	$belakang_jawaban_a_sanguin = exp( ((pow($jawaban_a-$x_jawaban_a_sanguin,2)) / (2*$s2_pangkat2_jawaban_a_sanguin)));
	$prob_jawaban_a_sanguin = 1/($depan_jawaban_a_sanguin * $belakang_jawaban_a_sanguin);
        //koleris
	$depan_jawaban_a_koleris = sqrt($dua_phi*$s2_jawaban_a_koleris);
	$belakang_jawaban_a_koleris = exp( ((pow($jawaban_a-$x_jawaban_a_koleris,2)) / (2*$s2_pangkat2_jawaban_a_koleris)));
	$prob_jawaban_a_koleris = 1/($depan_jawaban_a_koleris * $belakang_jawaban_a_koleris);
        //melankolis
	$depan_jawaban_a_melankolis = sqrt($dua_phi*$s2_jawaban_a_melankolis);
	$belakang_jawaban_a_melankolis = exp( ((pow($jawaban_a-$x_jawaban_a_melankolis,2)) / (2*$s2_pangkat2_jawaban_a_melankolis)));
	$prob_jawaban_a_melankolis = 1/($depan_jawaban_a_melankolis * $belakang_jawaban_a_melankolis);
        //plegmatis
	$depan_jawaban_a_plegmatis = sqrt($dua_phi*$s2_jawaban_a_plegmatis);
	$belakang_jawaban_a_plegmatis = exp( ((pow($jawaban_a-$x_jawaban_a_plegmatis,2)) / (2*$s2_pangkat2_jawaban_a_plegmatis)));
	$prob_jawaban_a_plegmatis = 1/($depan_jawaban_a_plegmatis * $belakang_jawaban_a_plegmatis);
        //display
        if($show_perhitungan){
	echo "<br>";
	echo "P(jawaban_a|Sanguin)=".number_format($prob_jawaban_a_sanguin, dec())."<br>";
	echo "P(jawaban_a|Koleris)=".number_format($prob_jawaban_a_koleris, dec())."<br>";
        echo "P(jawaban_a|Melankolis)=".number_format($prob_jawaban_a_melankolis, dec())."<br>";
        echo "P(jawaban_a|Plegmatis)=".number_format($prob_jawaban_a_plegmatis, dec())."<br>";
        }
        //======================================================================
        //#jawaban_b
        //sanguin
	$depan_jawaban_b_sanguin = sqrt($dua_phi*$s2_jawaban_b_sanguin);
	$belakang_jawaban_b_sanguin = exp( ((pow($jawaban_b-$x_jawaban_b_sanguin,2)) / (2*$s2_pangkat2_jawaban_b_sanguin)));
	$prob_jawaban_b_sanguin = 1/($depan_jawaban_b_sanguin * $belakang_jawaban_b_sanguin);
        //koleris
	$depan_jawaban_b_koleris = sqrt($dua_phi*$s2_jawaban_b_koleris);
	$belakang_jawaban_b_koleris = exp( ((pow($jawaban_b-$x_jawaban_b_koleris,2)) / (2*$s2_pangkat2_jawaban_b_koleris)));
	$prob_jawaban_b_koleris = 1/($depan_jawaban_b_koleris * $belakang_jawaban_b_koleris);
        //melankolis
	$depan_jawaban_b_melankolis = sqrt($dua_phi*$s2_jawaban_b_melankolis);
	$belakang_jawaban_b_melankolis = exp( ((pow($jawaban_b-$x_jawaban_b_melankolis,2)) / (2*$s2_pangkat2_jawaban_b_melankolis)));
	$prob_jawaban_b_melankolis = 1/($depan_jawaban_b_melankolis * $belakang_jawaban_b_melankolis);
        //plegmatis
	$depan_jawaban_b_plegmatis = sqrt($dua_phi*$s2_jawaban_b_plegmatis);
	$belakang_jawaban_b_plegmatis = exp( ((pow($jawaban_b-$x_jawaban_b_plegmatis,2)) / (2*$s2_pangkat2_jawaban_b_plegmatis)));
	$prob_jawaban_b_plegmatis = 1/($depan_jawaban_b_plegmatis * $belakang_jawaban_b_plegmatis);
        //display
        if($show_perhitungan){
	echo "<br>";
	echo "P(jawaban_b|Sanguin)=".number_format($prob_jawaban_b_sanguin, dec())."<br>";
	echo "P(jawaban_b|Koleris)=".number_format($prob_jawaban_b_koleris, dec())."<br>";
        echo "P(jawaban_b|Melankolis)=".number_format($prob_jawaban_b_melankolis, dec())."<br>";
        echo "P(jawaban_b|Plegmatis)=".number_format($prob_jawaban_b_plegmatis, dec())."<br>";
        }
        //======================================================================
        //#jawaban_c
        //sanguin
	$depan_jawaban_c_sanguin = sqrt($dua_phi*$s2_jawaban_c_sanguin);
	$belakang_jawaban_c_sanguin = exp( ((pow($jawaban_c-$x_jawaban_c_sanguin,2)) / (2*$s2_pangkat2_jawaban_c_sanguin)));
	$prob_jawaban_c_sanguin = 1/($depan_jawaban_c_sanguin * $belakang_jawaban_c_sanguin);
        //koleris
	$depan_jawaban_c_koleris = sqrt($dua_phi*$s2_jawaban_c_koleris);
	$belakang_jawaban_c_koleris = exp( ((pow($jawaban_c-$x_jawaban_c_koleris,2)) / (2*$s2_pangkat2_jawaban_c_koleris)));
	$prob_jawaban_c_koleris = 1/($depan_jawaban_c_koleris * $belakang_jawaban_c_koleris);
        //melankolis
	$depan_jawaban_c_melankolis = sqrt($dua_phi*$s2_jawaban_c_melankolis);
	$belakang_jawaban_c_melankolis = exp( ((pow($jawaban_c-$x_jawaban_c_melankolis,2)) / (2*$s2_pangkat2_jawaban_c_melankolis)));
	$prob_jawaban_c_melankolis = 1/($depan_jawaban_c_melankolis * $belakang_jawaban_c_melankolis);
        //plegmatis
	$depan_jawaban_c_plegmatis = sqrt($dua_phi*$s2_jawaban_c_plegmatis);
	$belakang_jawaban_c_plegmatis = exp( ((pow($jawaban_c-$x_jawaban_c_plegmatis,2)) / (2*$s2_pangkat2_jawaban_c_plegmatis)));
	$prob_jawaban_c_plegmatis = 1/($depan_jawaban_c_plegmatis * $belakang_jawaban_c_plegmatis);
        //display
        if($show_perhitungan){
	echo "<br>";
	echo "P(jawaban_c|Sanguin)=".number_format($prob_jawaban_c_sanguin, dec())."<br>";
	echo "P(jawaban_c|Koleris)=".number_format($prob_jawaban_c_koleris, dec())."<br>";
        echo "P(jawaban_c|Melankolis)=".number_format($prob_jawaban_c_melankolis, dec())."<br>";
        echo "P(jawaban_c|Plegmatis)=".number_format($prob_jawaban_c_plegmatis, dec())."<br>";
        }
        //======================================================================
        //#jawaban_d
        //sanguin
        //        $depan_jawaban_a_plegmatis = sqrt($dua_phi*$s2_jawaban_a_plegmatis);
        //	$belakang_jawaban_a_plegmatis = exp( ((pow($jawaban_a-$x_jawaban_a_plegmatis,2)) / (2*$s2_pangkat2_jawaban_a_plegmatis)));
        //	$prob_jawaban_a_plegmatis = 1/($depan_jawaban_a_plegmatis * $belakang_jawaban_a_plegmatis);
	$depan_jawaban_d_sanguin = sqrt($dua_phi*$s2_jawaban_d_sanguin);
	$belakang_jawaban_d_sanguin = exp( ((pow($jawaban_d-$x_jawaban_d_sanguin,2)) / (2*$s2_pangkat2_jawaban_d_sanguin)));
	$prob_jawaban_d_sanguin = 1/($depan_jawaban_d_sanguin * $belakang_jawaban_d_sanguin);
        //koleris
	$depan_jawaban_d_koleris = sqrt($dua_phi*$s2_jawaban_d_koleris);
	$belakang_jawaban_d_koleris = exp( ((pow($jawaban_d-$x_jawaban_d_koleris,2)) / (2*$s2_pangkat2_jawaban_d_koleris)));
	$prob_jawaban_d_koleris = 1/($depan_jawaban_d_koleris * $belakang_jawaban_d_koleris);
        //melankolis
	$depan_jawaban_d_melankolis = sqrt($dua_phi*$s2_jawaban_d_melankolis);
	$belakang_jawaban_d_melankolis = exp( ((pow($jawaban_d-$x_jawaban_d_melankolis,2)) / (2*$s2_pangkat2_jawaban_d_melankolis)));
	$prob_jawaban_d_melankolis = 1/($depan_jawaban_d_melankolis * $belakang_jawaban_d_melankolis);
        //plegmatis
	$depan_jawaban_d_plegmatis = sqrt($dua_phi*$s2_jawaban_d_plegmatis);
	$belakang_jawaban_d_plegmatis = exp( ((pow($jawaban_d-$x_jawaban_d_plegmatis,2)) / (2*$s2_pangkat2_jawaban_d_plegmatis)));
	$prob_jawaban_d_plegmatis = 1/($depan_jawaban_d_plegmatis * $belakang_jawaban_d_plegmatis);
        //display
        if($show_perhitungan){
	echo "<br>";
	echo "P(jawaban_d|Sanguin)=".number_format($prob_jawaban_d_sanguin, dec())."<br>";
	echo "P(jawaban_d|Koleris)=".number_format($prob_jawaban_d_koleris, dec())."<br>";
        echo "P(jawaban_d|Melankolis)=".number_format($prob_jawaban_d_melankolis, dec())."<br>";
        echo "P(jawaban_d|Plegmatis)=".number_format($prob_jawaban_d_plegmatis, dec())."<br>";
        }
        //===============================
	$nilai_sanguin = $p_sanguin * $prob_jenis_kelamin_sanguin * $prob_jurusan_sanguin *
					$prob_usia_sanguin * $prob_jawaban_a_sanguin * $prob_jawaban_b_sanguin * 
                                        $prob_jawaban_c_sanguin * $prob_jawaban_d_sanguin;
        if($show_perhitungan){
	echo "<br>";
	echo "Nilai Sanguin = ".number_format($p_sanguin, dec())
                            ." x ".number_format($prob_jenis_kelamin_sanguin, dec())
                            ." x ".number_format($prob_jurusan_sanguin, dec())
                            ." x ".number_format($prob_usia_sanguin, dec())
                            ." x ".number_format($prob_jawaban_a_sanguin, dec())
                            ." x ".number_format($prob_jawaban_b_sanguin, dec())
                            ." x ".number_format($prob_jawaban_c_sanguin, dec())
                            ." x ".number_format($prob_jawaban_d_sanguin, dec())
                            ." = ".number_format($nilai_sanguin, 20);
        }
        //===============================
        $nilai_koleris = $p_koleris * $prob_jenis_kelamin_koleris * $prob_jurusan_koleris *
					$prob_usia_koleris * $prob_jawaban_a_koleris * $prob_jawaban_b_koleris * 
                                        $prob_jawaban_c_koleris * $prob_jawaban_d_koleris;
	if($show_perhitungan){
        echo "<br>";
	echo "Nilai Koleris = ".number_format($p_koleris, dec())
                            ." x ".number_format($prob_jenis_kelamin_koleris, dec())
                            ." x ".number_format($prob_jurusan_koleris, dec())
                            ." x ".number_format($prob_usia_koleris, dec())
                            ." x ".number_format($prob_jawaban_a_koleris, dec())
                            ." x ".number_format($prob_jawaban_b_koleris, dec())
                            ." x ".number_format($prob_jawaban_c_koleris, dec())
                            ." x ".number_format($prob_jawaban_d_koleris, dec())
                            ." = ".number_format($nilai_koleris, 20);
        }
        //===============================
        $nilai_melankolis = $p_melankolis * $prob_jenis_kelamin_melankolis * $prob_jurusan_melankolis *
					$prob_usia_melankolis * $prob_jawaban_a_melankolis * $prob_jawaban_b_melankolis * 
                                        $prob_jawaban_c_melankolis * $prob_jawaban_d_melankolis;
	if($show_perhitungan){
        echo "<br>";
	echo "Nilai Melankolis = ".number_format($p_melankolis, dec())
                            ." x ".number_format($prob_jenis_kelamin_melankolis, dec())
                            ." x ".number_format($prob_jurusan_melankolis, dec())
                            ." x ".number_format($prob_usia_melankolis, dec())
                            ." x ".number_format($prob_jawaban_a_melankolis, dec())
                            ." x ".number_format($prob_jawaban_b_melankolis, dec())
                            ." x ".number_format($prob_jawaban_c_melankolis, dec())
                            ." x ".number_format($prob_jawaban_d_melankolis, dec())
                            ." = ".number_format($nilai_melankolis, 20);
        }
        //===============================
        $nilai_plegmatis = $p_plegmatis * $prob_jenis_kelamin_plegmatis * $prob_jurusan_plegmatis *
					$prob_usia_plegmatis * $prob_jawaban_a_plegmatis * $prob_jawaban_b_plegmatis * 
                                        $prob_jawaban_c_plegmatis * $prob_jawaban_d_plegmatis;
	if($show_perhitungan){
        echo "<br>";
	echo "Nilai Plegmatis = ".number_format($p_plegmatis, dec())
                            ." x ".number_format($prob_jenis_kelamin_plegmatis, dec())
                            ." x ".number_format($prob_jurusan_plegmatis, dec())
                            ." x ".number_format($prob_usia_plegmatis, dec())
                            ." x ".number_format($prob_jawaban_a_plegmatis, dec())
                            ." x ".number_format($prob_jawaban_b_plegmatis, dec())
                            ." x ".number_format($prob_jawaban_c_plegmatis, dec())
                            ." x ".number_format($prob_jawaban_d_plegmatis, dec())
                            ." = ".number_format($nilai_plegmatis, 20);

    echo "<br><br>";
        }
    $hasil_prediksi = '';
    if($nilai_sanguin>=$nilai_koleris && $nilai_sanguin>=$nilai_melankolis && $nilai_sanguin>=$nilai_plegmatis){
        $hasil_prediksi = 'Sanguin';
    }
    elseif($nilai_koleris>=$nilai_sanguin && $nilai_koleris>=$nilai_melankolis && $nilai_koleris>=$nilai_plegmatis){
    	$hasil_prediksi = 'Koleris';
    }
    elseif($nilai_melankolis>=$nilai_sanguin && $nilai_melankolis>=$nilai_koleris && $nilai_melankolis>=$nilai_plegmatis){
    	$hasil_prediksi = 'Melankolis';
    }
    elseif($nilai_plegmatis>=$nilai_sanguin && $nilai_plegmatis>=$nilai_koleris && $nilai_plegmatis>=$nilai_melankolis){
    	$hasil_prediksi = 'Plegmatis';
    }
    echo "<strong>";
    echo "<h2>";
    echo "Hasil prediksi = ".$hasil_prediksi;
    echo "</h2>";
    echo "</strong>";
    echo "<br>";

        //    $nilai_sanguin = number_format($nilai_sanguin, 50);
        //    $nilai_koleris = number_format($nilai_koleris, 50);
    if($id_data_uji>0){
        $res_hasil = update_hasil_prediksi($db_object, $id_data_uji, $hasil_prediksi, 
                $nilai_sanguin, $nilai_koleris, $nilai_melankolis, $nilai_plegmatis);
    }
    return array($hasil_prediksi, $nilai_sanguin, $nilai_koleris, $nilai_melankolis, $nilai_plegmatis);
      
}	
function update_hasil_prediksi($db_object, $id, $hasil, $sanguin, $koleris, $melankolis, $plegmatis){
	$sql = "UPDATE data_uji "
                . "SET "
                . "kelas_hasil='$hasil', "
                . "nilai_sanguin='$sanguin', "
                . "nilai_koleris='$koleris', "
                . "nilai_melankolis='$melankolis', "
                . "nilai_plegmatis='$plegmatis' 
                WHERE id=$id";
	return $db_object->db_query($sql);
}


function get_jumlah_sum_atribut($db_object, $atribut, $kelas_asli){
	$sql = "SELECT SUM($atribut) FROM data_latih WHERE kelas_asli='$kelas_asli'";
	$res = $db_object->db_query($sql);
	$row = $db_object->db_fetch_array($res);
	return $row[0];
}

function get_jumlah_atribut($db_object, $atribut, $nilai, $kelas_asli){
	$sql = "SELECT COUNT(*) FROM data_latih WHERE $atribut='$nilai' AND kelas_asli='$kelas_asli'";
	$res = $db_object->db_query($sql);
	$row = $db_object->db_fetch_array($res);
	return $row[0];
}


function get_s2_populasi($db_object, $atribut, $kelas_asli, $x_params, $jml_params){
	$sql = "SELECT $atribut FROM data_latih WHERE kelas_asli='$kelas_asli'";
	$res = $db_object->db_query($sql);
	$sum_power = 0;
	while($row = $db_object->db_fetch_array($res)){
		$power = pow($row[0]-$x_params,2);
		$sum_power += $power;
	}
	$s2 = $sum_power/($jml_params-1);
	return $s2;
}
?>

