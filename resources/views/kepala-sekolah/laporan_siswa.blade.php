<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}"  media="screen, print">
    <title>Laporan Data Siswa</title>
</head>

<body>
    <div class="header-report">
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/1.jpg') }}">
        </div>
        <div class="" style="text-align: center;border-bottom: 2px solid black;" >
            <p style="font-size: 15px;font-weight: bolder;">YAYASAN PENDIDIKAN ISLAM  (YPI) AN-NASHIHAH BUTON</p>
            <p style="font-size: 25px;font-weight: bolder;margin-top: -10px;">RAUDHATUL ATHFAL (RA) AL MUSLIHUN</p>
            <p style="font-size: 13px;margin-top:-20px;">JL. ERLANGGA NO 247 KEL.BONEBONE KEC BATUPOARO KOTA BAUBAU</p>
            <p style="font-size: 13px;margin-top:-10px;font-weight: bolder;">Izin Op No 153 Tahun 2019 – NSM : 101274720032</p>
        </div>
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/2.png') }}">
        </div>
    </div>
    <div>
        <p style="font-size: 17px;font-weight: bolder;text-align: center;">Laporan Data Siswa Tahun Akademik {{$data->tahun_akademik}} {{$data->keterangan}}</p>
        
    </div>
    <table class="table">
        <thead class="bg-light" style="font-size: 12px;">
            <tr style="text-align: center;">
                <th>No</th>
                <th>NISM</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php $a=1;;?>
            <?php foreach($data->data as $row):?>
            <tr style="text-align: center;">
                <td><?= $a++;?></td>
                <td><?= $row->nism;?></td>
                <td><?= $row->nama_siswa;?></td>
                <td><?= $row->nama_kelas;?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<script>
    
</script>
</body>

</html>