@extends ('layouts.admin')
<?php

	if(Request::session()->has('saludaunclick'))
	{
	    Request::session()->forget('saludaunclick');
	}
	Request::session()->put('saludaunclick', 'http://localhost:8000/');

?>

@section ('contenido')
 <center>
 	<form action="doctor" method="post" enctype="multipart/form-data">
     @csrf
    <section class="informacionCons" style="background: #FFF; height: auto; padding: 20px;">
		<table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Lunes</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="LunesHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="LunesMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="LunesHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="LunesMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addL" id="addL" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr> 
	          
	    </table>


	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Martes">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Martes</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="MartesHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="MartesMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="MartesHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="MartesMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addM" id="addM" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr> 
	          
	    </table>



	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Miercoles">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Miércoles</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="MiercolesHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="MiercolesMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="MiercolesHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="MiercolesMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addX" id="addX" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr> 
	          
	    </table>




	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Jueves">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Jueves</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="JuevesHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="JuevesMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="JuevesHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="JuevesMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addJ" id="addJ" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr> 
	          
	    </table>



	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Viernes">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Viernes</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="ViernesHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="ViernesMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="ViernesHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="ViernesMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addV" id="addV" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr> 
	          
	    </table>



	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Sabado">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Sábado</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="SabadoHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="SabadoMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="SabadoHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="SabadoMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addS" id="addS" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr>  
	          
	    </table>



	    <table style=" width: 90%; margin-top: 100px;" class="table table-bordered table-dark formular" id="dynamic_field_Domingo">
	        <thead style="font-size: 30px; text-align: center;">
	            <th colspan="7">Domingo</th>
	        </thead>
	        <tr style="font-size: 25px; text-align: center;">
	            <th colspan="2" style="background: #4286f4">Hora de inicio</th>
	            <th colspan="2" style="background: #e8a035">Hora de término</th>
	        </tr>
	        <tr style="font-size: 15px; text-align: center;">  
	            <td style="background: #040451;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="DomingoHora1[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #040451;">
	                <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="DomingoMinuto1[]" required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	                <p>
	                    <b>Hora: </b>
	                    <select class="form-control" input type="text" name="DomingoHora2[]" required>
	                        <option value="0">00</option>
	                        <option value="1">01</option>
	                        <option value="2">02</option>
	                        <option value="3">03</option>
	                        <option value="4">04</option>
	                        <option value="5">05</option>
	                        <option value="6">06</option>
	                        <option value="7">07</option>
	                        <option value="8">08</option>
	                        <option value="9">09</option>
	                        <option value="10">10</option>
	                        <option value="11">11</option>
	                        <option value="12">12</option>
	                        <option value="13">13</option>
	                        <option value="14">14</option>
	                        <option value="15">15</option>
	                        <option value="16">16</option>
	                        <option value="17">17</option>
	                        <option value="18">18</option>
	                        <option value="19">19</option>
	                        <option value="20">20</option>
	                        <option value="21">21</option>
	                        <option value="22">22</option>
	                        <option value="23">23</option>
	                    </select>
	                </p>
	            </td>
	            <td style="background: #512804;">
	               <p>
	                    <b>Minutos: </b>
	                    <select class="form-control" input type="text" name="DomingoMinuto2[]"required>
	                        <option value="0">00</option>
	                        <option value="5">05</option>
	                        <option value="10">10</option>
	                        <option value="15">15</option>
	                        <option value="20">20</option>
	                        <option value="25">25</option>
	                        <option value="30">30</option>
	                        <option value="35">35</option>
	                        <option value="40">40</option>
	                        <option value="45">45</option>
	                        <option value="50">50</option>
	                        <option value="55">55</option>
	                    </select>
	                </p>
	            </td>
	            <td>
	                <button type="button" name="addD" id="addD" class="btn btn-success form-control" style="width: 90%;">+</button>
	            </td>
	        </tr>  
	          
	    </table>

	    <button type="submit" class="btn btn-success" style="font-size: 25px; margin-top: 60px;">Registrar horarios</button>
    </section>
    </form>
</center>
@stop

@section ('script')
<script>  
     $(document).ready(function(){  


            var i=1, m=1, x=1, j=1, v=1, s=1, d=1; 
          $('#addL').click(function(){  
               $('#dynamic_field').append('<tr style="font-size: 15px; text-align: center; " id="row'+i+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="LunesHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="LunesMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="LunesHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="LunesMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr> ');  
               i++;
          });  


          $('#addM').click(function(){  
               $('#dynamic_field_Martes').append('<tr style="font-size: 15px; text-align: center; " id="row'+m+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="MartesHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="MartesMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="MartesHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="MartesMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+m+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               m++;
          });  



          $('#addX').click(function(){  
               $('#dynamic_field_Miercoles').append('<tr style="font-size: 15px; text-align: center; " id="row'+x+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="MiercolesHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="MiercolesMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="MiercolesHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="MiercolesMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               x++;
          });  


          $('#addJ').click(function(){  
               $('#dynamic_field_Jueves').append('<tr style="font-size: 15px; text-align: center; " id="row'+j+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="JuevesHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="JuevesMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="JuevesHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="JuevesMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               j++;
          }); 


          $('#addV').click(function(){  
               $('#dynamic_field_Viernes').append('<tr style="font-size: 15px; text-align: center; " id="row'+v+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="ViernesHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="ViernesMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="ViernesHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="ViernesMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+v+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               v++;
          }); 


          $('#addS').click(function(){  
               $('#dynamic_field_Sabado').append('<tr style="font-size: 15px; text-align: center; " id="row'+s+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="SabadoHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="SabadoMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="SabadoHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="SabadoMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+s+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               s++;
          }); 


          $('#addD').click(function(){  
               $('#dynamic_field_Domingo').append('<tr style="font-size: 15px; text-align: center; " id="row'+d+'">  <td style="background: #040451;"><p><b>Hora: </b><select class="form-control" input type="text" name="DomingoHora1[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #040451;"><p><b>Minutos: </b><select class="form-control" input type="text" name="DomingoMinuto1[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td style="background: #512804;"><p><b>Hora: </b><select class="form-control" input type="text" name="DomingoHora2[]" required><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option> <option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option> <option value="15">15</option><option value="16">16</option> <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select> </p></td><td style="background: #512804;"><p><b>Minutos: </b><select class="form-control" input type="text" name="DomingoMinuto2[]" required><option value="0">00</option><option value="5">05</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option></select></p> </td><td><button type="button" name="remove" id="'+d+'" class="btn btn-danger btn_remove">X</button></td></tr> '); 
               d++;
          }); 


            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });  
        });  
    </script>
@stop