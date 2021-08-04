<?php
 $page = "Form";
?>

<?php

    if(isset($_GET['entri'])){
		$batasku = $_GET['entri'];
	}else{
		 $batasku = '5';
	}
?>

<?php

    if(isset($_GET['cari'])){
		$cariku = $_GET['cari'];
	}else{
		 $cariku = '';
	}
?>

<?php
include "koneksimysql.php";
?>
<?php include 'coba1.php';?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Pegawai</h1>
    <p class="mb-4">Secara umum pengertian Pekerja/Buruh adalah setiap orang yang bekerja dengan menerima upah atau imbalan dalam bentuk lain. ... Buruh adalah orang yang bekerja untuk orang lain, sedangkan karyawan bekerja untuk suatu lembaga atau instansi atau perusahaan. Sedangkan menurut kamus bahasa Indonesia pegawai merupakan orang yang bekerja pada satu lembaga (kantor,perusahaan) dengan mendapatkan gajii (upah). <a target="_blank"
            href="https://datatables.net">(Lembaga Penjamin Mutu Pendidikan)</a>.</p>
            

    <!-- https://www.malasngoding.com/cara-membuat-pagination-php-mysqli-dan-boostrap-4/ -->
    <!-- https://www.malasngoding.com/membuat-paging-dengan-php-dan-mysql/ -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div>
                <h6 class="m-0 font-weight-bold text-primary" style="float: left;" >DataTables Pegawai</h6>
              
                </div>
                <div style="float: right; margin-top:0px;">
                <!-- <a type="button" style="float: right; margin-top:-20px;" class="btn btn-sm btn-primary" href="/add-sponsor">Add New</a> -->

                <a type="button" style=" margin-right:5px; padding:5px;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModala">Import XLS</a>
          
                <a type="button" style=" margin-right:5px; padding:5px;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModala">Export Excel</a>
                <a type="button" style=" margin-right:5px; padding:5px;" class="btn btn-sm btn-primary" href="/creator/exportPdf">Export PDF</a>
                <a type="button" style=" margin-right:5px; padding:5px;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</a>
                </div>
            <br>
            <br>
                        <div>                        
                            <form class="form-inline my-2 my-lg-0" style="float: left;" method="GET" action="form.php">
                                <label for="exampleFormControlSelect1">Show</label>
                                    <select name="entri" class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit();">
                                       

                                        <option value="5" <?php if($batasku == "5") echo "selected";?> >5</option>
                                        <option value="10"  <?php if($batasku == "10") echo "selected";?> >10</option>
                                        <option value="50"  <?php if($batasku == "50") echo "selected";?> >50</option>
                                    </select>
                                <label for="exampleFormControlSelect1">entries</label>
                            </form>
                        </div>
                        
                        <div>
                            <form class="form-inline my-2 my-lg-0" style="float: right;" method="GET" action="form.php">
                                <input name="cari" value="<?php echo $cariku ;?>" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onchange="this.form.submit();" >
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" onchange="this.form.submit();">Search</button>
                            </form>
                        </div>
                        
                        <br>
                        <br>
        </div>
        
        <div class="card-body col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NOMOR</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NOMOR</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 

                             if(isset($_GET['entri'])){
		                        $batas = $_GET['entri'];
                            }else{
                                $batas = '5';
                            }

                            $cari = "";
					        if(isset($_GET['cari'])){
						        $cari = $_GET['cari'];
					        }else{
						        $cari = "";
					        }

                            // $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $data = mysqli_query($conn,"select * from pegawai");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);



                            if($cari!=null){
						        //$sql=$conn->query("select * from kamar where jenis='".$_GET['cari']."' order by id desc limit 3"); 
                                // $data_pegawai = mysqli_query($conn,"select * from pegawai where nama='".$_GET['cari']."' order by id desc limit $halaman_awal, $batas");
                                 //$data_pegawai = mysqli_query($conn,"select * from pegawai where nama LIKE 'u%' order by id desc limit $halaman_awal, $batas");
                                 $data_pegawai = mysqli_query($conn,"select * from pegawai where nama LIKE '".$_GET['cari']."%' order by id desc limit $halaman_awal, $batas");
						        //$sql=$conn->query("select * from user");
                                //https://bookdown.org/moh_rosidi2610/panduan_access/query.html
					        }
					        else{
                                $data_pegawai = mysqli_query($conn,"select * from pegawai order by id desc limit $halaman_awal, $batas");
					        }
                            // $data_pegawai = mysqli_query($conn,"select * from pegawai limit $halaman_awal, $batas");

                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_pegawai)){
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?php echo $d['nip']; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['jabatan']; ?></td>
                                     <td>
                                        <a href="/creator/{{$creators->id}}" class="btn btn-primary">View</a>
                                        <a href="/creator/download/{{$creators->gambar}}" class="btn btn-success" style="margin-top:0px;">Unduh</a>
                                        <a href="/creator/{{$creators->id}}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/creator/{{$creators->id}}/delete" class="btn btn-danger delete-confirm" >Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
               

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                        </li>
                        <?php 
                        for($x=1;$x<=$total_halaman;$x++){
                            ?> 
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                        }
                        ?>				
                        <li class="page-item">
                            <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                        </li>
                    </ul>
		        </nav>


            </div>
        </div>
    </div>

</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"  style="position:relative;">

                <form method="POST" class="contact-form" action="{{route('creator.create')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-section">
                
                        <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" />
                            @if($errors->has('nama'))
                                <span class="help-block" style="color: red;">{{$errors->first('nama')}}</span>
                                <br>
                            @endif
                        </div>
                
                        <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="jenis_kelamin">Jenis Kelamin : </label>
                            <input type="radio" name="jenis_kelamin" value="L"> Laki-laki
                            <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block" style="color: red;">{{$errors->first('jenis_kelamin')}}</span>
                                <br>
                            @endif
                        </div>


                          <div class="form-group{{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                            <label for="tanggal_lahir">Tanggal Lahir : </label>
                            <div class="row"> 
                                 <div class="col-lg-4 col-md-4">
                                       <label>Day</label>
                                       {!!Form::selectrange('day',1,31,null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <label>Month</label>
                                        {!!Form::selectMonth('month',null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                       <label>Year</label>
                                        {!!Form::selectYear('year',1970,date('Y-d-m'),null,['class'=>'form-control'])!!}
                                </div>
                       
                            </div>
                        </div>
                    
                      
                    
                        <div class="form-group{{$errors->has('kategori') ? 'has-error' : ''}}">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" class="form-control projectcategory">
                                <option value="">--- Pilih Kategori ---</option>
                                    @foreach ($kategori as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                            </select>
                        </div>

                         <div class="form-group{{$errors->has('detail_kategori') ? 'has-error' : ''}}">
                            <label for="detail_kategori">Detail Kategori</label>
                            <input type="text" readonly class="form-control project_desc">
                            @if($errors->has('detail_kategori'))
                                <span class="help-block" style="color: red;">{{$errors->first('detail_kategori')}}</span>
                                <br>
                            @endif
                        </div>
                    
                    </div>
                    
                    <div class="form-section">

                        <div class="form-group{{$errors->has('keahlian') ? 'has-error' : ''}}">
                            <label for="keahlian">Keahlian : </label>
                             <input type="checkbox" name="keahlian[]" value="Java"> Java 
                             <input type="checkbox" name="keahlian[]" value="CSS"> CSS 
                             <input type="checkbox" name="keahlian[]" value="HTML"> HTML 
                             <input type="checkbox" name="keahlian[]" value="Javascript"> Javascript 
                             <input type="checkbox" name="keahlian[]" value="PHP"> PHP 
                            @if($errors->has('keahlian'))
                                <span class="help-block" style="color: red;">{{$errors->first('keahlian')}}</span>
                                <br>
                            @endif
                        </div>
                    
                         <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi"></textarea>
                        </div>

                         <div class="form-group{{$errors->has('file') ? 'has-error' : ''}}">
                            <label for="file">Pilih Gambar</label>
                            <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                            @if($errors->has('file'))
                                <span class="help-block" style="color:red;">{{$errors->first('file')}}</span>
                                <br>
                            @endif
                            <img id="previewImg" style="max-width:130px;margin-top:20px;" />
                            <br>
                        </div>
                    
                    </div>
        
                    <div class="form-navigation">
                        <button type="button" class="previous btn btn-info float-left" style="margin-left:4%;">Previous</button>
                        <button type="button" class="next btn btn-info float-right">Next</button>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </form>
            </div>     
        </div>
    </div>
</div>

            
            
            
<div class="modal fade" id="exampleModala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sorry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Fitur ini belum tersedia</p>
            </div>
        </div>
    </div>
</div>

<?php include 'coba2.php';?>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       
        <script type="text/javascript">
        $(document).ready(function(){
           
            $(document).on('change','.projectcategory',function(){
                console.log("hmm its change");
                
                var cat_id=$(this).val();
                var a=$(this).parent();
                console.log(cat_id);
                console.log(a);
                var op=" ";
                $.ajax({
                    type:'get',
				    url:'{!!URL::to('findDescription')!!}',
                    data:{'kategori':cat_id},
                    dataType: 'json',
                    success: function(data){
					console.log("detail_kategori");
					console.log(data.detail_kategori);

					// here price is coloumn name in products table data.coln name
                    
                    $('.project_desc').val(data.detail_kategori);
					
					// $('.project_desc').val(data.descriptions);

					// a.find('.project_desc').val(data.description);

                    },
                    error:function(){

                    }
			    });
            });
            
        });
    </script>

    <script src="http://parsleyjs.org/dist/parsley.js"></script>

<script>
        $(function(){
            var $sections =  $('.form-section');
            
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }
            
            
            function curIndex()
            {
                return $sections.index($sections.filter('.current'));
            }
            
            $('.form-navigation .previous').click(function(){
               navigateTo(curIndex()-1); 
            });
            
            $('.form-navigation .next').click(function(){
               $('.contact-form').parsley().whenValidate({
                   group: 'block-' + curIndex()
               }).done(function(){
                  navigateTo(curIndex()+1); 
               }); 
            });
            
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            
            navigateTo(0);
        });
    </script>
    
    <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    
    <script>
        function normal () {
            alert("oops Anda tidak memiliki ijin");
        }
        function sweet (){
            swal("STOP", "Anda tidak memiliki ijin","error");
        }
        
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    
  
   
    

