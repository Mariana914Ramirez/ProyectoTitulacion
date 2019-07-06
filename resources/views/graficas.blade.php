@extends ('layouts.admin')
<?php
use Illuminate\Support\Carbon;
setlocale(LC_ALL, 'es_ES');
?>


@section ('contenido')
	<center>

		<section id="Actualidad">
			@foreach($estadisticas as $estadistica)
				<p style="margin-top: 30px; font-size: 20px;"><b>Promedio: </b>{{ (($estadistica->C_limpieza)+ ($estadistica->C_trato)+($estadistica->C_puntualidad)+($estadistica->C_precio))/4}}</p>
				<div id="principal" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 5px;"></div>
				<table id="datatable01">
				    <thead>
				        <tr align="center">
				            <th></th>
				            <th style="padding: 10px;">Limpieza</th>
				            <th style="padding: 10px;">Puntualidad</th>
				            <th style="padding: 10px;">Precio</th>
				            <th style="padding: 10px;">Trato al cliente</th>
				        </tr>
				    </thead>
				    <tbody>
				        <tr align="center">
				            <th>{{ Carbon::parse(Carbon::now())->formatLocalized('%B') }}</th>
				            <td>{{ $estadistica->C_limpieza }}</td>
				            <td>{{ $estadistica->C_puntualidad }}</td>
				            <td>{{ $estadistica->C_precio }}</td>
				            <td>{{ $estadistica->C_trato }}</td>
				        </tr>
				    </tbody>
				</table>
			@endforeach
		</section>


		<img src="http://127.0.0.1:8000/img/separador.png">


		@if(!$sexto->isEmpty())
		<section id="MesesYEstadisticas">
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>

			<table id="datatable02">
			    <thead>
			        <tr align="center">
			            <th></th>
			            <th style="padding: 10px;">Limpieza</th>
			            <th style="padding: 10px;">Puntualidad</th>
			            <th style="padding: 10px;">Precio</th>
			            <th style="padding: 10px;">Trato al cliente</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<tr align="center">
			            <th>Mes actual</th>
			            <td>{{ $estadistica->C_limpieza }}</td>
			            <td>{{ $estadistica->C_puntualidad }}</td>
			            <td>{{ $estadistica->C_precio }}</td>
			            <td>{{ $estadistica->C_trato }}</td>
			        </tr>
			        @if(!$primero->isEmpty())
			        <tr align="center">
			            @foreach($primero as $uno)
			            <th>{{ $uno->mes }}</th>
			            <td>{{ $uno->C_limpieza }}</td>
			            <td>{{ $uno->C_puntualidad }}</td>
			            <td>{{ $uno->C_precio }}</td>
			            <td>{{ $uno->C_trato }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$segundo->isEmpty())
			        <tr align="center">
			            @foreach($segundo as $dos)
			            <th>{{ $dos->mes }}</th>
			            <td>{{ $dos->C_limpieza }}</td>
			            <td>{{ $dos->C_puntualidad }}</td>
			            <td>{{ $dos->C_precio }}</td>
			            <td>{{ $dos->C_trato }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$tercero->isEmpty())
			        <tr align="center">
			            @foreach($tercero as $tres)
			            <th>{{ $tres->mes }}</th>
			            <td>{{ $tres->C_limpieza }}</td>
			            <td>{{ $tres->C_puntualidad }}</td>
			            <td>{{ $tres->C_precio }}</td>
			            <td>{{ $tres->C_trato }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$cuarto->isEmpty())
			        <tr align="center">
			            @foreach($cuarto as $cuatro)
			            <th>{{ $cuatro->mes }}</th>
			            <td>{{ $cuatro->C_limpieza }}</td>
			            <td>{{ $cuatro->C_puntualidad }}</td>
			            <td>{{ $cuatro->C_precio }}</td>
			            <td>{{ $cuatro->C_trato }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$quinto->isEmpty())
			        <tr align="center">
			            @foreach($quinto as $cinco)
			            <th>{{ $cinco->mes }}</th>
			            <td>{{ $cinco->C_limpieza }}</td>
			            <td>{{ $cinco->C_puntualidad }}</td>
			            <td>{{ $cinco->C_precio }}</td>
			            <td>{{ $cinco->C_trato }}</td>
			            @endforeach
			        </tr>
			        @endif
			        <tr align="center">
			        	@foreach($sexto as $seis)
			            <th>{{ $seis->mes }}</th>
			            <td>{{ $seis->C_limpieza }}</td>
			            <td>{{ $seis->C_puntualidad }}</td>
			            <td>{{ $seis->C_precio }}</td>
			            <td>{{ $seis->C_trato }}</td>
			            @endforeach
			        </tr>
			    </tbody>
			</table>
		</section>


		<img src="http://127.0.0.1:8000/img/separador.png">


		<section id="MesesYGeneral">
			<div id="final" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>

			<table id="datatable03" style="margin-bottom: 100px;">
			    <thead>
			        <tr align="center">
			            <th></th>
			            <th style="padding: 10px;">Promedio</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<tr align="center">
			            <th>Mes actual</th>
			            <td>{{ (($estadistica->C_limpieza)+ ($estadistica->C_trato)+($estadistica->C_puntualidad)+($estadistica->C_precio))/4}}</td>
			        </tr>
			        @if(!$primero->isEmpty())
			        <tr align="center">
			            @foreach($primero as $uno)
			            <th>{{ $uno->mes }}</th>
			            <td>{{ $uno->promedio }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$segundo->isEmpty())
			        <tr align="center">
			            @foreach($segundo as $dos)
			            <th>{{ $dos->mes }}</th>
			            <td>{{ $dos->promedio }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$tercero->isEmpty())
			        <tr align="center">
			            @foreach($tercero as $tres)
			            <th>{{ $tres->mes }}</th>
			            <td>{{ $tres->promedio }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$cuarto->isEmpty())
			        <tr align="center">
			            @foreach($cuarto as $cuatro)
			            <th>{{ $cuatro->mes }}</th>
			            <td>{{ $cuatro->promedio }}</td>
			            @endforeach
			        </tr>
			        @elseif(!$quinto->isEmpty())
			        <tr align="center">
			            @foreach($quinto as $cinco)
			            <th>{{ $cinco->mes }}</th>
			            <td>{{ $cinco->promedio }}</td>
			            @endforeach
			        </tr>
			        @endif
			        <tr align="center">
			        	@foreach($sexto as $seis)
			            <th>{{ $seis->mes }}</th>
			            <td>{{ $seis->promedio }}</td>
			            @endforeach
			        </tr>
			    </tbody>
			</table>
		</section>
		@endif
	</center>

