<!DOCTYPE html>
<html>
<head>
	<title>Total Akumulasi Kredit dan Debit RT 08 RW 13</title>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
	<style type="text/css">
		/*table tr td,
		table tr th{
			font-size: 9pt;
		}*/

		table {
		  border-collapse: collapse;
		}

		table, th, td {
		  border: 1px solid black;
		}

		table {
		  width: 100%;
		}

		th {
		  height: 50px;
		  text-align: center;
		}

		th, td {
		  padding: 5px;
		}

		hr.satu {
		  border: 2px solid black;
		}
		hr.dua{
			border: 1px solid black;
		}
	</style>
	
		<h2>Total Akumulasi Kredit dan Debit RT 08 RW 13</h2>
		<!-- <hr class="satu"> -->
		<hr class="dua">

	<br>
 
	<table>
	  <tr>
	    <th>No.</th>
	    <th>Bulan</th>
	    <th>Total Debit</th>
	    <th>Total Kredit</th>
	    <th>Total</th>
	  </tr>
	  @php $no = 1 @endphp
	  @foreach($iuran as $data)
	    <tr>
	      <td style="text-align: center;">{{ $no++ }}</td>    
	      <td>{{$data->bulan}}</td>
	      <td>{{'Rp ' . number_format($data->jumlah_debit, 0, ',', '.')}}</td>
	      <td>{{'Rp ' . number_format($data->jumlah_kredit, 0, ',', '.')}}</td>
	      <td>{{'Rp ' . number_format(($data->jumlah_kredit) - ($data->jumlah_debit), 0, ',', '.')}}</td>
	    </tr>
	  @endforeach
	  @foreach($semua_debit_kredit as $data1)
	  <tr>
	      <td colspan="2">Total</td>
	      <td>{{ 'Rp ' . number_format($data1->semua_debit, 0, ',', '.') }}</td>
	      <td>{{ 'Rp ' . number_format($data1->semua_kredit, 0, ',', '.')}}</td>
	      <td>{{ 'Rp ' . number_format(($data1->semua_kredit) - ($data1->semua_debit), 0, ',', '.') }}</td>
	    </tr>
	</table>
	@endforeach
	</table>
 
</body>
</html>