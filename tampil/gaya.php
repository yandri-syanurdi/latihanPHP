<?php
 $page = "Form";
?>
<?php
include "koneksimysql.php";
?>
<?php include 'coba1.php';?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Creator</h1>
    <p class="mb-4">Hasil gambar untuk creator adalah Content Creator (indonesia : Konten kreator) adalah Sebuah Profesi yang membuat suatu konten, baik berupa tulisan, gambar, video, suara, ataupun gabungan dari dua atau lebih materi. Konten-konten tersebut dibuat untuk media, terutama media digital seperti Youtube, Snapchat, Instagram, WordPress, Blogger, Dll. Yandri Syanurdi adalah creator dari website admin LPMP<a target="_blank"
            href="https://datatables.net">(Lembaga Penjamin Mutu Pendidikan)</a>.</p>
            

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div>
                <h6 class="m-0 font-weight-bold text-primary" style="float: left;" >DataTables Creator</h6>
              
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
                            <form class="form-inline my-2 my-lg-0" style="float: left;" method="GET" action="{{ URL::to('/creator') }}">
                                <label for="exampleFormControlSelect1">Show</label>
                                    <select name="entri" class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit();">
                                        <option value="5" @if($keluar == '5') selected @endif>5</option>
                                        <option value="10" @if($keluar == '10') selected @endif>10</option>
                                        <option value="50" @if($keluar == '50') selected @endif>50</option>
                                    </select>
                                <label for="exampleFormControlSelect1">entries</label>
                            </form>
                        </div>
                        
                        <div>
                            <form class="form-inline my-2 my-lg-0" style="float: right;" method="GET" action="{{ URL::to('/creator') }}">
                                <input name="cari" value="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onchange="this.form.submit();" >
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
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                             <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                            <?php
                            $sql=$conn->query("select * from pegawai");
                            while($rs=$sql->fetch_object()){
                            ?>
                        
                                <tr>
                                    <td><?php echo $rs->nip;?></td>
                                    <td><?php echo $rs->nama;?></td>
                                    <td><?php echo $rs->jabatan;?></td>
                                    <td>
                                        <a href="/creator/{{$creators->id}}" class="btn btn-primary">View</a>
                                        <a href="/creator/download/{{$creators->gambar}}" class="btn btn-success" style="margin-top:0px;">Unduh</a>
                                        <a href="/creator/{{$creators->id}}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/creator/{{$creators->id}}/delete" class="btn btn-danger delete-confirm" >Delete</a>
                                    </td>
                                </tr>
                           <?php } ?>
                    </tbody>
                </table>
                <div class="mt-4">
                {{ $creator->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Creator</h5>
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
    
  
   
    

