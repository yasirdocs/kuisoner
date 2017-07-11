<?php


function uploadFile($file,$folder,$newName=null,$extenstion=array()){
    $file  = isset($file) ? $file : null;
    if($file){
        $filename       = explode(".", $file['name']);
        if(isset($filename[1])){
            $file_extension = $filename[count($filename)-1];
            $file_weight = $file['size'];
            $file_type = $file['type'];
            $fileNewName=$filename[0];
            if($newName){
                $fileNewName=$newName;
            }
            $fileNewName=$fileNewName.'.'.$file_extension;

            if( !file_exists($folder) ){
                mkdir($folder, 0777, true);
            }

            if($extenstion){
                if( !in_array($file_extension, $extenstion)){
                    return null;
                }
            }

            if( $file['error'] != 0 ){
                return null;
            }

            if( move_uploaded_file($file['tmp_name'], $folder.$fileNewName) ){
                return $fileNewName;
            }
            return null;
        }
    }
}

function transStatus($teks,$type=0,$thisData=null,$redirect='dashboard',$fileUpload=array(),$teksKhusus=null){
    $CI =& get_instance();
    if($type==0){
        if ($CI->db->trans_status() === FALSE){
            var_dump($CI->db->error());
            die;
            if($thisData){
                $pesan=$teks." tidak berhasil diubah";
            }else{
                $pesan=$teks." tidak berhasil disimpan";
            }

            if($teksKhusus){
                $pesan=$teks.' '.$teksKhusus;
            }

            $CI->db->trans_rollback();
            if($fileUpload){
                foreach ($fileUpload as $key=> $value) {
                    if($value['file']){
                        if(file_exists($value['folder'].$value['file'])){
                            unlink($value['folder'].$value['file']);
                        }
                    }
                }
            }
            $CI->session->set_flashdata('error',$pesan);
            redirect($redirect);
        }
    }else{
        if($thisData){
            $pesan=$teks." berhasil diubah";
        }else{
            $pesan=$teks." berhasil disimpan";
        }

        if($teksKhusus){
            $pesan=$teks.' '.$teksKhusus;
        }

        $CI->db->trans_commit();
        $CI->session->set_flashdata('success',$pesan);
        redirect($redirect);
    }
}

function transStatusDelete($teks,$redirect='dashboard'){
    $CI =& get_instance();
    if ($CI->db->trans_status() === FALSE){
        $pesan=$teks." tidak berhasil dihapus";
        $CI->db->trans_rollback();
        $CI->session->set_flashdata('error',$pesan);
    }else{
        $pesan=$teks." berhasil dihapus";
        $CI->db->trans_commit();
        $CI->session->set_flashdata('success',$pesan);
    }
    redirect($redirect);
}

function paginationVar($awal=1,$batas=5){
    $data=array(
        'awal' => $awal,
        'batas' => $batas
    );

    return (object) $data;
}

function flashMessage(){
    $ci =& get_instance();
    if( $ci->session->flashdata('success') ){
        echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo $ci->session->flashdata('success');
        echo "</div>";
    }
    if( $ci->session->flashdata('info') ){
        echo "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo $ci->session->flashdata('info');
        echo "</div>";
    }
    if( $ci->session->flashdata('warning') ){
        echo "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo $ci->session->flashdata('warning');
        echo "</div>";
    }
    if( $ci->session->flashdata('error') ){
        echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo $ci->session->flashdata('error');
        echo "</div>";
    }
}


function paginationPage($total,$length,$thisNilai=null){
    $pagination='';
    if($total > $length){
        $last   = ceil($total / $length);
        $page   = $thisNilai/$length;
        $pages  = $thisNilai;
        $links  = 6;
        $center = ceil($last/2);

        $pagination="<ul class='pagination'>";

        if($page == 1){
            $pagination .= "
                <li class='disabled'>
                    <a href='#'>Previous</a>
                </li>
            ";
        }else{
            $pagination .= "
                <li>
                    <a href='#' class='page-to' data-nilai=".($pages-$length)." >Previous</a>
                </li>
            ";
        }


        if ( $page >= $links and $last > $links ) {
            $pagination .= "
                <li>
                    <a href='#' class='page-to' data-nilai=".$length." >1</a>
                </li>
            ";
            $pagination .= '<li class="disabled"><span>...</span></li>';
        }

        if ( $page < $links ) {
            $first=$last;
            if($last>=$links){
                $first=$links;
            }

            for ( $i = 1 ; $i <= $first; $i++ ) {
                $class  = ( $page == $i ) ? "active" : "";
                $pagination .= "
                    <li class=".$class.">
                        <a href='#' class='page-to' data-nilai=".($i*$length)." >".$i."</a>
                    </li>
                ";
            }
        }elseif( $page>($last-($links-1) ) ){
            for ( $i = $last-($links-1) ; $i <= $last; $i++ ) {
                $class  = ( $page == $i ) ? "active" : "";
                $pagination .= "
                    <li class=".$class.">
                        <a href='#' class='page-to' data-nilai=".($i*$length)." >".$i."</a>
                    </li>
                ";
            }
        }else{
            for ( $i = $page-1 ; $i <= $page+2; $i++ ) {
                $class  = ( $page == $i ) ? "active" : "";
                $pagination .= "
                    <li class=".$class.">
                        <a href='#' class='page-to' data-nilai=".($i*$length)." >".$i."</a>
                    </li>
                ";
            }
        }


        if ( $page<=($last-($links-1)) ) {
            $pagination .= "
                <li class='paginate_button disabled'>
                    <a href='#'>...</a>
                </li>
            ";
            $pagination .= "
                <li>
                    <a href='#' class='page-to' data-nilai=".($last*$length)." >". $last ."</a>
                </li>
            ";
        }



        if ( $page == $last ) {
            $pagination .= "
                <li class='disabled'>
                    <a href='#'>Next</a>
                </li>
            ";
        }else{
            $pagination .= "
                <li>
                    <a href='#' class='page-to' data-nilai=".($pages+$length).">Next</a>
                </li>
            ";
        }

        $pagination.="</ul>";
    }

    return $pagination;
}