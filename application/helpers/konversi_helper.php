<?php

function convertPicker($date,$format = 'Y-m-d'){
    $tgl=explode('-', $date);
    $tgl=$tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    return (string)convertDateTime($tgl,$format);
}


function convertDateTime($date,$format = 'd-m-Y H:i'){
    if(is_string($date))
    {
        $me = DateTime::createFromFormat('Y-m-d H:i:s',$date);
        if($me == false){
            $me = DateTime::createFromFormat('Y-m-d',$date);
        }
        $date=$me;
    }
    return $date->format($format);
}

function printTanggal($pil,$nilai=null,$minTahun=1910){
    if($pil=='bulan'){
        $bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        foreach ($bulan as $key => $value) {
            if($nilai == ( $key+1 ) ){
                echo "<option selected value=".($key+1).">$value</option>";
            }else{
                echo "<option value=".($key+1).">$value</option>";
            }
        }
    }else if($pil=='hari'){
        for ($i=1; $i<=31; $i++) {
            if($nilai == $i ){
                echo "<option selected value='$i'>$i</option>";
            }else{
                echo "<option value='$i'>$i</option>";
            }
        }
    }else if($pil=='tahun'){
        for ($i=convertDateTime(new dateTime(),'Y'); $i>=$minTahun; $i--) {
            if($nilai == $i ){
                echo "<option selected value='$i'>$i</option>";
            }else{
                echo "<option value='$i'>$i</option>";
            }
        }
    }else{
        echo "2";
    }
}

function konversiTanggal($tanggal, $for='d')
{
    if($tanggal==0){
        return '';
    }
    if($for=='d'){
        $fir='D';
        $dateObj   = mktime(0, 0, 0, 0, $tanggal);
    }else{
        $fir='M';
        $dateObj   = mktime(0, 0, 0, $tanggal, 1);
    }
    $name = date($fir, $dateObj );
    $format = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
        'Jan' => 'Januari',
        'Feb' => 'Februari',
        'Mar' => 'Maret',
        'Apr' => 'April',
        'May' => 'Mei',
        'Jun' => 'Juni',
        'Jul' => 'Juli',
        'Aug' => 'Agustus',
        'Sep' => 'September',
        'Oct' => 'Oktober',
        'Nov' => 'November',
        'Dec' => 'Desember'
    );

    return strtr($name, $format);
}

function konversiTanggalIndo($tanggal,$format='-'){

    return convertDateTime($tanggal,'d')."".$format."".konversiTanggal(convertDateTime($tanggal,'m'),'M')."".$format."".convertDateTime($tanggal,'Y');

}