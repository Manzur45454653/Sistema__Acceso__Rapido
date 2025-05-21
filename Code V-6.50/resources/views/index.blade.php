@extends('layouts.admin')

@section('content')
    {{-- <h1 style="margin: 20px">Página principal</h1> --}}

    <div class="row">
        
      <div class="col-lg-3 col-6"><!-- small box -->
        <div class="small-box" style="height: 160px; background-color: #23b0ff;">
          <div class="inner">
              <h3>{{$comunidads}}</h3>
              <p style="font-weight: 600;">Comuniadad</p>

          </div>
          <div class="icon">
              <i class="bi bi-buildings"></i>
          </div>
          {{-- <a href="{{url('comunidads')}}" class="small-box-footer" style="margin-top: 15px">Más información <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div><!-- ./col -->

      
       <div class="col-lg-3 col-6"><!-- small box -->
        <div class="small-box" style="height: 160px; background-color: #ef7d87;">
          <div class="inner">
              <h3>{{$visitantes}}</h3>
            <p>Visitantes</p>
          </div>
          <div class="icon">
              <i class="bi bi-people"></i>
          </div>
          <a href="{{url('visitante')}}" class="small-box-footer" style="margin-top: 15px">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>
    
    {{-- 
        // -----------------------------
        // PRIMERA GRÁFICA: Entradas por día (comunidad y visitantes)
        // ----------------------------- 
    --}}
    <div class="card card-outline card-info">
      <div class="card-header">
          <h3 class="card-title">Ingreso al plantel<h3>
      </div>
      <div class="card-body">
          <canvas id="graficaEntradas" height="100"></canvas>
      </div>
  </div>
  
  <script>
      const ctx1 = document.getElementById('graficaEntradas').getContext('2d');
      const grafica1 = new Chart(ctx1, {
          type: 'bar',
          data: {
              labels: @json($dias),
              datasets: [
                  {
                      label: 'Comunidad',
                      data: @json($comunidadData),
                      backgroundColor: 'rgba(76, 205, 255, 0.6)',
                      borderColor: 'rgba(76, 205, 255, 1)',
                      borderWidth: 1
                  },
                  {
                      label: 'Visitante',
                      data: @json($visitanteData),
                      backgroundColor: 'rgba(239, 125, 135, 0.6)',
                      borderColor: 'rgba(239, 125, 135, 1)',
                      borderWidth: 1
                  }
              ]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true,
                      ticks: { stepSize: 1 }
                  }
              }
          }
      });
  </script>

{{-- // -----------------------------
// SEGUNDA GRÁFICA: Estudiantes por oferta en la semana
// ----------------------------- --}}
<div class="card mt-5 card-outline card-info">
  <div class="card-header">
      <h3 class="card-title">Ingreso al plantel</h3>
  </div>
  <div class="card-body">
      <canvas id="graficaOfertasSemana" height="120"></canvas>
  </div>
</div>

<script>
  const ctx2 = document.getElementById('graficaOfertasSemana').getContext('2d');
  const grafica2 = new Chart(ctx2, {
      // Para usar una gráfica de barras, solo cambia la propiedad type de 'line' a 'bar':
      type: 'bar',
      data: {
          labels: @json($diasSemana),
          datasets: @json($dataset)
      },
      options: {
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true,
                  ticks: { stepSize: 1 }
              },
              x: {
                  stacked: true
              },
              y: {
                  stacked: true
              }
          },
          plugins: {
              legend: {
                  display: true,
                  position: 'bottom'
              }
          }
      }
  });
</script>

@endsection