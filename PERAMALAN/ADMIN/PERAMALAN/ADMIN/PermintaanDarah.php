<?php  include "header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Data Permintaan Darah</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 col-sm-offset-2 text-center">
			<div class="">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">A</th>
							<th style="text-align: center;">B</th>
							<th style="text-align: center;">AB</th>
							<th style="text-align: center;">O</th>
						</tr>
						<tr>
							<th style="text-align: center;"></th>
							<th style="text-align: center;"></th>
							<th style="text-align: center;"></th>
							<th style="text-align: center;"></th>
						</tr>
					</thead>
				</table>
				<table class="table" style="background-color: transparent; border-color: transparent;">
					<tr>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
								Pesan
							</button>	
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
								Pesan
							</button>		
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
								Pesan
							</button>		
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
								Pesan
							</button>	
						</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!-- <div class="modal-header">
					
				</div> -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form action="tampilkandata.php" method="post" style="text-align: center">
						<label>Masukkan Jumlah Darah</label>
						<br>
						<label>Tanggal</label><input type="month" id="n">  
						<input type="number" id="n"> 
						<br>
					</form>
					<br>
					<div class="text-center">
						<button type='button' class='btn btn-danger center-block' data-toggle="modal" data-target="#myModal1" data-dismiss="modal">Pesan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--  -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!-- <div class="modal-header">
					
				</div> -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form action="tampilkandata.php" method="post" style="text-align: center">
						<label>Permintaan telah di kirim</label>
					</form>
					<br>
					<div class="text-center">
						<button type='button' class='btn btn-danger ' data-toggle="modal" data-target="#myModal1">Oke</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include "footer.php"; ?>