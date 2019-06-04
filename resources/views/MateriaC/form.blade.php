<a action="MateriaC/createC">
    <button class="btn btn-success" style="position: absolute;top: 90%;left:5%"><--Atras</button></a>

    @if (session()->has('msj1'))
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

            <div class="alert alert-success" role="alert" style="width: 50%; position:  absolute;top: 43%; left: 25%;z-index: 1;">
                <button type="button" class="close" data-dismiss="alert" >&times;</button>
                <strong>¡Correcto! </strong>{{session('msj1')}}
            </div>

    @endif()


    @foreach($CDocente as $docente)

    <section style="width: 100%; max-width: 100%; height:125%;max-height: 200%; background: #FFFFFF">

        <div class="card-header text-center" style="font-size:200%;width: 50%; height: 9.8%; background: #000080; color: rgb(212, 172, 13); position:  absolute;top: 32.5%; left: 25%;" >{{ __('Modificar Materia') }}</div> <!-- text-center ES PARA CENTRA EL TEXTO -->


        <form class="form-group" method="PUT" action="/MateriaC/{{$docente->id}}/edit">
            {{--@method('PUT')--}}
            @csrf

            <div style="position: absolute;top: 42%; left: 25%; width: 50%;height:45%;background-color:#aaa">
                <p></p>
                <p style="font-size:130%">{{('Clave:')}}</p>
                <p style="font-size:130%">{{('Tipo:')}}</p>
                <p style="font-size:130%">{{('Nombre:')}}</p>
                <p style="font-size:130%">{{('Semestre:')}}</p>
                <p style="font-size:130%">{{('Horas:')}}</p>

            </div>

            <div style="position: absolute;top: 42%; left: 45%; width: 25%;height:45%;background-color:#aaa">
                <p></p>
                <!--<p><input type="number" required  pattern="[1-9]{1}[0-9]{9}" id="clave1" hidden="true" name="clave2" value="{{$docente->id}}" style="font-size:105%; width: 105%"/></p>
-->
                <p><input type="number" required readonly pattern="[1-9]{1}[0-9]{9}" id="clave1" name="clave1" value="{{$docente->id}}" style="font-size:105%; width: 105%"/></p>

                <p><input type="text" required  id="nombre1" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" name="nombre1" value="{{$docente->Nombre}}"style="font-size:105%; width: 105%;" /></h1>

                <p><input type="address" required id="domicilio1" name="domicilio1" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" value="{{$docente->Domicilio}}" style="font-size:105%; width: 105%"/></p>

                <p><input type="text"required pattern="[1-9]{1}[0-9]{9}" id="telefono1" name="telefono1" value="{{$docente->Telefono}}" style="font-size:105%; width: 105%;"/></p>


            </div>

              <button type="submit" class="btn btn-primary" href="#" style="position: absolute;top: 90%;left:65%">Modificar</button>


        </form>



@endforeach()
