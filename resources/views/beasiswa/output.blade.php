@extends('layout.app')

@section('title', 'Hasil Beasiswa')

@section('content')
    <div class="py-5 text-center">
      <h2>Hasil Pendaftaran Beasiswa</h2>
    </div>

    <div class="row d-flex justify-content-center align-items-center pb-5">
      <div class="col-md-4 col-lg-8">
           @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>Sukses Daftar Beasiswa</p>
        </div>
           @endif
        {{-- <form>
          <div class="row g-3">
          @foreach($beasiswa as $bs)
          <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" value="{{ $bs->nama }}" readonly>
            </div> 
            </fieldset> 

             <fieldset disabled>
            <div class="col-12">
              <label class="form-label">NIM</label>
              <input type="text" class="form-control" value="{{ $bs->nim }}" readonly>
            </div> 
            </fieldset> 

           <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" value="{{ $bs->email }}" readonly>
            </div> 
            </fieldset> 

              <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Nomer HP</label>
              <input type="text" class="form-control" value="{{ $bs->nomor_hp }}" readonly>
            </div> 
            </fieldset> 

              <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Semester Terakhir</label>
              <input type="text" class="form-control" value="{{ $bs->semester }}" readonly>
            </div> 
            </fieldset> 

              <fieldset disabled>
            <div class="col-12">
              <label class="form-label">IPK</label>
              <input type="text" class="form-control" value="{{ $bs->ipk }}" readonly>
            </div> 
            </fieldset> 

              <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Pilihan Beasiswa</label>
              <input type="text" class="form-control" value="{{ $bs->beasiswa }}" readonly>
            </div> 
            </fieldset> 

        <fieldset disabled>
            <div class="col-12">
              <label class="form-label">URL Berkas</label>
              <input type="text" class="form-control" value="{{ url(asset('uploads')) }}/{{ $bs->berkas  }}" readonly>
            </div> 
           </fieldset>
           <a href="{{ url(asset('uploads')) }}/{{ $bs->berkas }}" class="btn btn-primary"> Lihat File Berkas</a>

              <fieldset disabled>
            <div class="col-12">
              <label class="form-label">Status Ajuan</label>
              <input type="text" class="alert alert-warning fw-bold text-center mx-3" value="{{ $bs->status_ajuan }}" readonly>
            </fieldset>
            @endforeach
          </div>       
        </form> --}}

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
      <th scope="col">Email</th>
      <th scope="col">No Hp</th>
      <th scope="col">Semester</th>
      <th scope="col">IPK</th>
      <th scope="col">Beasiswa</th>
      <th scope="col">Berkas</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($beasiswa as $bs)
    <tr>
      <td>{{ $bs->nama }}</td>
      <td>{{ $bs->nim }}</td>
      <td>{{ $bs->email }}</td>
        <td>{{ $bs->nomor_hp }}</td>
      <td>{{ $bs->semester }}</td>
      <td>{{ $bs->ipk }}</td>
        <td>{{ $bs->beasiswa }}</td>
      <td>{{ $bs->nama }}</td>
      <td class="fw-bold text-center">{{ $bs->status_ajuan }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="container text-center my-5">
	<div class="col-xl-12 my-2">
		<div class="card">
			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="pie_basic"></div>
				</div>
			</div>
		</div>
	</div>	
</div>
      </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
var pie_basic_element = document.getElementById('pie_basic');
if (pie_basic_element) {
    var pie_basic = echarts.init(pie_basic_element);
    pie_basic.setOption({
        color: [
            '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
            '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
            '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
            '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
        ],          
        
        textStyle: {
            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
            fontSize: 13
        },

        title: {
            text: 'Pie Chart Jenis Beasiswa',
            left: 'center',
            textStyle: {
                fontSize: 17,
                fontWeight: 500
            },
            subtextStyle: {
                fontSize: 12
            }
        },

        tooltip: {
            trigger: 'item',
            backgroundColor: 'rgba(0,0,0,0.75)',
            padding: [10, 15],
            textStyle: {
                fontSize: 13,
                fontFamily: 'Roboto, sans-serif'
            },
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        legend: {
            orient: 'horizontal',
            bottom: '0%',
            left: 'center',                   
            data: ['Beasiswa Akademik', 'Beasiswa Non-akademik'],
            itemHeight: 8,
            itemWidth: 8
        },

        series: [{
            name: 'Product Type',
            type: 'pie',
            radius: '70%',
            center: ['50%', '50%'],
            itemStyle: {
                normal: {
                    borderWidth: 1,
                    borderColor: '#fff'
                }
            },
            data: [
                {value: {{$akademik}}, name: 'Beasiswa Akademik'},
                {value: {{$nonakademik}}, name: 'Beasiswa Non-akademik'}
            ]
        }]
    });
}
</script>
@endsection