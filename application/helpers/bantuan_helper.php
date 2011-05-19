<?php
/**
* function cart
* helper yang berfungsi untuk mengandle proses shoping cart
*/

/**
* function dropdown
* helper untuk handle semua form dropdown
*/
function matKulDropdown($selected=FALSE)
{
	$ci=& get_instance();
    $ci->load->Model('Matkul_model');
    $res = $ci->Matkul_model->getMatkul('list',FALSE);

    $output = "<select id='id_matkul' name='id_matkul' class='title'>";
		$output .= "<option value=''> - Pilih - </option>";
		foreach($res as $row):
		    if($selected):
		    	if($row["id_matkul"]==$selected):
					$output .= "<option value='".$row["id_matkul"]."' selected='selected'>".$row['nama_matkul']."</option>";
				else:
					$output .= "<option value='".$row["id_matkul"]."'>".$row['nama_matkul']."</option>";
				endif;
		    else:
		    	$output .= "<option value='".$row["id_matkul"]."'>".$row['nama_matkul']."</option>";
		   endif;
		endforeach;
	$output .= "</select>";
    return $output;
}

function nilaiMatKulDropdown($selected=FALSE,$id_mhs=FALSE)
{
	$ci=& get_instance();
    $ci->load->Model('Kuliah_model');
    $res = $ci->Kuliah_model->getKuliah('by_mhs',FALSE,$id_mhs);

    $output = "<select id='id_matkul' name='id_matkul' class='title'>";
		$output .= "<option value=''> - Pilih - </option>";
		foreach($res as $row):
		    if($selected):
		    	if($row["id_matkul"]==$selected):
					$output .= "<option value='".$row["id_matkul"]."' selected='selected'>".$row['nama_matkul']."</option>";
				else:
					$output .= "<option value='".$row["id_matkul"]."'>".$row['nama_matkul']."</option>";
				endif;
		    else:
		    	$output .= "<option value='".$row["id_matkul"]."'>".$row['nama_matkul']."</option>";
		   endif;
		endforeach;
	$output .= "</select>";
    return $output;
}



function tahunDropdown($selected=FALSE) {

$options = array(
                  '2008'  => '2008',
                  '2009'    => '2009',
                  '2010'   => '2010',
                  '2011' => '2011',
                );
				
return form_dropdown('tahun',$options,$selected);
}


function semDropdown($selected=FALSE) {

$options = array(
                  'ganjil'  => 'Ganjil',
                  'genap'    => 'Genap',
                  
                );
				
return form_dropdown('semester',$options,$selected);
}