@stop


@section ('script')
	<script type="text/javascript">
		Highcharts.chart('principal', {
		    data: {
		        table: 'datatable01'
		    },
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Calificación general'
		    },
		    yAxis: {
		        allowDecimals: false,
		        title: {
		            text: 'Calificación'
		        }
		    },
		    tooltip: {
		        formatter: function () {
		            return '<b>' + this.series.name + '</b><br/>' +
		                this.point.y + ' ' + this.point.name.toLowerCase();
		        }
		    }
		});
	</script>


	<script type="text/javascript">
		Highcharts.chart('container', {
		    data: {
		        table: 'datatable02'
		    },
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Calificaciones de aspectos específicos'
		    },
		    yAxis: {
		        allowDecimals: false,
		        title: {
		            text: 'Calificación'
		        }
		    },
		    tooltip: {
		        formatter: function () {
		            return '<b>' + this.series.name + '</b><br/>' +
		                this.point.y + ' ' + this.point.name.toLowerCase();
		        }
		    }
		});
	</script>



	<script type="text/javascript">
		Highcharts.chart('final', {
		    data: {
		        table: 'datatable03'
		    },
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Calificaciones de aspectos específicos'
		    },
		    yAxis: {
		        allowDecimals: false,
		        title: {
		            text: 'Calificación'
		        }
		    },
		    /*xAxis: {
		        labels: {
		            enabled: false,
		            autoRotationLimit: 40,
		            step: 20
		        },

		        title: {
		            text: 'Meses'
		        }
		    },*/
		    tooltip: {
		        formatter: function () {
		            return '<b>' + this.series.name + '</b><br/>' +
		                this.point.y + ' ' + this.point.name.toLowerCase();
		        }
		    }
		});
	</script>
@stop