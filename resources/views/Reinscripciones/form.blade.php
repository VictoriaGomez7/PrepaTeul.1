<!doctype html>
<a href="http://127.0.0.1:8000/reinscripcion">
            <button class="btn btn-success" style="position: absolute;top: 150%;left:75%">Cancelar</button></a>


<body>
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



        <div class="card-header text-center" style="font-size:200%;width: 90%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 52%; left: 5%;" >{{ __('SOLICITUD DE RE-INSCRIPCIÓN') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->

        {!! Form::open(['route'=>['Reinscripcion.edit',$alumno->id],'method'=>'GET','files'=>true]) !!}
                <!--<form class="form-group" method="PUT" action="/Reinscripcion/{{$alumno->id}}/edit">-->
                    {{--@method('PUT')--}}
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
                <p><input type="number" required readonly pattern="[1-9]{2}[0]{2}[1]{2}[0-9]{4}" id="id" name="id" value="{{$alumno->id}}" style="font-size:105%; width: 95%"/></p>

                <p><input type="text" required readonly id="nombr" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombre" value="{{$alumno->Nombre_A}}"style="font-size:105%; width: 95%;" /></h1>

                <p><input type="text" required readonly id="nombremadre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombremadre" value="{{$alumno->Nombre_M}}"style="font-size:105%; width: 95%;"/></p>

                <p><input type="text" required readonly="" id="nombrpadre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombrepadre" value="{{$alumno->Nombre_P}}"style="font-size:105%; width: 95%;"/></p>

                <p><input type="text"required pattern="[1-9]{1}[0-9]{9}" id="telefonotutor" name="Telefono_T"  value="{{$alumno->Telefono_T}}"style="font-size:105%; width: 95%;"/></p>

                <p><input type="tel" required id="telefonoalumno" name="Telefono_A"
                  pattern="[1-9]{1}[0-9]{9}" value="{{$alumno->Telefono_A}}"style="font-size:105%; width:95%"/></p>

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
                <p><input type="text" required id="municipio" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Municipio" value="{{$alumno->Municipio}}"style="font-size:105%; width:97%"/></p>
                <p><input type="text" required id="poblacion" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="Poblacion" value="{{$alumno->Poblacion}}"style="font-size:105%; width:97%" /></p>
                <p><input type="email" id="correo" pattern="^[a-z0-9_]+(?:\.[a-z0-9_]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" name="Email" value="{{$alumno->Email}}"style="font-size:105%; width:97%;"></p>

                <p><input type="text" required id="curp" pattern="^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$" name="curp" value="{{$alumno->Curp}}" readonly value="{{$alumno->Curp}}" style="font-size:105%; width:97%;"/></p>
                <p><input type="text" id="nss" min="1" max="99999999999" value="{{$alumno->NSS}}" name="NSS" style="font-size:105%; width:97%;"/></p>

                <p> <input type="date" name="fecha" required  readonly value="{{$alumno->Fecha_Nac}}" style="font-size:105%;position: absolute;top: 69%;left:0%; width:97%"> </p>


                <p> <select name="Edad" required style="position: absolute;top: 86%;left:0%; width: 20%">
                    <option value="{{$alumno->Edad}}">{{$alumno->Edad}}</option>
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
                <label style="position: absolute;top: 85%;left:60%;font-size:130%; width: 20%">{{$alumno->Sexo}}</label>

            </div>

            <div style="font-size:140%;width: 90%; height: 11.5%;position: absolute;top:115%;left:5%; background-color:#aaa">
                    <p style="position: absolute;top: 3px;left:170px; width: 900px">{{('Con todo respeto solicito a Usted Sr. Director, me acepte como alumno  de esta Escuela Preparatoria a su cargo para cursar el')}}</p>
                        <select name="Grado" readonly onchange="Grados(this.value); semes(this.options[this.selectedIndex].innerHTML);" required="true" style="font-size:80%;width: 17%;/*posicion->*/position: absolute;top:54%; left:46%;">
                            <?php
                            echo $opciones2;
                             ?>
                      </select>
                    <p style="position: absolute;top: 50%;left:64%">{{('del')}}</p>
                    <!--Caja del grado-->
                    <input type="text" id="grado" value="{{$alumno->Grado}}" name="Gradoo" disabled style="background-color:#aaa; position: absolute; top:51%; left: 67%; width: 8%;border: 0px;font-size:90%;text-align: center; color:black">
                    <input type="text" id="semestree" value="{{$alumno->Semestre}}" name="Semestre" style="background-color:#aaa; position: absolute; top:51%; left: 85%; width: 0%;border: 0px;font-size:90%;text-align: center; color:black">

                    <p style="position: absolute; top:53%; left: 75.5%;font-size:90%"> {{('GRADO.')}}</p>

            </div>

            @foreach($FtOBache as $FTBH)
            <div style="position: absolute;top: 126%; left: 5%; width: 90%;height:15%;background-color:#aaa">
                <p style="font-size:138%">{{('Formación para el Trabajo:')}}</p>
                <p style="font-size:138%">{{('Bachillerato:')}}</p>
                @if($bandera==1)
                <select  name="ft2" id="ft2" style="font-size:110%;width: 26.5%; position:  absolute;top: 4%; left: 22%"  >
                            <option value="{{ old('Grado') }}">{{ old('Grado') }}</option>

                            <option value="Lenguas">Lenguas</option>
                            <option value="Informatica">Informatica</option>
                            <option value="Higiene y Salud Comunitaria">Higiene y Salud Comunitaria</option>
                            <option value="Económico Administrativo">Económico Administrativo</option>
                      </select>

               <input readonly value=""  name="bach1" id="bach1" style="font-size:110%;width: 26.5%; position:  absolute;top: 53%; left: 22%" >
                @elseif($bandera==11)
                <input readonly value="{{ $FTBH->Formación_Trabajo }}" name="ft2" id="ft2" style="font-size:110%;width: 26.5%; position:  absolute;top: 4%; left: 22%"  >

                <input readonly value="{{ $FTBH->Bachillerato }}"  name="bach1" id="bach1" style="font-size:110%;width: 26.5%; position:  absolute;top: 53%; left: 22%" >
                @elseif($bandera==2)
                <input readonly value="{{ $FTBH->Formación_Trabajo }}" name="ft2" id="ft2" style="font-size:110%;width: 26.5%; position:  absolute;top: 4%; left: 22%"  >

                <select name="bach1" id="bach1" style="font-size:110%;width: 26.5%; position:  absolute;top: 53%; left: 22%" >
                            <option value="{{ old('Grado') }}">{{ old('Grado') }}</option>
                            <option value="Químico Biológico">Químico Biológico</option>
                            <option value="Físico Matemático">Físico Matemático</option>
                            <option value="Ciencias sociales y humanidades">Ciencias sociales y humanidades</option>
                            <option value="Económico Administrativo">Económico Administrativo</option>
                      </select>
                @elseif($bandera==22)
                    <input readonly value="{{ $FTBH->Formación_Trabajo }}" name="ft2" id="ft2" style="font-size:110%;width: 26.5%; position:  absolute;top: 4%; left: 22%"  >

                    <input readonly value="{{ $FTBH->Bachillerato }}"  name="bach1" id="bach1" style="font-size:110%;width: 26.5%; position:  absolute;top: 53%; left: 22%" >

                @else
                <input readonly value="" name="ft2" id="ft2" style="font-size:110%;width: 26.5%; position:  absolute;top: 4%; left: 22%"  >

                    <input readonly value=""  name="bach1" id="bach1" style="font-size:110%;width: 26.5%; position:  absolute;top: 53%; left: 22%" >
                @endif


            </div>
            @endforeach


            <button type="submit" class="btn btn-primary" href="#" style="position: absolute;top: 150%;left:65%">Reinscribir</button>

        {!! Form::close()!!}

@endforeach()

</body>