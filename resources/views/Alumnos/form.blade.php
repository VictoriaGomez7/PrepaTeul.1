<!doctype html>
<a href="http://127.0.0.1:8000/alumnosconsulta">
            <button class="btn btn-success" style="position: absolute;top: 210%;left:75%">Cancelar</button></a>


{{--  --}}@extends('layouts.app')

{{-- @section('title','Modifica Alumno') --}}

@include('ControlEscolar.CEprincipal')

<body>
    {{-- @section('ModificarAlumnos') --}}
        @foreach($CAlumno as $alumno)


            <script type="text/javascript">
                var Grados = function(x)
            {
                document.getElementById('grado').value=x;
            }
                var semes = function(x)
            {
                document.getElementById('semestree').value=x;
            }
            </script>

            <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 5%;" >{{ __('MODIFICAR ALUMNO') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->


            <form class="form-group" method="PUT" action="/Alumnos/{{$alumno->id}}/edit">
            @csrf

            <div style="position: absolute;top: 62%; left: 5%; width: 20%;height:53%;background-color:#aaa">
                <p style="font-size:130%">{{('Matrícula:')}}</p>
                <p style="font-size:130%">{{('Nombre del alumno:')}}</p>
                <p style="font-size:130%">{{('Nombre de la madre:')}}</p>
                <p style="font-size:130%">{{('Nombre del padre:')}}</p>
                <p style="font-size:130%">{{('Teléfono del tutor:')}}</p>
                <p style="font-size:130%">{{('Teléfono del alumno:')}}</p>
                <p style="font-size:130%">{{('Domicilio:')}}</p>
            </div>

            <div style="position: absolute;top: 62%; left: 24.9%; width: 25%;height:53%;background-color:#aaa">
                <p><input type="text" required  pattern="[1-9]{1}[0-9]{9}" name="id" value="{{$alumno->id}}" style="font-size:105%; width: 95%"/></p>

                <p><input type="text" required  id="nombr" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Nombre_A" value="{{$alumno->Nombre_A}}"style="font-size:105%; width: 95%;" /></p>

                <p><input type="text" required  id="nombremadre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Nombre_M" value="{{$alumno->Nombre_M}}"style="font-size:105%; width: 95%;"/></p>

                <p><input type="text" required  id="nombrpadre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Nombre_P" value="{{$alumno->Nombre_P}}"style="font-size:105%; width: 95%;"/></p>

                <p><input type="text"required pattern="[1-9]{1}[0-9]{9}" id="telefonotutor" name="Telefono_T"  value="{{$alumno->Telefono_T}}" style="font-size:105%; width: 95%;"/></p>

                <p><input type="tel" required id="telefonoalumno" name="Telefono_A"
                  pattern="[1-9]{1}[0-9]{9}" value="{{$alumno->Telefono_A}}" style="font-size:105%; width:95%"/></p>

                <p><input type="address" required id="domicilio" name="Domicilio" value="{{$alumno->Domicilio}}" style="font-size:105%; width: 95%"/></p>
            </div>

            <div style="position: absolute;top: 62%; left: 49.9%; width: 20.1%;height:53%;background-color:#aaa">
                <p style="font-size:130%">{{('Municipio:')}}</p>
                <p style="font-size:130%">{{('Población:')}}</p>
                <p style="font-size:130%">{{('Correo electrónico:')}}</p>
                <p style="font-size:130%">{{('Clave CURP:')}} </p>
                <p style="font-size:130%">{{('Num. de Seguro Social:')}}</p>
                <p style="font-size:130%">{{('Fecha de Nacimiento:')}}</p>
                <p style="font-size:130%">{{('Edad:')}}</p>
            </div>

            <div style="position: absolute;top: 62%; left: 70%; width:25%;height:53%;background-color:#aaa">
                <p><input type="text" required id="municipio" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Municipio" value="{{$alumno->Municipio}}" style="font-size:105%; width:97%"/></p>
                <p><input type="text" required id="poblacion" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Poblacion" value="{{$alumno->Poblacion}}" style="font-size:105%; width:97%" /></p>
                <p><input type="email" id="correo" pattern="^[a-z0-9_]+(?:\.[a-z0-9_]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" name="Email" value="{{$alumno->Email}}"style="font-size:105%; width:97%;"></p>

                <p><input type="text" required id="curp" pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" name="Curp" value="{{$alumno->Curp}}"  value="{{$alumno->Curp}}" style="font-size:105%; width:97%;"/></p>
                <p><input type="text" id="nss"  value="{{$alumno->NSS}}" min="1" max="99999999999" name="NSS" style="font-size:105%; width:97%;"/></p>

                <p> <input type="date" name="Fecha_Nac" required value="{{$alumno->Fecha_Nac}}" style="position: absolute;top: 69%;left:0%; width:90%"> </p>


                <p> <select name="Edad" required style="position: absolute;top: 86%;left:0%; width: 20%">
                    <option  value="{{$alumno->Edad}}" >{{$alumno->Edad}} </option>
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
                    </select>
                </p>

                <label style="position: absolute;top: 84%;left:40%;font-size:140%;">Sexo: </label>
                <label style="position: absolute;top: 85%;left:57%;font-size:130%; width: 20%">{{$alumno->Sexo}}</label>

            </div>

            <div style="font-size:140%;width: 90%; height: 11.5%;position: absolute;top:115%;left:5%; background-color:#aaa">
                    <p style="position: absolute;top: 3px;left:170px; width: 900px">{{('Con todo respeto solicito a Usted Sr. Director, me acepte como alumno  de esta Escuela Preparatoria a su cargo para cursar el')}}</p>
                        <select name="Grado" onchange="Grados(this.value); semes(this.options[this.selectedIndex].innerHTML);" required="true" style="font-size:80%;width: 17%;/*posicion->*/position: absolute;top:54%; left:46%;">
                          <option value="{{ $alumno->Grado }}">{{ $alumno->Semestre }}</option>
                            <option value="PRIMER ">PRIMER SEMESTRE</option>
                            <option value="PRIMER ">SEGUNDO SEMESTRE</option>
                            <option value="SEGUNDO ">TERCER SEMESTRE</option>
                            <option value="SEGUNDO ">CUARTO SEMESTRE</option>
                            <option value="TERCER ">QUINTO SEMESTRE</option>
                            <option value="TERCER ">SEXTO SEMESTRE</option>
                      </select>
                    <p style="position: absolute;top: 50%;left:64%">{{('del')}}</p>
                    <!--Caja del grado-->
                    <input type="text" id="grado"  value="{{$alumno->Grado}}" name="Gradoo" disabled style="background-color:#aaa; position: absolute; top:51%; left: 67%; width: 8%;border: 0px;font-size:90%;text-align: center; color:black">
                    <input type="text" id="semestree" name="Semestre" value="{{$alumno->Semestre}}"  style="background-color:#aaa; position: absolute; top:51%; left: 85%; width: 0%;border: 0px;font-size:90%;text-align: center; color:black">

                    <p style="position: absolute; top:53%; left: 75.5%;font-size:90%"> {{('GRADO.')}}</p>

            </div>
            <div class="card-header text-center" style="font-size:180%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 126%; left: 5%;" >{{ __('Requisitos') }}</div>

            <!-- ********************** PARTE DE DONDE SE AGREGA PARA LOS REQUISITOS ********************************-->
            <div style="position: absolute;top: 135%; left: 5%; width: 70%;height:65%;background-color:#aaa">
                <p style="font-size:138%">{{('A) Certificado de Secundaria.')}}</p>
                <p style="font-size:138%">{{('B) Acta de Nacimiento.')}}</p>
                <p style="font-size:138%">{{('C) Curp.')}}</p>
                <p style="font-size:138%">{{('D) Carta de Conducta.')}} </p>
                <p style="font-size:138%">{{('E) 6 Fotografías tamaño infantil, blanco y negro (no instantáneas).')}}</p>
                <p style="font-size:138%">{{('F) Ser alumno regular del grado anterior.')}}</p>
                <p style="font-size:138%">{{('G) Cubrir cuota semestral.')}}</p>
                <p style="font-size:138%">{{('H) Firmar de conformidad padres y alumno  en la hoja de solicitud de inscripción.')}}</p>
            </div>

            <div style="position: absolute;top: 135%; left: 75%; width: 20%; height:65%;background-color:#aaa">
                <p><select id="A" name="Requisito_A" required style="width: 18%;height: 9%; position: absolute;top: 0%;left:10%">
                    <option  value="{{$alumno->Requisito_A}}"> {{$alumno->Requisito_A}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required id="B" name="Requisito_B" style="width: 18%;height: 9%; position: absolute;top: 12%;left:10%">
                    <option  value="{{$alumno->Requisito_B}}"> {{$alumno->Requisito_B}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required id="C" name="Requisito_C" style="width: 18%;height: 9%; position: absolute;top: 23%;left:10%">
                    <option  value="{{$alumno->Requisito_C}}"> {{$alumno->Requisito_C}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>

                <p><select required id="D" name="Requisito_D" style="width: 18%;height: 9%; position: absolute;top: 34%;left:10%">
                    <option  value="{{$alumno->Requisito_D}}"> {{$alumno->Requisito_D}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required name="Requisito_E" style="width: 18%;height: 9%; position: absolute;top: 46%;left:10%">
                    <option  value="{{$alumno->Requisito_E}}"> {{$alumno->Requisito_E}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required id="F" name="Requisito_F" style="width: 18%;height: 9%; position: absolute;top: 59%;left:10%">
                    <option  value="{{$alumno->Requisito_F}}"> {{$alumno->Requisito_F}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required id="G" name="Requisito_G" style="width: 18%;height: 9%; position: absolute;top: 72%;left:10%">
                    <option  value="{{$alumno->Requisito_G}}"> {{$alumno->Requisito_G}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>
                <p><select required id="H" name="Requisito_H" style="width: 18%;height: 9%; position: absolute;top: 85%;left:10%">
                    <option  value="{{$alumno->Requisito_H}}"> {{$alumno->Requisito_H}} </option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select></p>

            </div>

            
            <button type="submit" class="btn btn-primary" style="position: absolute;top: 210%;left:65%">Modificar</button>
        </form>

    {!!Form::open(['route' => ['Alumnos.store'],'method'=>'POST'])!!}
    
    {!! Form::close()!!}

    {{-- @endsection() --}}

@endforeach()

</body>
